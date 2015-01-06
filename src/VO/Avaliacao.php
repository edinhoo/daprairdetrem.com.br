<?php
require_once 'Conteudo.php';



class Avaliacao extends Conteudo {
    private $nota;
    
    public function __construct  ($id=null, $categoria=null, $dataInclusao=null, $idEstabelecimento=null,
                                     $idEvento=null, $idUsuario=null, $nota=null)
    {
    	parent::__construct($id, $categoria, $dataInclusao, $idEstabelecimento, $idEvento, $idUsuario);
        $this->nota = $nota;       
    }
	
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
