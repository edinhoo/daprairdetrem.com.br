<?php
require_once "ConteudoDAO.php";

require_once(dirname(__FILE__))."/../VO/Imagem.php";
require_once(dirname(__FILE__))."/../VO/Video.php";
require_once(dirname(__FILE__))."/../VO/Evento.php";
require_once(dirname(__FILE__))."/../VO/Estabelecimento.php";

abstract class MidiaDAO extends ConteudoDAO {


	// Grava uma nova midia
	// Parametros:
	//	objeto: objeto das classes Imagem ou Video
    public function gravar($objeto) {
		$this->conectar();
		$midiaArray = array();

		$selecaoTrem = 0;
        if ($objeto->getSelecaoTrem()) {
        	$selecaoTrem = 1;
        }
        
		$query = "INSERT INTO " . $this->converterClasseParaTabela() . 
				 " (categoria, data_inclusao, id_estabelecimento, id_evento,
					id_usuario, link, selecao_trem) VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->conexao->prepare($query);

        $midiaArray[0] = $objeto->getCategoria();
        $midiaArray[1] = $objeto->getDataInclusao();
        $midiaArray[2] = $objeto->getIdEstabelecimento();
        $midiaArray[3] = $objeto->getIdEvento();
        $midiaArray[4] = $objeto->getIdUsuario();
		$midiaArray[5] = $objeto->getLink();
        $midiaArray[6] = $selecaoTrem;
        
        try { 
            $this->conexao->beginTransaction(); 
            $stmt->execute($midiaArray);
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
		
		if (!strcmp(get_class($atracao),"Evento")) {
			$id_atracao = "id_evento";
		}
		else {
			$id_atracao = "id_estabelecimento";
		}
		
		$query = "SELECT * FROM " . $this->converterClasseParaTabela() . " WHERE ".
				 $id_atracao . " = " . $atracao->getId();
		$i = 0;
		
		if (!strcmp($nome_tabela, "Imagens")) {
			$imagens = array();
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
			
				$i++;
			}	
			return $imagens;
		}

		$videos = array();
		foreach($this->conexao->query($query) as $linha) {
			$videos[$i] = new Video;

			$videos[$i]->setId($linha[0]);
			$videos[$i]->setCategoria($linha[1]);
			$videos[$i]->setDataInclusao($linha[2]);
			$videos[$i]->setIdEstabelecimento($linha[3]);
			$videos[$i]->setIdEvento($linha[4]);
			$videos[$i]->setIdUsuario($linha[5]);
            $videos[$i]->setLink($linha[6]);
            $videos[$i]->setSelecaoTrem($linha[7]);
			
			$i++;
		}
		return $videos;
	}

    
    // Retorna uma lista com todas as midias selecionadas pela equipe daprairdetrem,
    // de acordo com a classe do objeto que invoca o metodo. 
    // 		Ex: um objeto VideoDAO retorna uma lista de Video, enquanto um objeto
    //			ImagemDAO retorna uma lista de Imagem
	public function buscarMidiasSelecionadas() {
		$this->conectar();
		//$imagens = array();
		$nome_tabela = $this->converterClasseParaTabela();

		$query = "SELECT * FROM " . $nome_tabela . " WHERE selecao_trem = TRUE";

		$i = 0;

		if (!strcmp($nome_tabela, "Imagens")) {
			$imagens = array();
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
			
				$i++;
			}	
			return $imagens;
		}

		$videos = array();
		foreach($this->conexao->query($query) as $linha) {
			$videos[$i] = new Video;

			$videos[$i]->setId($linha[0]);
			$videos[$i]->setCategoria($linha[1]);
			$videos[$i]->setDataInclusao($linha[2]);
			$videos[$i]->setIdEstabelecimento($linha[3]);
			$videos[$i]->setIdEvento($linha[4]);
			$videos[$i]->setIdUsuario($linha[5]);
            $videos[$i]->setLink($linha[6]);
            $videos[$i]->setSelecaoTrem($linha[7]);
			
			$i++;
		}
		return $videos;				
	}

	// Atualiza os dados de uma midia
	// Parametros:
	//	objeto: objeto das classes Imagem ou Video
    public function atualizar($objeto) {
		$this->conectar();
		$midiaArray = array();
        
        $query = "UPDATE " . $this->converterClasseParaTabela() .  
        			" SET categoria = ?,
        			 	 link = ?,
        				 selecao_trem = ?
        		  	  WHERE id = ?";		
		
        $stmt = $this->conexao->prepare($query);

        $selecaoTrem = 0;
        if ($objeto->getSelecaoTrem()) {
        	$selecaoTrem = 1;
        }
        
        $midiaArray[0] = $objeto->getCategoria();
        $midiaArray[1] = $objeto->getLink();
        $midiaArray[2] = $selecaoTrem;
        $midiaArray[3] = $objeto->getId();

        try { 
            $this->conexao->beginTransaction(); 
            $stmt->execute($midiaArray); 
            $this->conexao->commit();
        }
        
        catch(PDOExecption $e) { 
            $this->conexao->rollback(); 
        }       
	}
}
  
?>
