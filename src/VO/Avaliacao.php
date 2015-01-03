<?php
require_once 'Conteudo.php';



class Avaliacao extends Conteudo {
    private $nota;
    
    // verificar function overloading
    /*
    public function __construct($id, $categoria, $dataInclusao, $idEstabelecimento, $idEvento, $idUsuario, $nota) {
    	$this->nota = $nota;
    	parent::__construct($id, $categoria, $dataInclusao, $idEstabelecimento, $idEvento, $idUsuario);
    }
	*/

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
