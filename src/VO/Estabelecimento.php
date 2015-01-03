<?php
require_once 'Atracao.php';

class Estabelecimento extends Atracao {
    private $ehBar;
    private $ehRestaurante;
    private $ehCentroCultural;
    
    // Verificar function overloading
    /*
    public function __construct($id, $nome, $dataInclusao, $endereco, $latitude, $longitude,
    							$linkMapa, $website, $vizualizacoes, $idUsuario, $idEstacao,
    							$ehBar, $ehRestaurante, $ehCentroCultural) 
    {
    	$this->ehBar = $ehBar;
    	$this->ehRestaurante = $ehRestaurante;
    	$this->ehCentroCultural = $ehCentroCultural;
    	parent::__construct($this->id, $this->nome, $this->dataInclusao, $this->endereco, $this->latitude, $this->longitude,
    						$this->linkMapa, $this->website, $this->vizualizacoes, $this->idUsuario, $this->idEstacao);
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
