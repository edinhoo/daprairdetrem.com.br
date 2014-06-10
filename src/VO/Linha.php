<?php
require_once "Estacao.php";
require_once (dirname(__FILE__))."/../DAO/EstacaoDAO.php";


class Linha {
    private $id;
    private $nome;
    public $listaEstacoes;
    
    // getters
    public function getId() {
		return $this->id;
	}
	
	public function getNome() {
		return $this->nome;
	}
	
	public function getListaEstacoes() {
		return $this->listaEstacoes;
	}
	    
    // setters
    public function setId($id) {
		$this->id = $id;
	}
	
	public function setNome($nome) {
		$this->nome = $nome;
	}
	
	public function setListaEstacoes($listaEstacoes) {
		$this->listaEstacoes = $listaEstacoes;
	}
	
	public function loadListaEstacoes() {
		$estacaoDAO = new EstacaoDAO;
		$this->setListaEstacoes($estacaoDAO->gerarListaEstacoes($this));
	}
	
	
}
  
?>
