<?php
require_once 'Atracao.php';

class Evento extends Atracao {
    private $infoEvento;
    
    public function __construct($id=null, $nome=null, $dataInclusao=null, $endereco=null,
                                $latitude=null, $longitude=null, $linkMapa=null, $website=null,
                                $vizualizacoes=null, $idUsuario=null, $idEstacao=null,
                                $infoEvento=null)
     {
    	parent::__construct($id, $nome, $dataInclusao, $endereco, $latitude, $longitude,
    						$linkMapa, $website, $vizualizacoes, $idUsuario, $idEstacao);
        $this->infoEvento = $infoEvento;
    }

    // getter
    public function getInfoEvento() {
		return $this->infoEvento;
	}
	    
    // setter
	public function setInfoEvento($infoEvento) {
		$this->infoEvento = $infoEvento;
	}
	
}
  
?>
