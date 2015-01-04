<?php
require_once 'DAO.php';
require_once 'AvaliacaoDAO.php';
require_once 'ComentarioDAO.php';
require_once 'ImagemDAO.php';
require_once 'VideoDAO.php';
require_once(dirname(__FILE__))."/../VO/Atracao.php";

abstract class AtracaoDAO extends DAO {

	// Busca uma atracao por id
	// Parametros:
	//	id: id da atracao
	abstract public function buscarPorId ($id);


	// Busca uma atracao pelo id de uma estacao
	// Parametros:
	//	id: id da estacao
	abstract public function buscarPorIdEstacao ($id);

	// Carrega todo o conteudo associonado a uma atracao
	// Parametros:
	// 	atracao: objeto de uma subclasse de atracao
	public function carregarConteudo($atracao) {
        $comentarioDAO = new ComentarioDAO();
        $avaliacaoDAO = new AvaliacaoDAO();
        $imagemDAO = new ImagemDAO();
        $videoDAO = new VideoDAO();
        
        $atracao->listaComentarios = $comentarioDAO->buscarPorIdAtracao($atracao);
		$atracao->listaAvaliacoes = $avaliacaoDAO->buscarPorIdAtracao($atracao);
		$atracao->listaImagens = $imagemDAO->buscarPorIdAtracao($atracao);
		$atracao->listaVideos = $videoDAO->buscarPorIdAtracao($atracao);
        
        return $atracao;
	}

	// Exclui uma atracao por id e todo o seu conteudo
	// Parametros:
	//	id: id da atracao	
	public function excluirPorId($id) {
        $nome_tabela = $this->converterClasseParaTabela();
        
        $avaliacaoDAO = new AvaliacaoDAO();
		$comentarioDAO = new ComentarioDAO();
		$imagemDAO = new ImagemDAO();
		$videoDAO = new VideoDAO();

        switch ($nome_tabela) {
            case "Eventos":
            	$avaliacaoDAO->excluirPorIdEvento($id);
            	$comentarioDAO->excluirPorIdEvento($id);
            	$imagemDAO->excluirPorIdEvento($id);
            	$videoDAO->excluirPorIdEvento($id);
                break;
            case "Estabelecimentos":    
                $avaliacaoDAO->excluirPorIdEstabelecimento($id);
                $comentarioDAO->excluirPorIdEstabelecimento($id);
                $imagemDAO->excluirPorIdEstabelecimento($id);
                $videoDAO->excluirPorIdEstabelecimento($id);
                break;
        }

		parent::excluir($id, 'id', $nome_tabela);
		
	}

	// Exclui todas as atracoes associadas a uma estacao
	// Parametros:
	//	id: id da estacao
	public function excluirPorIdEstacao($id) {
        $atracoes = $this->buscarPorIdEstacao($id);
       
        for ($i=0; $i < sizeof($atracoes); $i++) { 
   			$this->excluirPorId($atracoes[$i]->getId());
   		}
	}

	

	// Exclui todas as atracoes postadas por um usuario
	// Parametros:
	//	id: id do usuario
/*	public function excluirPorIdUsuario($id) {
		parent::excluir($id, 'id_usuario', $this->converterClasseParaTabela());
	}
*/
}
?>
