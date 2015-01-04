<?php
require_once "DAO.php";
require_once "EventoDAO.php";
require_once "EstabelecimentoDAO.php";

require_once(dirname(__FILE__))."/../VO/Estacao.php";

class EstacaoDAO extends DAO {
	
	// Removido devido a remocao das estruturas de linhas
	/*
	public function gerarListaEstacoes ($linha) {
		$this->conectar();
		$estacoes = null;
		
		$i = 0;
		
		$query = "SELECT * FROM Estacoes " .
				 "LEFT OUTER JOIN LinhasEstacoes ON Estacoes.id = LinhasEstacoes.id_estacao " .
				 "LEFT OUTER JOIN Linhas ON LinhasEstacoes.id_linha = Linhas.id " .
				 "WHERE LinhasEstacoes.id_linha = " . $linha->getId() . " " . 
				 "ORDER BY num_estacao ASC";
		
		foreach($this->conexao->query($query) as $resultado) {
			$estacoes[$i] = new Estacao();
			$estacoes[$i]->setId($resultado[0]);
			$estacoes[$i]->setNome($resultado[1]);		
			$estacoes[$i]->setEndereco($resultado[2]);
			$estacoes[$i]->setLatitude($resultado[3]);
			$estacoes[$i]->setLongitude($resultado[4]);
			$estacoes[$i]->setLinkMapa($resultado[5]);
			$i++;
		}
		
		return $estacoes;	
	}
	*/
    
    // Grava uma nova estacao
	// Parametros:
	//	objeto: objeto da classe Estacao
    public function gravar($objeto) {
		$this->conectar();
		$estacaoArray = array();
        		
		$query = "INSERT INTO Estacoes (nome, endereco, latitude, longitude, link_mapa) 
                 VALUES (?, ?, ?, ?, ?)";
        
        $stmt = $this->conexao->prepare($query);
        
        $estacaoArray[0] = $objeto->getNome();
        $estacaoArray[1] = $objeto->getEndereco();
        $estacaoArray[2] = $objeto->getLatitude();
        $estacaoArray[3] = $objeto->getLongitude(); 
        $estacaoArray[4] = $objeto->getLinkMapa(); 

        try { 
            $this->conexao->beginTransaction(); 
            $stmt->execute($estacaoArray); 
            $this->conexao->commit();
        }
        
        catch(PDOExecption $e) { 
            $this->conexao->rollback(); 
        } 
	}

	// Atualiza os dados de uma estacao
	// Parametros:
	//	objeto: objeto da classe Estacao
    public function atualizar($objeto) {
		$this->conectar();
		$estacaoArray = array();
        
        $query = "UPDATE Estacoes 
        			 SET nome = ?,
        				 endereco = ?,
        				 latitude = ?,
        				 longitude = ?,
        				 link_mapa = ?
        		   WHERE id = ?";		
		
        $stmt = $this->conexao->prepare($query);
        
        $estacaoArray[0] = $objeto->getNome();
        $estacaoArray[1] = $objeto->getEndereco();
        $estacaoArray[2] = $objeto->getLatitude();
        $estacaoArray[3] = $objeto->getLongitude();
        $estacaoArray[4] = $objeto->getLinkMapa();
        $estacaoArray[5] = $objeto->getId();

        try { 
            $this->conexao->beginTransaction(); 
            $stmt->execute($estacaoArray); 
            $this->conexao->commit();
        }
        
        catch(PDOExecption $e) { 
            $this->conexao->rollback(); 
        }       
	}

	// Exclui uma estacao por id e todas as atracoes associadas
	// Parametros:
	//	id: id da estacao
	public function excluirPorId($id) {
		$estabelecimentoDAO = new EstabelecimentoDAO;
		$eventoDAO = new EventoDAO;

		$estabelecimentoDAO->excluirPorIdEstacao($id);
		$eventoDAO->excluirPorIdEstacao($id);		
		
		parent::excluir($id, 'id', 'Estacoes');
	}

	// Funcao de exclusao de estacao
	// Parametros:
	// 	 id_estacao, id_usuario
	// Retorna:
	//	 true se autorizado ou false caso nao
/*	public function excluir($id_estacao, $id_usuario) {
		$permissoes = this->retornarPermissoesUsuario($id_usuario);

		if ($permissoes[12]) {
			parent::excluir($id_estacao, 'id', 'Estacao');
			return true;
		}
		return false;
    }
*/    
}
  
?>
