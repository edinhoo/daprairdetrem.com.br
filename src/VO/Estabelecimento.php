<?php
require_once 'Atracao.php';

class Estabelecimento extends Atracao {
    private $ehBar;
    private $ehRestaurante;
    private $ehCentroCultural;
    
    // Verificar function overloading
    /*
    public function __construct($id=null, $nome=null, $dataInclusao=null, $endereco=null,
    							$latitude=null, $longitude=null, $linkMapa=null, $website=null,
    							$vizualizacoes=null, $idUsuario=null, $idEstacao=null,
    							$ehBar=null, $ehRestaurante=null, $ehCentroCultural=null)
    {
    	parent::__construct($id, $nome, $dataInclusao, $endereco, $latitude, $longitude,
    						$linkMapa, $website, $vizualizacoes, $idUsuario, $idEstacao);
    	$this->ehBar = $ehBar;
    	$this->ehRestaurante = $ehRestaurante;
    	$this->ehCentroCultural = $ehCentroCultural;
    }
    */

    // getters
    public function getEhBar() {
		return $this->ehBar;
	}
	
	public function getEhRestaurante() {
		return $this->ehRestaurante;
	}
	
	public function getEhCentroCultural() {
		return $this->ehCentroCultural;
	}	
    
    // setters
	public function setEhBar($ehBar) {
		$this->ehBar = $ehBar;
	}

	public function setEhRestaurante($ehRestaurante) {
		$this->ehRestaurante = $ehRestaurante;
	}
	
	public function setEhCentroCultural($ehCentroCultural) {
		$this->ehCentroCultural = $ehCentroCultural;
	}
	
	
}
  
?>
