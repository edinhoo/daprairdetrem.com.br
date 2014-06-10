<?php
require_once "MidiaDAO.php";
require_once(dirname(__FILE__))."/../VO/Video.php";

class VideoDAO extends MidiaDAO {
	public function gerarListaVideos($atracao) {
		$this->conectar();
		$videos = null;
		$atracoes = null;
		
		if (strcmp(get_class($atracao),"Evento")) {
			$id_atracao = "id_evento";
		}
		else {
			$id_atracao = "id_estabelecimento";
		}
		
		$query = "SELECT * FROM Videos WHERE ".
				 $id_atracao . "=" . $atracao->getId();
		$i = 0;
		foreach($this->conexao->query($query) as $linha) {
			$videos[$i] = new Video;
			$videos[$i]->setId($linha[0]);
			$videos[$i]->setLink($linha[1]);		
			$videos[$i]->setCategoria($linha[2]);
			$videos[$i]->setDataInclusao($linha[3]);
			$videos[$i]->setIdEstabelecimento($linha[4]);
			$videos[$i]->setIdEvento($linha[5]);
			$videos[$i]->setIdUsuario($linha[6]);
			$i++;
		}
		
		return $videos;
		
	}
	
}
  
?>
