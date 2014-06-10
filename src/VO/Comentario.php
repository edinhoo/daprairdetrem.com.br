<?php
require_once 'Conteudo.php';

class Comentario extends Conteudo {
    private $texto;
    
    // getter
    public function getTexto() {
		return $this->texto;
	}
	
	// setter
	public function setTexto($texto) {
		$this->texto = $texto;
	}
}
  
?>
