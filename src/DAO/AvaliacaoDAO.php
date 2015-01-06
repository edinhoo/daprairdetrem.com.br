<?php
require_once "ConteudoDAO.php";
require_once(dirname(__FILE__))."/../VO/Avaliacao.php";
require_once(dirname(__FILE__))."/../VO/Evento.php";
require_once(dirname(__FILE__))."/../VO/Estabelecimento.php";

class AvaliacaoDAO extends ConteudoDAO {

	// Grava uma nova avaliacao
	// Parametros:
	//	objeto: objeto da classe Avaliacao
    public function gravar($objeto) {
		$this->conectar();
		$avaliacaoArray = array();
        		
        $query = "INSERT INTO Avaliacoes (categoria, data_inclusao, id_estabelecimento, id_evento,
                                            id_usuario, nota) VALUES (?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->conexao->prepare($query);
        
        $avaliacaoArray[0] = $objeto->getCategoria();
        $avaliacaoArray[1] = $objeto->getDataInclusao();
        $avaliacaoArray[2] = $objeto->getIdEstabelecimento();
        $avaliacaoArray[3] = $objeto->getIdEvento();
        $avaliacaoArray[4] = $objeto->getIdUsuario();
        $avaliacaoArray[5] = $objeto->getNota();
        
        try { 
            $this->conexao->beginTransaction(); 
            $stmt->execute($avaliacaoArray);
            $objeto->setId($this->conexao->lastInsertId());
            $this->conexao->commit();
        }
        
        catch(PDOExecption $e) { 
            $this->conexao->rollback(); 
        }  
        return $objeto;
	}

	// Retorna uma lista com todas as midias de um estabelecimento ou evento,
	// de acordo com a classe do objeto que invoca o metodo
	// 		Ex: um objeto VideoDAO retorna uma lista de Video, enquanto um objeto
    //			ImagemDAO retorna uma lista de Imagem
    //
	// Parametros:
	//	atracao: objeto das classes Estabelecimento ou Evento	
	public function buscarPorIdAtracao($atracao) {
		$this->conectar();
		$avaliacoes = array();
		
		if (!strcmp(get_class($atracao),"Evento")) {
			$id_atracao = "id_evento";
		}
		else {
			$id_atracao = "id_estabelecimento";
		}
		
		$query = "SELECT * FROM Avaliacoes WHERE ".
				 $id_atracao . "=" . $atracao->getId();
		$i = 0;
		foreach($this->conexao->query($query) as $linha) {
			$avaliacoes[$i] = new Avaliacao;
			$avaliacoes[$i]->setId($linha[0]);
			$avaliacoes[$i]->setCategoria($linha[1]);
			$avaliacoes[$i]->setDataInclusao($linha[2]);
			$avaliacoes[$i]->setIdEstabelecimento($linha[3]);
			$avaliacoes[$i]->setIdEvento($linha[4]);
			$avaliacoes[$i]->setIdUsuario($linha[5]);
            $avaliacoes[$i]->setNota($linha[6]);        
            
			$i++;
		}
		return $avaliacoes;
	}
        
    
	// Atualiza os dados de uma avaliacao
	// Parametros:
	//	objeto: objeto da classe avaliacao
    public function atualizar($objeto) {
		$this->conectar();
		$avaliacaoArray = array();
        
        $query = "UPDATE Avaliacoes 
        			 SET nota = ?
        		   WHERE id = ?";		
		
        $stmt = $this->conexao->prepare($query);
        
        $avaliacaoArray[0] = $objeto->getNota();
        $avaliacaoArray[1] = $objeto->getId();

        try { 
            $this->conexao->beginTransaction(); 
            $stmt->execute($avaliacaoArray); 
            $this->conexao->commit();
        }
        
        catch(PDOExecption $e) { 
            $this->conexao->rollback(); 
        }       
	}
	

}
  
?>
