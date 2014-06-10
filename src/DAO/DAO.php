<?php
abstract class DAO {
    protected $conexao;
    private $host;
    private $usuario;
    private $senha;
    private $database;
    
    // Construtor. Inicializa as variaveis de conexao
    public function DAO () {
		$this->host = "localhost";
		$this->usuario = "root";
		$this->senha = "1234";
		$this->database = "daprairdetrem";
	}
		
    // Conecta o objeto ao banco de dados
    protected function conectar() {
        try {
			$this->conexao = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database,
									$this->usuario, $this->senha);
			$this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (Exception $e){
            echo $e->getMessage();
        }
    }
    
    // Desconecta o objeto do banco de dados
    protected function desconectar() {
		$this->conexao = null;
	}
		
	// Destrutor com desconexao	
	public function __destruct() {
		$this->desconectar();
	}
	
	// Prototipos CRUD
	//abstract public function gravar($objeto);
	
	//abstract public function excluir($objeto);
	
	//abstract public function alterar($objeto);
	
	//abstract public function buscarPorID($objeto);
	
	//abstract public function buscarPorAtributoID($valor,$atributo);	
	
	//abstract public function buscarPorAtributoStr($valor,$atributo);	
	
	
}
  
?>
