<?php
require_once "ConteudoDAO.php";
require_once(dirname(__FILE__))."/../VO/Avaliacao.php";

class AvaliacaoDAO extends ConteudoDAO {
	public function gerarListaAvaliacoes($atracao) {
		$this->conectar();
		$avaliacoes = null;
		$atracoes = null;
		
		if (strcmp(get_class($atracao),"Evento")) {
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
			$avaliacoes[$i]->setNota($linha[1]);		
			$avaliacoes[$i]->setCategoria($linha[2]);
			$avaliacoes[$i]->setDataInclusao($linha[3]);
			$avaliacoes[$i]->setIdEstabelecimento($linha[4]);
			$avaliacoes[$i]->setIdEvento($linha[5]);
			$avaliacoes[$i]->setIdUsuario($linha[6]);
			$i++;
		}
		
		return $avaliacoes;
		
	}
	
}
  
?>
