API Dá pra ir de trem
====================

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

- *atualizarConteudo($objeto, $usuario)*
  - Sobrescreve um conteúdo do BD. A busca é feita através do *id*, portanto o atributo *id* não pode ser nulo. Os parâmetros são os mesmos de *gravarConteudo()*
  
- *apagarConteudo($objeto, $usuario)*
  - Apaga um conteúdo do BD. A busca é feita através do *id*, portanto o atributo *id* não pode ser nulo. Os parâmetros são os mesmos de *gravarConteudo()*
  
  
  
