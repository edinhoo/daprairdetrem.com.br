API Dá pra ir de trem
====================

Estrutura de dados
----------
Todos os objetos utilizados como parâmetros de entrada ou retorno são das seguintes classes, implementadas sob *VO*:

- *Estacao*
- *Estabelecimento*
- *Evento*
- *Avaliacao*
- *Comentario*
- *Imagem*
- *Video* 

Informações adicionais sobre atributos, construtores e formas de acesso encontram-se na documentação da pasta *VO*

Métodos
----------
- *gravarConteudo($objeto, $usuario)*
  - Grava um novo conteúdo no BD. O *id* é gerado automaticamente, portanto seu preenchimento não é necessário. O conteúdo é passado através de *$objeto* e pode ser uma de uma das seguintes classes:
    - *Estacao*
    - *Estabelecimento*
    - *Evento*
    - *Avaliacao*
    - *Comentario*
    - *Imagem*
    - *Video*
  - *$usuario* é membro da classe *Usuario* e serve para verificar se o usuário solicitante possui as permissões necessárias para executar a operação
  - Caso a gravação seja bem sucedida, o método retorna *$objeto* com seu *id* associado. Caso contrário, retorna nulo

- *atualizarConteudo($objeto, $usuario)*
  - Sobrescreve um conteúdo do BD. A busca é feita através do *id*, portanto o atributo *id* não pode ser nulo. Os parâmetros são os mesmos de *gravarConteudo()*
  
- *apagarConteudo($objeto, $usuario)*
  - Apaga um conteúdo do BD. A busca é feita através do *id*, portanto o atributo *id* não pode ser nulo. Os parâmetros são os mesmos de *gravarConteudo()*
  
- *gerarListaImagensAleatorias($num_imagens)* 
  - Gera uma lista de imagens selecionadas de forma aleatória no BD. O tamanho da lista é determinado por *$num_imagens*, que deve ser um número inteiro positivo. Caso *$num_imagens* seja maior que o número de imagens no BD, retorna uma lista com todas as imagens do BD. O formato de retorno é *Imagem<lista>*

- *carregarAtracao($atracao)*
  - Carrega as listas de conteúdo de *$atracao* com todo o conteúdo associado a ela. *$atracao* pode ser um objeto das classes:
    - *Estabelecimento*
    - *Evento*
  - O uso deste método é útil para a exibição da página de um estabelecimento/evento. O método retorna um objeto de classe igual a de *$atracao*

- *carregarLinhaTrem($num_estacoes)*
  - Gera uma lista de tamanho *$num_estacoes* (int positivo), com imagens e vídeos selecionados pela equipe do *daprairdetrem*, junto de seus respectivos estabelecimentos/eventos. O método retorna uma lista com o seguinte formato:
    - *lista ['imagens' | 'videos'] ['midias' | 'atracoes'] [0..$num_estacoes-1]*
    - Exemplos:
      - Acesso à imagem n: *lista['imagens']['midias'][n]*
      - Acesso à atração da imagem n: *lista['imagens']['atracoes'][n]*
      - Acesso ao vídeo m: *lista['videos']['midias'][m]*
      - Acesso à atração do vídeo m: *lista['videos']['atracoes'][m]*
  - A proporção entre imagens e vídeos na lista segue a proporção encontrada no BD. Se houver 90 imagens e 10 vídeos selecionados no BD, a proporção entre imagens e vídeos na lista será de 9:1.

- *login($usuario)*
  - Faz o login de *$usuario* através do *id_facebook* ou *id_google*, portanto apenas um dos dois atributos pode ser nulo. Caso o id não exista, o usuário é cadastrado no BD. Tanto *$usuario* quanto o objeto retornado são da classe *Usuario*
