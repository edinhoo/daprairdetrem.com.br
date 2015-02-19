<?php
class Usuario {
    private $idUsuario;
    private $idFacebook;
    private $idGoogle;
    private $nome;
    private $sobrenome;
    private $genero;
    private $aniversario;
    private $cidade;
    private $bairro;
    private $email;
        
    public function __construct($idUsuario=null, $idFacebook=null, $idGoogle=null, $nome=null, $sobrenome=null, 
    							$genero=null, $aniversario=null, $cidade=null, $bairro=null, $email=null)
    {
    	$this->idUsuario = $idUsuario;
    	$this->idFacebook = $idFacebook;
    	$this->idGoogle = $idGoogle;
    	$this->nome = $nome;
    	$this->sobrenome = $sobrenome;
    	$this->genero = $genero;
    	$this->aniversario = $aniversario;
    	$this->cidade = $cidade;
    	$this->bairro = $bairro;
    	$this->email = $email;
    }
        
    // getters
    public function getIdUsuario() {
		return $this->idUsuario;
	}

	public function getIdFacebook() {
		return $this->idFacebook;
	}

	public function getIdGoogle() {
		return $this->idGoogle;
	}
	
	public function getNome() {
		return $this->nome;
	}

	public function getSobrenome() {
		return $this->sobrenome;
	}
	
	public function getGenero() {
		return $this->genero;
	}
	
	public function getAniversario() {
		return $this->aniversario;
	}
	
	public function getCidade() {
		return $this->cidade;
	}
	
	public function getBairro() {
		return $this->bairro;
	}
    
    public function getEmail() {
		return $this->email;
	}
    
    
    // setters
    public function setIdUsuario($idUsuario) {
		$this->idUsuario = $idUsuario;
	}

	public function setIdFacebook($idFacebook) {
		$this->idFacebook = $idFacebook;
	}

	public function setIdGoogle($idGoogle) {
		$this->idGoogle = $idGoogle;
	}
	
	public function setNome($nome) {
		$this->nome = $nome;
	}

	public function setSobrenome($sobrenome) {
		$this->sobrenome = $sobrenome;
	}
	
	public function setGenero($genero) {
		$this->genero = $genero;
	}
	
	public function setAniversario($aniversario) {
		$this->aniversario = $aniversario;
	}
	
	public function setCidade($cidade) {
		$this->cidade = $cidade;
	}
	
	public function setBairro($bairro) {
		$this->bairro = $bairro;
	}
    
    public function setEmail($email) {
		$this->email = $email;
	}
}
  
?>
