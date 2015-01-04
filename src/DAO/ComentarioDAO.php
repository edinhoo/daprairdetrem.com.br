<?php
require_once "ConteudoDAO.php";
require_once(dirname(__FILE__))."/../VO/Comentario.php";
require_once(dirname(__FILE__))."/../VO/Evento.php";
require_once(dirname(__FILE__))."/../VO/Estabelecimento.php";

class ComentarioDAO extends ConteudoDAO {

	// Grava uma nova avaliacao
	// Parametros:
	//	objeto: objeto da classe Comentario
    public function gravar($objeto) {
		$this->conectar();
		$comentarioArray = array();
        		
        $query = "INSERT INTO Comentarios (categoria, data_inclusao, id_estabelecimento, id_evento,
        									id_usuario, texto) VALUES (?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->conexao->prepare($query);
        
        $comentarioArray[0] = $objeto->getCategoria();
        $comentarioArray[1] = $objeto->getDataInclusao();
        $comentarioArray[2] = $objeto->getIdEstabelecimento();
        $comentarioArray[3] = $objeto->getIdEvento();
        $comentarioArray[4] = $objeto->getIdUsuario();
        $comentarioArray[5] = $objeto->getTexto();
        
        try { 
            $this->conexao->beginTransaction(); 
            $stmt->execute($comentarioArray); 
            $this->conexao->commit();
        }
        
        catch(PDOExecption $e) { 
            $this->conexao->rollback(); 
        }  
        
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
		$comentarios = array();
		
		if (!strcmp(get_class($atracao),"Evento")) {
			$id_atracao = "id_evento";
		}
		else {
			$id_atracao = "id_estabelecimento";
		}
		
		$query = "SELECT * FROM Comentarios WHERE ".
				 $id_atracao . "=" . $atracao->getId();
		$i = 0;
		foreach($this->conexao->query($query) as $linha) {
			$comentarios[$i] = new Comentario;
			$comentarios[$i]->setId($linha[0]);
			$comentarios[$i]->setCategoria($linha[1]);
			$comentarios[$i]->setDataInclusao($linha[2]);
			$comentarios[$i]->setIdEstabelecimento($linha[3]);
			$comentarios[$i]->setIdEvento($linha[4]);
			$comentarios[$i]->setIdUsuario($linha[5]);
			$comentarios[$i]->setTexto($linha[6]);
			$i++;
		}
		
		return $comentarios;
		
	}
    
    // Atualiza os dados de uma comentario
	// Parametros:
	//	objeto: objeto da classe comentario
    public function atualizar($objeto) {
		$this->conectar();
		$comentarioArray = array();
        
        $query = "UPDATE Comentarios 
        			 SET texto = ?
        		   WHERE id = ?";		
		
        $stmt = $this->conexao->prepare($query);
        
        $comentarioArray[0] = $objeto->getTexto();
        $comentarioArray[1] = $objeto->getId();

        try { 
            $this->conexao->beginTransaction(); 
            $stmt->execute($comentarioArray); 
            $this->conexao->commit();
        }
        
        catch(PDOExecption $e) { 
            $this->conexao->rollback(); 
        }       
	}
    
	
}
  
?>
