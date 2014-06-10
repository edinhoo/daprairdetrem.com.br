<?php
require_once 'Atracao.php';

class Estabelecimento extends Atracao {
    private $tipo;
    
    // getter
    public function getTipo() {
		return $this->tipo;
	}
	    
    // setter
	public function setTipo($tipo) {
		$this->tipo = $tipo;
	}
	
}
  
?>
