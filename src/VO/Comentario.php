<?php
require_once 'Conteudo.php';

class Comentario extends Conteudo {
    private $texto;
    
    public function __construct  ($id=null, $categoria=null, $dataInclusao=null, $idEstabelecimento=null,
                                     $idEvento=null, $idUsuario=null, $texto=null)
    {
        parent::__construct($id, $categoria, $dataInclusao, $idEstabelecimento, $idEvento, $idUsuario);
        $this->texto = $texto;       
    }

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
