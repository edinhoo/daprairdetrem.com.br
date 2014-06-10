<?php
require_once "ConteudoDAO.php";
require_once(dirname(__FILE__))."/../VO/Comentario.php";

class ComentarioDAO extends ConteudoDAO {
	public function gerarListaComentarios($atracao) {
		$this->conectar();
		$comentarios = null;
		$atracoes = null;
		
		if (strcmp(get_class($atracao),"Evento")) {
			$id_atracao = "id_evento";
		}
		else {
			$id_atracao = "id_estabelecimento";
		}
		
		$query = "SELECT * FROM Comentarios WHERE ".
				 $id_atracao . "=" . $atracao->getId();
		$i = 0;
		foreach($this->conexao->query($query) as $linha) {
			$comentarios[$i] = new Comentario;
			$comentarios[$i]->setId($linha[0]);
			$comentarios[$i]->setTexto($linha[1]);		
			$comentarios[$i]->setCategoria($linha[2]);
			$comentarios[$i]->setDataInclusao($linha[3]);
			$comentarios[$i]->setIdEstabelecimento($linha[4]);
			$comentarios[$i]->setIdEvento($linha[5]);
			$comentarios[$i]->setIdUsuario($linha[6]);
			$i++;
		}
		
		return $comentarios;
		
	}
	
}
  
?>
