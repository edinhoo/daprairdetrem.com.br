<?php
require_once 'Atracao.php';

class Evento extends Atracao {
    private $infoEvento;
    
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
