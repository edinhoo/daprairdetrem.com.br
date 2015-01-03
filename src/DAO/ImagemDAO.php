<?php
require_once "MidiaDAO.php";

class ImagemDAO extends MidiaDAO {
	// Retorna uma lista de imagens aleatorias da DB com tamanho num_imagens
    // Se num_imagens > total de imagens, o metodo retorna uma lista com todas
    // as imagens
    // 		Ex: um objeto VideoDAO retorna uma lista de Video, enquanto um objeto
    //			ImagemDAO retorna uma lista de Imagem
	public function gerarListaImagensAleatorias($num_imagens) {
		$this->conectar();
		
		$ultimo_id = 0;
		$query = "SELECT id FROM Imagens ORDER BY id DESC LIMIT 1";
		foreach($this->conexao->query($query) as $linha) {
			$ultimo_id = $linha[0];
		}

		$i = 0;
		
		if ($num_imagens >= $ultimo_id) {
			$query = "SELECT * FROM Imagens";

			foreach($this->conexao->query($query) as $linha) {
				$imagens[$i] = new Imagem;
				$imagens[$i]->setId($linha[0]);
				$imagens[$i]->setCategoria($linha[1]);
				$imagens[$i]->setDataInclusao($linha[2]);
				$imagens[$i]->setIdEstabelecimento($linha[3]);
				$imagens[$i]->setIdEvento($linha[4]);
				$imagens[$i]->setIdUsuario($linha[5]);
				$imagens[$i]->setLink($linha[6]);
				$imagens[$i]->setSelecaoTrem($linha[7]);
			
			}	
			return $imagens;
		}

		$imagem = new Imagem; 

		for ($i=0; $i < $num_imagens; $i++) { 
			$query = "SELECT * FROM Imagens WHERE id=" . mt_rand(1, $ultimo_id);
			
			$imagens[$i] = new Imagem;

			foreach($this->conexao->query($query) as $linha) {
				$imagens[$i]->setId($linha[0]);
				$imagens[$i]->setCategoria($linha[1]);
				$imagens[$i]->setDataInclusao($linha[2]);
				$imagens[$i]->setIdEstabelecimento($linha[3]);
				$imagens[$i]->setIdEvento($linha[4]);
				$imagens[$i]->setIdUsuario($linha[5]);
				$imagens[$i]->setLink($linha[6]);
				$imagens[$i]->setSelecaoTrem($linha[7]);
			}

			if ($imagens[$i]->getId() === null) {
				$i--;
			}

		}
		return $imagens;				
	}

/*
	// Normaliza os ids
	// Parametros:
	//	id_inicial: id inicial para ordenacao
    public function sequenciarIds($id_inicial) {
		$this->conectar();
		$idArray = array();
        		
		$query = "SET @id = ?;
                  UPDATE Imagens SET id = @id:= @id + 1";
        
        $stmt = $this->conexao->prepare($query);
        
        $idArray[0] = $id_inicial - 1;

        try { 
            $this->conexao->beginTransaction(); 
            $stmt->execute($idArray); 
            $this->conexao->commit();
        }
        
        catch(PDOExecption $e) { 
            $this->conexao->rollback(); 
        } 
	}

	// Exclui um conteudo por id
	// Parametros:
	//	id: id do conteudo	
	public function excluirPorId($id) {
		parent::excluir($id, 'id', $this->converterClasseParaTabela());
	}

	// Exclui todos os conteudos de uma classe postados por um usuario
	// Parametros:
	//	id: id do usuario
	public function excluirPorIdUsuario($id) {
		parent::excluir($id, 'id_usuario', $this->converterClasseParaTabela());
	}

	// Exclui todos os conteudos de um tipo de um estabelecimento
	// Parametros:
	//	id: id do estabelecimento
	public function excluirPorIdEstabelecimento($id) {
		parent::excluir($id, 'id_estabelecimento', $this->converterClasseParaTabela());
	}

	public function excluirPorIdEvento($id) {
		parent::excluir($id, 'id_evento', $this->converterClasseParaTabela());
	}
*/
}
  
?>
