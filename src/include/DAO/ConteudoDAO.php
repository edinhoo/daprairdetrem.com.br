<?php
require_once 'DAO.php';

abstract class ConteudoDAO extends DAO {


	abstract public function buscarPorIdAtracao($atracao);

	// Exclui um conteudo por id
	// Parametros:
	//	id: id do conteudo	
	public function excluirPorId($id) {
		parent::excluir($id, 'id', $this->converterClasseParaTabela());
	}

	// Exclui todos os conteudos de uma classe postados por um usuario
	// Parametros:
	//	id: id do usuario
	public function excluirPorIdUsuario($id) {
		parent::excluir($id, 'id_usuario', $this->converterClasseParaTabela());
	}

	// Exclui todos os conteudos de um tipo de um estabelecimento
	// Parametros:
	//	id: id do estabelecimento
	public function excluirPorIdEstabelecimento($id) {
		parent::excluir($id, 'id_estabelecimento', $this->converterClasseParaTabela());
	}

	public function excluirPorIdEvento($id) {
		parent::excluir($id, 'id_evento', $this->converterClasseParaTabela());
	}
	
}
  
?>
