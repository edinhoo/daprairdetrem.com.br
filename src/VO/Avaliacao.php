<?php
require_once 'Conteudo.php';

class Avaliacao extends Conteudo {
    private $nota;
    
    // getter
    public function getNota() {
		return $this->nota;
	}
	
	// setter
	public function setNota($nota) {
		$this->nota = $nota;
	}
}
  
?>
