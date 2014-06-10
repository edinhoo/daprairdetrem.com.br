<?php
require_once "AtracaoDAO.php";
require_once(dirname(__FILE__))."/../VO/Estabelecimento.php";

class EstabelecimentoDAO extends AtracaoDAO {
	public function gerarListaEstabelecimentos ($estacao) {
		$this->conectar();
		$estabelecimentos = null;
		
		$query = "SELECT * FROM Estabelecimentos WHERE ".
				 "id_estacao=" . $estacao->getId();
		$i = 0;
		foreach($this->conexao->query($query) as $linha) {
			$estabelecimentos[$i] = new Estabelecimento;
			$estabelecimentos[$i]->setId($linha[0]);
			$estabelecimentos[$i]->setNome($linha[1]);		
			$estabelecimentos[$i]->setTipo($linha[2]);
			$estabelecimentos[$i]->setDataInclusao($linha[3]);
			$estabelecimentos[$i]->setEndereco($linha[4]);
			$estabelecimentos[$i]->setLatitude($linha[5]);
			$estabelecimentos[$i]->setLongitude($linha[6]);			
			$estabelecimentos[$i]->setIdUsuario($linha[7]);
			$estabelecimentos[$i]->setIdEstacao($linha[8]);
			$estabelecimentos[$i]->loadListasConteudos();
			$i++;
		}
		
		return $estabelecimentos;
		
	}
	
}
  
?>
