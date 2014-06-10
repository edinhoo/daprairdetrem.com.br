<?php
require_once "DAO.php";
require_once(dirname(__FILE__))."/../VO/Estacao.php";

class EstacaoDAO extends DAO {
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
			$i++;
		}
		
		return $estacoes;
		
	}
	
}
  
?>
