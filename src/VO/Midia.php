<?php
require_once 'Conteudo.php';

abstract class Midia extends Conteudo {
    private $link;
    private $selecaoTrem;

    // verificar function overloading
    /*
    protected function __construct($id, $categoria, $dataInclusao, $idEstabelecimento, $idEvento, $idUsuario, $link, $selecaoTrem) {
    	$this->link = $link;
    	$this->selecaoTrem = $selecaoTrem;
    	parent::__construct($id, $categoria, $dataInclusao, $idEstabelecimento, $idEvento, $idUsuario);
    }
	*/

    // getters
    public function getLink() {
		return $this->link;
	}
	
	public function getSelecaoTrem() {
		return $this->selecaoTrem;
	}

    // setters
	public function setLink($link) {
		$this->link = $link;
	}

	public function setSelecaoTrem($selecaoTrem) {
		$this->selecaoTrem = $selecaoTrem;
	}
    
}
  
?>
