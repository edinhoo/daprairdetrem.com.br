<?php
require_once "AtracaoDAO.php";
require_once(dirname(__FILE__))."/../VO/Estabelecimento.php";

class EstabelecimentoDAO extends AtracaoDAO {
	
    // Grava um novo estabelecimento
    // Parametros:
    //  objeto: objeto da classe Estabelecimento
    // Retorna:
    //  objeto: os mesmos dados de entrada e o id gerado
    public function gravar($objeto) {
		$this->conectar();
		$estabelecimentoArray = array();
        		
        $query = "INSERT INTO Estabelecimentos (nome, eh_bar, eh_restaurante, eh_centro_cultural, data_inclusao,
        										endereco, latitude, longitude, link_mapa, visualizacoes, id_usuario,
        										id_estacao) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->conexao->prepare($query);

        $eh_bar = 0;
        $eh_restaurante = 0;
        $eh_centro_cultural = 0;
        
        if ($objeto->getEhBar()) {
            $eh_bar = 1;
        }

        if ($objeto->getEhRestaurante()) {
            $eh_restaurante = 1;
        }

        if ($objeto->getEhCentroCultural()) {
            $eh_centro_cultural = 1;
        }
        
        $estabelecimentoArray[0] = $objeto->getNome();
        $estabelecimentoArray[1] = $eh_bar;
        $estabelecimentoArray[2] = $eh_restaurante;
        $estabelecimentoArray[3] = $eh_centro_cultural;
        $estabelecimentoArray[4] = $objeto->getDataInclusao();
        $estabelecimentoArray[5] = $objeto->getEndereco();
        $estabelecimentoArray[6] = $objeto->getLatitude();
        $estabelecimentoArray[7] = $objeto->getLongitude();
        $estabelecimentoArray[8] = $objeto->getLinkMapa();
        //$estabelecimentoArray[9] = $objeto->getVisualizacoes();
        $estabelecimentoArray[9] = 0;
        $estabelecimentoArray[10] = $objeto->getIdUsuario();
        $estabelecimentoArray[11] = $objeto->getIdEstacao();    
        
        try { 
            $this->conexao->beginTransaction(); 
            $stmt->execute($estabelecimentoArray);
            $objeto->setId($this->conexao->lastInsertId()); 
            $this->conexao->commit();
        }
        
        catch(PDOExecption $e) { 
            $this->conexao->rollback(); 
        }

        return $objeto;
	}

    // Busca um estabelecimento por id
    // Parametros:
    //  id: id do estabelecimento
    public function buscarPorId ($id) {
        $this->conectar();
        $estabelecimento = new Estabelecimento;

        
        $query = "SELECT * FROM Estabelecimentos WHERE id=" . $id;
        
        foreach($this->conexao->query($query) as $linha) {
            $estabelecimento->setId($linha[0]);
            $estabelecimento->setNome($linha[1]);      
            $estabelecimento->setDataInclusao($linha[2]);
            $estabelecimento->setEndereco($linha[3]);
            $estabelecimento->setLatitude($linha[4]);
            $estabelecimento->setLongitude($linha[5]);
            $estabelecimento->setLinkMapa($linha[6]);
            $estabelecimento->setWebsite($linha[7]);                      
            $estabelecimento->setVisualizacoes($linha[8]);                        
            $estabelecimento->setIdUsuario($linha[9]);
            $estabelecimento->setIdEstacao($linha[10]);
            $estabelecimento->setEhBar($linha[11]);
            $estabelecimento->setEhRestaurante($linha[12]);
            $estabelecimento->setEhCentroCultural($linha[13]);
            
        }
        
        return $estabelecimento;
        
    }

    // Retorna uma lista com todos os estabelecimentos de uma estacao
    // Parametros:
    //  id: id da estacao
	public function buscarPorIdEstacao ($id) {
		$this->conectar();
		$estabelecimentos = array();

		
		$query = "SELECT * FROM Estabelecimentos WHERE ".
				 "id_estacao=" . $id;
		$i = 0;
		foreach($this->conexao->query($query) as $linha) {
			$estabelecimentos[$i] = new Estabelecimento;
			$estabelecimentos[$i]->setId($linha[0]);
			$estabelecimentos[$i]->setNome($linha[1]);		
			$estabelecimentos[$i]->setEhBar($linha[2]);
			$estabelecimentos[$i]->setEhRestaurante($linha[3]);
			$estabelecimentos[$i]->setEhCentroCultural($linha[4]);
			$estabelecimentos[$i]->setDataInclusao($linha[5]);
			$estabelecimentos[$i]->setEndereco($linha[6]);
			$estabelecimentos[$i]->setLatitude($linha[7]);
			$estabelecimentos[$i]->setLongitude($linha[8]);
			$estabelecimentos[$i]->setLinkMapa($linha[9]);
			$estabelecimentos[$i]->setWebsite($linha[10]);						
			$estabelecimentos[$i]->setVisualizacoes($linha[11]);						
			$estabelecimentos[$i]->setIdUsuario($linha[12]);
			$estabelecimentos[$i]->setIdEstacao($linha[13]);
			//$estabelecimentos[$i]->loadListasConteudos();
			$i++;
		}
		
		return $estabelecimentos;
		
	}
    
    
	// Atualiza os dados de um estabelecimento
	// Parametros:
	//	objeto: objeto da classe estabelecimento
    public function atualizar($objeto) {
		$this->conectar();
		$estabelecimentoArray = array();
        
        $query = "UPDATE Estabelecimentos 
        			 SET nome = ?,
        				 endereco = ?,
        				 latitude = ?,
        				 longitude = ?,
        				 link_mapa = ?,
        				 website = ?,
        				 visualizacoes = ?,
        				 eh_bar = ?,
        				 eh_restaurante = ?,
        				 eh_centro_cultural = ?
        		   WHERE id = ?";		
		
        $eh_bar = 0;
        $eh_restaurante = 0;
        $eh_centro_cultural = 0;
        
        if ($objeto->getEhBar()) {
            $eh_bar = 1;
        }

        if ($objeto->getEhRestaurante()) {
            $eh_restaurante = 1;
        }

        if ($objeto->getEhCentroCultural()) {
            $eh_centro_cultural = 1;
        }

        $stmt = $this->conexao->prepare($query);
        
        $estabelecimentoArray[0] = $objeto->getNome();
        $estabelecimentoArray[1] = $objeto->getEndereco();
        $estabelecimentoArray[2] = $objeto->getLatitude();
        $estabelecimentoArray[3] = $objeto->getLongitude();
        $estabelecimentoArray[4] = $objeto->getLinkMapa();
        $estabelecimentoArray[5] = $objeto->getWebsite();
        $estabelecimentoArray[6] = $objeto->getVisualizacoes();
        $estabelecimentoArray[7] = $eh_bar;
        $estabelecimentoArray[8] = $eh_restaurante;
        $estabelecimentoArray[9] = $eh_centro_cultural;
        $estabelecimentoArray[10] = $objeto->getId();

        try { 
            $this->conexao->beginTransaction(); 
            $stmt->execute($estabelecimentoArray); 
            $this->conexao->commit();
        }
        
        catch(PDOExecption $e) { 
            $this->conexao->rollback(); 
        }       
	}

/*	// Funcao de exclusao de estacao
	// Parametros:
	// 	 id_estacao, id_usuario
	// Retorna:
	//	 true se autorizado ou false caso nao
	public function excluir($id_estabelecimento, $id_google, $id_facebook) {
		$id_usuario = this->retornarIdUsuario($id_google, $id_facebook);

		if ($id_usuario === null) {
			return false;
		}

		$permissoes = this->retornarPermissoesUsuario($id_usuario);

		if ($permissoes[13] || ( $permissoes[15] && ($id_usuario === $permissoes[0]))) {
			parent::excluir($id_estabelecimento, 'id', 'Estabelecimento');
			return true;
		}


		return false;
    }
*/
}
  
?>
