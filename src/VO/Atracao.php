<?php
abstract class Atracao {
    private $id;
    private $nome;
    private $dataInclusao;
    private $endereco;
    private $latitude;
    private $longitude;
    private $idUsuario;
    public $listaComentarios;
    public $listaAvaliacoes;
    public $listaVideos;
    public $listaImagens;
    
    // getters
    public function getId() {
		return $this->id;
	}
	
	public function getNome() {
		return $this->nome;
	}
	
	public function getDataInclusao() {
		return $this->dataInclusao;
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
	
	public function getListaComentarios() {
		return $this->listaComentarios;
	}
	
	public function getListaAvaliacoes() {
		return $this->listaAvaliacoes;
	}
	
	public function getListaVideos() {
		return $this->listaVideos;
	}
	
	public function getListaImagens() {
		return $this->listaImagens;
	}
    
    // setters
	public function setId($id) {
		$this->id = $id;
	}
	
	public function setNome($nome) {
		$this->nome = $nome;
	}
	
	public function setDataInclusao($dataInclusao) {
		$this->dataInclusao = $dataInclusao;
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
	
	public function setIdUsuario($idUsuario) {
		$this->idUsuario = $idUsuario;
	}
	
	public function setListaComentarios($listaComentarios) {
		$this->listaComentarios = $listaComentarios;
	}
	
	public function setListaAvaliacoes($listaAvaliacoes) {
		$this->listaAvaliacoes = $listaAvaliacoes;
	}
	
	public function setListaVideos($listaVideos) {
		$this->listaVideos = $listaVideos;
	}
	
	public function setListaImagens($listaImagens) {
		$this->listaImagens = $listaImagens;
	}
	
	public function loadListasConteudos(){
		$this->setListaComentarios(gerarListaComentarios($this));
		$this->setListaAvaliacoes(gerarListaAvaliacoes($this));
		$this->setListaImagens(gerarListaImagens($this));
		$this->setListaVideos(gerarListaVideos($this));
	}
}
  
?>
