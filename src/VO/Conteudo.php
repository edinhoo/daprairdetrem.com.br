<?php
abstract class Conteudo {
    private $id;
    private $categoria;
    private $dataInclusao;
    private $idEstabelecimento;
    private $idEvento;
    private $idUsuario;
    
    protected function __construct	($id=null, $categoria=null, $dataInclusao=null, $idEstabelecimento=null,
    							 	 $idEvento=null, $idUsuario=null)
    {
    	$this->id = $id;
    	$this->categoria = $categoria;
    	$this->dataInclusao = $dataInclusao;
    	$this->idEstabelecimento = $idEstabelecimento;
    	$this->idEvento = $idEvento;
    	$this->idUsuario = $idUsuario;
    }

    // getters
    public function getId() {
		return $this->id;
	}
	
	public function getCategoria() {
		return $this->categoria;
	}
	
	public function getDataInclusao() {
		return $this->dataInclusao;
	}
	
	public function getIdEstabelecimento() {
		return $this->idEstabelecimento;
	}
	
	public function getIdEvento() {
		return $this->idEvento;
	}
	
	public function getIdUsuario() {
		return $this->idUsuario;
	}
    
    // setters
	public function setId($id) {
		$this->id = $id;
	}
	
	public function setCategoria($categoria) {
		$this->categoria = $categoria;
	}
	
	public function setDataInclusao($dataInclusao) {
		$this->dataInclusao = $dataInclusao;
	}
	
	public function setIdEstabelecimento($idEstabelecimento) {
		$this->idEstabelecimento = $idEstabelecimento;
	}
	
	public function setIdEvento($idEvento) {
		$this->idEvento = $idEvento;
	}
	
	public function setIdUsuario($idUsuario) {
		$this->idUsuario = $idUsuario;
	}
}
  
?>
