<?php
require_once 'Conteudo.php';

class Comentario extends Conteudo {
    private $texto;
    
    // verificar function overloading
    /*
    public function __construct($id, $categoria, $dataInclusao, $idEstabelecimento, $idEvento, $idUsuario, $texto) {
    	$this->texto = $texto;
    	parent::__construct($id, $categoria, $dataInclusao, $idEstabelecimento, $idEvento, $idUsuario);
    }
	*/

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
