<?php

require_once 'ApiTrem.php';
require_once "VO/Usuario.php";
require_once "VO/Estacao.php";
require_once "VO/Estabelecimento.php";
require_once "VO/Evento.php";
require_once "VO/Avaliacao.php";
require_once "VO/Comentario.php";
require_once "VO/Imagem.php";
require_once "VO/Video.php";

require_once "DAO/ImagemDAO.php";


    $apiTrem = new ApiTrem;
  //  $imagemDAO = new ImagemDAO;
  
    //$estabelecimento = new Estabelecimento(0, "abc", "cde", 1.1, 0.1, "fgh", '2011-12-11', 1,1,1,1,1);
    //$estabelecimento = new Estabelecimento(1, 0, 1);
    $estabelecimento = new Estabelecimento;
    $imagem = new Imagem;
    $usuario = new Usuario;
    $imagens = array();

    $imagem->setId(3);

  //  $imagens = $imagemDAO->buscarMidiasSelecionadas();
    //print($imagens[0]->getIdEstabelecimento());
    /*
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
    */    

    //$apiTrem->apagarConteudo($imagem, $usuario);
    $midias = $apiTrem->carregarLinhaTrem(5);
    print(sizeof($midias['videos']['midias']));
    //for ($i=0; $i < $midias['imagens']['midias']; $i++) { 
     //   print(sizeof($midias['imagens']['midias'], COUNT_RECURSIVE));
        //print($midias['imagens']['midias'][$i]->getId() . ' ');
    //}
    
    
    //print($imagens[0]->getId() . "\n");
    //print($imagens[1]->getId() . "\n");
    //print($imagens[2]->getId() . "\n");
    
    //print(get_class($imagens));


    //$estabelecimento->setInfoEstabelecimento("lerolero");
    
    


   // print(true);
   
    //print($estabelecimento->getEhBar());

    //print(sizeof($estabelecimentos));


    //print(sizeof($estabelecimento->listaComentarios) . ' ' . sizeof($estabelecimento->listaAvaliacoes) . ' ' . sizeof($estabelecimento->listaImagens) . ' ' . sizeof($estabelecimento->listaVideos));

        
?>
