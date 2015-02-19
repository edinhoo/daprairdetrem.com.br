<?php

require_once "ApiTrem.php";
require_once "VO/Usuario.php";
require_once "VO/Estacao.php";
require_once "VO/Estabelecimento.php"; // ok
require_once "VO/Evento.php";   // ok
require_once "VO/Avaliacao.php";
require_once "VO/Comentario.php";
require_once "VO/Imagem.php";
require_once "VO/Video.php";


    $apiTrem = new ApiTrem;
  //  $imagemDAO = new ImagemDAO;
  
/*    $evento = new Evento(1, "abc", "2011-02-02", "endereco", 81.937790, 81.937790, "linkMapa", "site", 0, 1,1,"info");

    //$estabelecimento = new Estabelecimento(1, 0, 1);
    $estabelecimento = new Estabelecimento;
    $imagem = new Imagem;
    $usuario = new Usuario;
    $imagens = array();

    $imagem->setId(3);



  //  $imagens = $imagemDAO->buscarMidiasSelecionadas();
    //print($imagens[0]->getIdEstabelecimento());
    
    $estabelecimento->setId(8);
    $estabelecimento->setNome("estabelecimento 999");
    $estabelecimento->setEndereco("algum lugar");
    $estabelecimento->setLatitude(1.1);
    $estabelecimento->setLongitude(1.2);
    $estabelecimento->setLinkMapa("link_mapa");
    $estabelecimento->setDataInclusao('2011-12-11');
    $estabelecimento->setIdUsuario(1);
    $estabelecimento->setVizualizacoes(1);   
    $estabelecimento->setIdEstacao(1);
    $estabelecimento->setEhBar(false);
    $estabelecimento->setEhRestaurante(false);
    $estabelecimento->setEhCentroCultural(false);
        

    //$apiTrem->apagarConteudo($imagem, $usuario);
    $estabelecimento = $apiTrem->gravarConteudo($estabelecimento, $estabelecimento);
    $midias = $apiTrem->carregarLinhaTrem(5);
    //print(sizeof($midias['videos']['midias']));
    print($estabelecimento->getId());
  */

    $imagens = $apiTrem->gerarListaImagensAleatorias(5);
    //print_r($apiTrem->converterObjetoParaJson($imagens[0]));
    print_r($apiTrem->converterArrayParaJson($imagens));
    
    //print(json_encode($apiTrem->convertToJson($imagens[0])));
   // print(json_encode($imagens[0]->getIdUsuario()));
?>
