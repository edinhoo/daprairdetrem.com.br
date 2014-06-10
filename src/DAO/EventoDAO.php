<?php
require_once "AtracaoDAO.php";
require_once(dirname(__FILE__))."/../VO/Evento.php";

class EventoDAO extends AtracaoDAO {
	public function gerarListaEventos ($estacao) {
		$this->conectar();
		$eventos = null;
		
		$query = "SELECT * FROM Eventos WHERE ".
				 "id_estacao=" . $estacao->getId();
		$i = 0;
		foreach($this->conexao->query($query) as $linha) {
			$eventos[$i] = new Evento;
			$eventos[$i]->setId($linha[0]);
			$eventos[$i]->setNome($linha[1]);		
			$eventos[$i]->setInfoEvento($linha[2]);
			$eventos[$i]->setDataInclusao($linha[3]);
			$eventos[$i]->setEndereco($linha[4]);
			$eventos[$i]->setLatitude($linha[5]);
			$eventos[$i]->setLongitude($linha[6]);			
			$eventos[$i]->setIdUsuario($linha[7]);
			$eventos[$i]->setIdEstacao($linha[8]);
			$eventos[$i]->loadListasConteudos();
			$i++;
		}
		
		return $eventos;
		
	}
	
}
  
?>
