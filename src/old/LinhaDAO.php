<?php
// adicionar load de estacoes para todas as linhas
// avaliar se eh possivel fazer o load de todos os eventos/estabelecimentos tambem
require_once "DAO.php";
require_once(dirname(__FILE__)."/../VO/Linha.php");

class LinhaDAO extends DAO {
	public function gerarListaLinhas() {
		$this->conectar();
		$linhas = null;
		
		$query = "SELECT * FROM Linhas";
		$i = 0;
		
		foreach($this->conexao->query($query) as $resultado) {
			$linhas[$i] = new Linha;
			$linhas[$i]->setId($resultado[0]);
			$linhas[$i]->setNome($resultado[1]);
			$i++;
		}	
		return $linhas;
	}
    
    // Grava uma nova linha
    public function gravar($objeto) {
		$this->conectar();
		$linhaArray = array();
        		
		$query = "INSERT INTO Linhas (nome) VALUES (?)";
        
        $stmt = $this->conexao->prepare($query);
        
        $linhaArray[0] = $objeto->getNome();

        try { 
            $this->conexao->beginTransaction(); 
            $stmt->execute($linhaArray); 
            $this->conexao->commit();
        }
        
        catch(PDOExecption $e) { 
            $this->conexao->rollback(); 
        } 
	}

}
  
?>
