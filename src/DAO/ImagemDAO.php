<?php
require_once "MidiaDAO.php";
require_once(dirname(__FILE__))."/../VO/Imagem.php";

class ImagemDAO extends MidiaDAO {
	public function gerarListaImagens($atracao) {
		$this->conectar();
		$imagens = null;
		
		if (strcmp(get_class($atracao),"Evento")) {
			$id_atracao = "id_evento";
		}
		else {
			$id_atracao = "id_estabelecimento";
		}
		
		$query = "SELECT * FROM Imagens WHERE ".
				 $id_atracao . "=" . $atracao->getId();
		$i = 0;
		foreach($this->conexao->query($query) as $linha) {
			$imagens[$i] = new Imagem;
			$imagens[$i]->setId($linha[0]);
			$imagens[$i]->setLink($linha[1]);		
			$imagens[$i]->setCategoria($linha[2]);
			$imagens[$i]->setDataInclusao($linha[3]);
			$imagens[$i]->setIdEstabelecimento($linha[4]);
			$imagens[$i]->setIdEvento($linha[5]);
			$imagens[$i]->setIdUsuario($linha[6]);
			$i++;
		}	
		return $imagens;
	}
	
}
  
?>
