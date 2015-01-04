
<?php
require_once "AtracaoDAO.php";
require_once(dirname(__FILE__))."/../VO/Evento.php";

class EventoDAO extends AtracaoDAO {

	// Grava um novo evento
	// Parametros:
	//	objeto: objeto da classe Evento
    public function gravar($objeto) {
		$this->conectar();
		$eventoArray = array();
        		
        $query = "INSERT INTO Eventos (nome, data_inclusao, endereco, latitude, longitude, link_mapa, website, vizualizacoes,
        								id_usuario, id_estacao, info_evento) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->conexao->prepare($query);
         
        $eventoArray[0] = $objeto->getNome();
        $eventoArray[1] = $objeto->getDataInclusao();
        $eventoArray[2] = $objeto->getEndereco();
        $eventoArray[3] = $objeto->getLatitude();
        $eventoArray[4] = $objeto->getLongitude();
        $eventoArray[5] = $objeto->getLinkMapa();
        $eventoArray[6] = $objeto->getWebsite();
        //$eventoArray[7] = $objeto->getVizualizacoes();
        $eventoArray[7] = 0;
        $eventoArray[8] = $objeto->getIdUsuario();
        $eventoArray[9] = $objeto->getIdEstacao();    
        $eventoArray[10] = $objeto->getInfoEvento();
        

        try { 
            $this->conexao->beginTransaction(); 
            $stmt->execute($eventoArray); 
            $this->conexao->commit();
        }
        
        catch(PDOExecption $e) { 
            $this->conexao->rollback(); 
        }          
	}

	// Busca um evento por id
	// Parametros:
	//	id: id do evento
	public function buscarPorId ($id) {
		$this->conectar();
		$evento = new Evento;

		$query = "SELECT * FROM Eventos WHERE id=" . $id;

		foreach($this->conexao->query($query) as $linha) {
			$evento->setId($linha[0]);
			$evento->setNome($linha[1]);		
			$evento->setDataInclusao($linha[2]);
			$evento->setEndereco($linha[3]);
			$evento->setLatitude($linha[4]);
			$evento->setLongitude($linha[5]);
			$evento->setLinkMapa($linha[6]);
			$evento->setWebsite($linha[7]);
			$evento->setVizualizacoes($linha[8]);			
			$evento->setIdUsuario($linha[9]);
			$evento->setIdEstacao($linha[10]);
			$evento->setInfoEvento($linha[11]);
		}
		return $evento;

	}

	// Retorna uma lista com todos os eventos de uma estacao
	// Parametros:
	//	id: id da estacao	
	public function buscarPorIdEstacao ($id) {
		$this->conectar();
		$eventos = array();
		
		$query = "SELECT * FROM Eventos WHERE id_estacao = " . $id;

		$i = 0;
		foreach($this->conexao->query($query) as $linha) {
			$eventos[$i] = new Evento;
			$eventos[$i]->setId($linha[0]);
			$eventos[$i]->setNome($linha[1]);		
			$eventos[$i]->setDataInclusao($linha[2]);
			$eventos[$i]->setEndereco($linha[3]);
			$eventos[$i]->setLatitude($linha[4]);
			$eventos[$i]->setLongitude($linha[5]);
			$eventos[$i]->setLinkMapa($linha[6]);
			$eventos[$i]->setWebsite($linha[7]);
			$eventos[$i]->setVizualizacoes($linha[8]);			
			$eventos[$i]->setIdUsuario($linha[9]);
			$eventos[$i]->setIdEstacao($linha[10]);
			$eventos[$i]->setInfoEvento($linha[11]);
			//$eventos[$i]->loadListasConteudos();
			
			$i++;
		}
		return $eventos;		
	}

	// Atualiza os dados de um evento
	// Parametros:
	//	objeto: objeto da classe Evento
    public function atualizar($objeto) {
		$this->conectar();
		$eventoArray = array();
        
        $query = "UPDATE Eventos 
        			 SET nome = ?,
        				 endereco = ?,
        				 latitude = ?,
        				 longitude = ?,
        				 link_mapa = ?,
        				 website = ?,
        				 id_estacao = ?,
        				 vizualizacoes = ?
        		   WHERE id = ?";		
		
        $stmt = $this->conexao->prepare($query);
        
        $eventoArray[0] = $objeto->getNome();
        $eventoArray[1] = $objeto->getEndereco();
        $eventoArray[2] = $objeto->getLatitude();
        $eventoArray[3] = $objeto->getLongitude();
        $eventoArray[4] = $objeto->getLinkMapa();
        $eventoArray[5] = $objeto->getWebsite();
        $eventoArray[6] = $objeto->getVizualizacoes();
        $eventoArray[7] = $objeto->getIdEstacao();
        $eventoArray[8] = $objeto->getId();

        try { 
            $this->conexao->beginTransaction(); 
            $stmt->execute($eventoArray); 
            $this->conexao->commit();
        }
        
        catch(PDOExecption $e) { 
            $this->conexao->rollback(); 
        }       
	}

/*	// Faz uma busca atraves de palavras-chave
	public function buscarPorTexto ($texto) {
		$this->conectar();
		$eventos = array();


		$query = "SELECT * FROM Eventos WHERE MATCH (nome) AGAINST (" .
				 $this->conexao->quote($texto) .
				 ") IN NATURAL LANGUAGE MODE)";

		$i = 0;
		foreach($this->conexao->query($query) as $linha) {
			$eventos[$i] = new Evento;
			$eventos[$i]->setId($linha[0]);
			$eventos[$i]->setNome($linha[1]);		
			$eventos[$i]->setDataInclusao($linha[2]);
			$eventos[$i]->setEndereco($linha[3]);
			$eventos[$i]->setLatitude($linha[4]);
			$eventos[$i]->setLongitude($linha[5]);
			$eventos[$i]->setLinkMapa($linha[6]);
			$eventos[$i]->setWebsite($linha[7]);
			$eventos[$i]->setVizualizacoes($linha[8]);			
			$eventos[$i]->setIdUsuario($linha[9]);
			$eventos[$i]->setIdEstacao($linha[10]);
			$eventos[$i]->setInfoEvento($linha[11]);
			//$eventos[$i]->loadListasConteudos();
			
			$i++;
		}
		return $eventos;		
	}
*/	
    


/*	public function excluir($id_evento, $id_google, $id_facebook) {
		$id_usuario = this->retornarIdUsuario($id_google, $id_facebook);

		if ($id_usuario === null) {
			return false;
		}

		$permissoes = this->retornarPermissoesUsuario($id_usuario);

		if ($permissoes[13] || ( $permissoes[15] && ($id_usuario === $permissoes[0]))) {
			parent::excluir($id_evento, 'id', 'Evento');
			return true;
		}


		return false;
    }
*/
}
  
?>
