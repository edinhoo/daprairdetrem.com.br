<?php
require_once 'Atracao.php';

class Evento extends Atracao {
    private $infoEvento;
    
    // Verificar function overloading
    /*
    public function __construct($id, $nome, $dataInclusao, $endereco, $latitude, $longitude,
    							$linkMapa, $website, $vizualizacoes, $idUsuario, $idEstacao,
    							$infoEvento) 
    {
    	$this->infoEvento = $infoEvento;
    	parent::__construct($this->id, $this->nome, $this->dataInclusao, $this->endereco, $this->latitude, $this->longitude,
    						$this->linkMapa, $this->website, $this->vizualizacoes, $this->idUsuario, $this->idEstacao);
    }
    */

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
