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

Os atributos das classes acima podem ser acessados através de getters e setters que obedecem o seguinte padrão:

- *getAlgumAtributo()*
- *setAlgumAtributo($novoValor)*

As listas são exceções, elas não possuem get/set e podem ser acessadas diretamente.

Entidades
-----------------
####Estacao
Atributo | Tipo
------------ | -------------
id | int
nome | string
endereco | string
latitude | float
longitude | float
linkMapa | string
listaEstabelecimentos | list (Estabelecimento) 
listaEventos | list (Evento)
------------------
####Estabelecimento
Atributo | Tipo
------------ | -------------
id | int
nome | string
dataInclusao | string (YYYY-MM-DD)
endereco | string
latitude | float
longitude | float
linkMapa | string
website | string
visualizacoes | int
idUsuario | int
idEstacao | int
listaComentarios | list (Comentario)
listaAvaliacoes | list (Avaliacao)
listaVideos | list (Video)
listaImagens | list (Imagem)
ehBar | bool
ehRestaurante | bool
ehCentroCultural | bool

------------------
####Evento
Atributo | Tipo
------------ | -------------
id | int
nome | string
dataInclusao | string (YYYY-MM-DD)
endereco | string
latitude | float
longitude | float
linkMapa | string
website | string
visualizacoes | int
idUsuario | int
idEstacao | int
listaComentarios | list (Comentario)
listaAvaliacoes | list (Avaliacao)
listaVideos | list (Video)
listaImagens | list (Imagem)
infoEvento | string

------------------
####Avaliacao
Atributo | Tipo
------------ | -------------
id | int
categoria | int
dataInclusao | string (YYYY-MM-DD)
idEstabelecimento | int
idEvento | int
idUsuario | int
nota | int

------------------
####Comentario
Atributo | Tipo
------------ | -------------
id | int
categoria | int
dataInclusao | string (YYYY-MM-DD)
idEstabelecimento | int
idEvento | int
idUsuario | int
texto | string

------------------
####Imagem
Atributo | Tipo
------------ | ------------- 
id | int
categoria | int
dataInclusao | string (YYYY-MM-DD)
idEstabelecimento | int
idEvento | int
idUsuario | int
link | string
selecaoTrem | bool

------------------
####Video
Atributo | Tipo
------------ | -------------
id | int
categoria | int
dataInclusao | string (YYYY-MM-DD)
idEstabelecimento | int
idEvento | int
idUsuario | int
link | string
selecaoTrem | bool
