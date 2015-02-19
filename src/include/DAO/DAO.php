<?php
require_once (dirname(__FILE__))."/../config.php";

abstract class DAO {
    protected $conexao;
    private $host;
    private $usuario;
    private $senha;
    private $database;
    //private $tam_tab_permissoes;
    
    // Metodos de construcao e destrucao; conexao e desconexao
    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
    
    // Construtor. Inicializa as variaveis de conexao
    public function DAO () {
		// $this->host = "localhost";
		// $this->usuario = "root";
		// $this->senha = "1234";
		// $this->database = "daprairdetrem";
        $this->host = DB_HOST;
        $this->usuario = DB_USUARIO;
        $this->senha = DB_SENHA;
        $this->database = DB_DATABASE;
        
		//$this->tam_tab_permissoes = 16;
	}
	
	// Destrutor com desconexao	
	public function __destruct() {
		$this->desconectar();
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
	
	/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
    	
    // Metodos CRUD
    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
    	
	// Prototipo de gravacao
	abstract public function gravar($objeto);

    // Prototipo de atualizacao
    abstract public function atualizar($objeto);

	// Funcao generica de exclusao por tipo de id
    // id: int
    // tipo_id: nome do id 
    // tabela: nome da tabela na DB
	protected function excluir($id, $tipo_id, $tabela) {
    	$this->conectar();
    	$arrayExecucao = array();

        $query = "DELETE FROM " . $tabela . " WHERE " . $tipo_id . " = ?";
        
        $stmt = $this->conexao->prepare($query);

        $arrayExecucao[0] = $id;

        try { 
            $this->conexao->beginTransaction(); 
            $stmt->execute($arrayExecucao); 
            $this->conexao->commit();
        }
        
        catch(PDOExecption $e) { 
            $this->conexao->rollback(); 
        }
    }

	
	
	//abstract public function buscarPorAtributoID($valor,$atributo);	
	
	//abstract public function buscarPorAtributoStr($valor,$atributo);	

    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */


    // Colocar em outro arquivo, separar a autenticacao do resto
    // Metodos auxiliares
    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

    // Retorna as permissoes de um usuario
    // id: id do usuario
    // Formato de retorno:
    // 0:     id
    // 1-4:   adicionar:         estacao, atracao, conteudo, usuario
    // 5-8:   alterar:           estacao, atracao, conteudo, usuario
    // 9-11:  alteracao propria: atracao, conteudo, usuario
    // 12-14: excluir:           estacao, atracao, conteudo
    // 15-16: exclusao propria:  atracao, conteudo
 /*   protected function retornarPermissoesUsuario($id) {
    	$this->conectar();
    	
    	$query = "SELECT * FROM Papeis 
    			  LEFT OUTER JOIN Permissoes ON Papeis.id_permissao = Permissoes.id 
    			  WHERE Papeis.id_usuario = " . $id;

		$permissoes = array();
		foreach ($this->conexao->query($query) as $resultado) {
			$permissoes = $resultado;
		}
		return $permissoes;
    }
*/

    // Converte o nome da classe para a tabela adequada
    protected function converterClasseParaTabela() {
        $nome_classe = get_class($this);
        $nome_tabela = "";


        switch ($nome_classe) {
            case "EstacaoDAO":
                $nome_tabela = substr(get_class($this), 0, -5) . 'oes';
                break;
            case "AvaliacaoDAO":
                $nome_tabela = substr(get_class($this), 0, -5) . 'oes';
                break;
            case "ImagemDAO":
                $nome_tabela = substr(get_class($this), 0, -4) . 'ns';
                break;      
            default:    
                $nome_tabela = substr(get_class($this), 0, -3) . 's';
        }
        return $nome_tabela;
    }


}
  
?>
