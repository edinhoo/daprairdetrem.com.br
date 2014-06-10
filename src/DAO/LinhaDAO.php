<?php
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
	
}
  
?>
