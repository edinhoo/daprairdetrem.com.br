<?php
require_once "Estabelecimento.php";
require_once "Evento.php";
require_once(dirname(__FILE__))."/../DAO/EstabelecimentoDAO.php";
require_once(dirname(__FILE__))."/../DAO/EventoDAO.php";

class Estacao {
    private $id;
    private $nome;
    private $endereco;
    private $latitude;
    private $longitude;
    private $linkMapa;
    public $listaEstabelecimentos;
    public $listaEventos;
    
    // getters
    public function getId() {
		return $this->id;
	}
	
	public function getNome() {
		return $this->nome;
	}
	
	public function getEndereco() {
		return $this->endereco;
	}
	
	public function getLatitude() {
		return $this->latitude;
	}
	
	public function getLongitude() {
		return $this->longitude;
	}
    
    public function getLinkMapa() {
		return $this->linkMapa;
	}
	
	    
    // setters
    public function setId($id) {
		$this->id = $id;
	}
	
	public function setNome($nome) {
		$this->nome = $nome;
	}
	
	public function setEndereco($endereco) {
		$this->endereco = $endereco;
	}
	
	public function setLatitude($latitude) {
		$this->latitude = $latitude;
	}
	
	public function setLongitude($longitude) {
		$this->longitude = $longitude;
	}
    
    public function setLinkMapa($linkMapa) {
		$this->linkMapa = $linkMapa;
	}
    
	public function loadListasAtracoes() {
		$estabelecimentoDAO = new EstabelecimentoDAO;
		$eventoDAO = new EventoDAO;
        /*
		$this->setListaEstabelecimentos($estabelecimentoDAO->gerarListaEstabelecimentos($this));
		$this->setListaEventos($eventoDAO->gerarListaEventos($this));
        */
        $this->listaEstabelecimentos = $estabelecimentoDAO->gerarListaEstabelecimentos($this);
		$this->listaEventos = $eventoDAO->gerarListaEventos($this);

	}
	
}
  
?>
