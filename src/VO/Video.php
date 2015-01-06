<?php
require_once 'Midia.php';

class Video extends Midia {
	public function __construct	($id=null, $categoria=null, $dataInclusao=null, $idEstabelecimento=null,
    							 	 $idEvento=null, $idUsuario=null, $link=null, $selecaoTrem=null)
	{
    	parent::__construct($id, $categoria, $dataInclusao, $idEstabelecimento, $idEvento, $idUsuario, $link, $selecaoTrem);
    }
}
  
?>
