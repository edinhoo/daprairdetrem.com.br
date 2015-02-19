<?php
require_once 'Conteudo.php';

abstract class Midia extends Conteudo {
    private $link;
    private $selecaoTrem;

    protected function __construct	($id=null, $categoria=null, $dataInclusao=null, $idEstabelecimento=null,
    							 	 $idEvento=null, $idUsuario=null, $link=null, $selecaoTrem=null)
	{
    	parent::__construct($id, $categoria, $dataInclusao, $idEstabelecimento, $idEvento, $idUsuario);
    	$this->link = $link;
    	$this->selecaoTrem = $selecaoTrem;
    }

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
