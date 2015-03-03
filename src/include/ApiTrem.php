<?php

require_once "DAO/UsuarioDAO.php";
require_once "DAO/EstacaoDAO.php";
require_once "DAO/EstabelecimentoDAO.php";
require_once "DAO/EventoDAO.php";
require_once "DAO/AvaliacaoDAO.php";
require_once "DAO/ComentarioDAO.php";
require_once "DAO/ImagemDAO.php";
require_once "DAO/VideoDAO.php";

require_once "VO/Usuario.php";
require_once "VO/Estacao.php";
require_once "VO/Estabelecimento.php";
require_once "VO/Evento.php";
require_once "VO/Avaliacao.php";
require_once "VO/Comentario.php";
require_once "VO/Imagem.php";
require_once "VO/Video.php";

class ApiTrem {
	public function converterJsonParaObjeto($json) {
		$array = json_decode($json, true);
		
	}

	public function converterAtracaoParaJson($atracao) {
		$json = array();
		$json = $this->converterObjetoParaJson($atracao);
		$json['listaComentarios'] = $this->converterArrayParaJson($atracao->listaComentarios);
		$json['listaAvaliacoes'] = $this->converterArrayParaJson($atracao->listaAvaliacoes);
		$json['listaImagens'] = $this->converterArrayParaJson($atracao->listaImagens);
		$json['listaVideos'] = $this->converterArrayParaJson($atracao->listaVideos);
		return $json;
	}

	// Converte a linha do trem para uma array no formato JSON
	// Parametros:
	//	linha: resposta do metodo carregarLinhaTrem()
	// Retorna:
	//	array com a estrutura de $linha no formato JSON
	public function converterLinhaTremParaJson($linha) {
		$json_linha = array();
		$lista_imagens = array();
		$lista_videos = array();
		$midias = array();

		$lista_imagens['atracoes'] = $this->converterArrayParaJson($linha['imagens']['atracoes']);
		$lista_imagens['midias'] = $this->converterArrayParaJson($linha['imagens']['midias']);

		$lista_videos['atracoes'] = $this->converterArrayParaJson($linha['videos']['atracoes']);
		$lista_videos['midias'] = $this->converterArrayParaJson($linha['videos']['midias']);
		
		// $json_linha populada com midias selecionadas
		$json_linha['imagens'] = $lista_imagens;
		$json_linha['videos'] = $lista_videos;

		return $json_linha;
    }

    // Converte um array de objetos para um array no formato JSON
	// Parametros:
	//	array: array de objetos
	// Retorna:
	//	array de objetos no formato JSON
	public function converterArrayParaJson($array) {
		$json_array = array();
		for ($i = 0; $i < count($array); $i++) { 
			array_push($json_array, $this->converterObjetoParaJson($array[$i]));
		}
		return $json_array;
    }

	// Converte um objeto com atributos privados em um array no formato JSON
	// Parametros:
	//	objeto: objeto qualquer com getters
	// Retorna:
	//	array com os atributos do objeto no formato JSON
	public function converterObjetoParaJson($objeto) {
        $metodos = get_class_methods($objeto);
        $num_metodos = count($metodos);
        $json = array();

        for ($i = 0; $i < $num_metodos; $i++) { 	
            if (strpos($metodos[$i], "get") !== false) {
            	$metodo = $metodos[$i];
            	$chave = lcfirst(substr($metodo, 3));

                $json[$chave] = $objeto->$metodo();
            }
        }
        return $json;
    }

	// Armazena um novo objeto
	// Parametros:
	//	objeto: objeto da classe: 
	//				(Estacao | Estabelecimento | Evento |
	//				 Avaliacao | Comentario | Imagem | Video)
	//	usuario: objeto da classe Usuario
	public function gravarConteudo($objeto, $usuario) {
		$classe = get_class($objeto);

		switch ($classe) {
			case 'Estacao':
				$estacaoDAO = new EstacaoDAO;
				return $estacaoDAO->gravar($objeto);
			case 'Estabelecimento':
				$estabelecimentoDAO = new EstabelecimentoDAO;
				return $estabelecimentoDAO->gravar($objeto);
			case 'Evento':
				$eventoDAO = new EventoDAO;
				return $eventoDAO->gravar($objeto);
			case 'Avaliacao':
				$avaliacaoDAO = new AvaliacaoDAO;
				return $avaliacaoDAO->gravar($objeto);
			case 'Comentario':
				$comentarioDAO = new ComentarioDAO;
				return $comentarioDAO->gravar($objeto);
			case 'Imagem':
				$imagemDAO = new ImagemDAO;
				return $imagemDAO->gravar($objeto);
			case 'Video':
				$videoDAO = new VideoDAO;
				return $videoDAO->gravar($objeto);
		}

		return null;
	}

	// Altera os dados de um objeto por seu id
	// Parametros:
	//	objeto: objeto da classe:
	//				(Estacao | Estabelecimento | Evento |
	//				 Avaliacao | Comentario | Imagem | Video)
	//	usuario: objeto da classe Usuario
	public function atualizarConteudo($objeto, $usuario) {
		$classe = get_class($objeto);

		if ($objeto->getId() === null) {
			return false;
		}

		switch ($classe) {
			case 'Estacao':
				$estacaoDAO = new EstacaoDAO;
				$estacaoDAO->atualizar($objeto);
				break;
			case 'Estabelecimento':
				$estabelecimentoDAO = new EstabelecimentoDAO;
				$estabelecimentoDAO->atualizar($objeto);
				break;
			case 'Evento':
				$eventoDAO = new EventoDAO;
				$eventoDAO->atualizar($objeto);
				break;
			case 'Avaliacao':
				$avaliacaoDAO = new AvaliacaoDAO;
				$avaliacaoDAO->atualizar($objeto);
				break;
			case 'Comentario':
				$comentarioDAO = new ComentarioDAO;
				$comentarioDAO->atualizar($objeto);
				break;
			case 'Imagem':
				$imagemDAO = new ImagemDAO;
				$imagemDAO->atualizar($objeto);
				break;
			case 'Video':
				$videoDAO = new VideoDAO;
				$videoDAO->atualizar($objeto);
				break;
		}

		return true;
	}

	// Apaga um dado pelo id de objeto
	// Parametros:
	//	objeto: objeto da classe: 
	//				(Estacao | Estabelecimento | Evento |
	//				 Avaliacao | Comentario | Imagem | Video)
	//	usuario: objeto da classe Usuario
	public function apagarConteudo($objeto, $usuario) {
		$classe = get_class($objeto);

		if ($objeto->getId() === null) {
			return false;
		}

		switch ($classe) {
			case 'Estacao':
				$estacaoDAO = new EstacaoDAO;
				$estacaoDAO->excluirPorId($objeto->getId());
				break;
			case 'Estabelecimento':
				$estabelecimentoDAO = new EstabelecimentoDAO;
				$estabelecimentoDAO->excluirPorId($objeto->getId());
				break;
			case 'Evento':
				$eventoDAO = new EventoDAO;
				$eventoDAO->excluirPorId($objeto->getId());
				break;
			case 'Avaliacao':
				$avaliacaoDAO = new AvaliacaoDAO;
				$avaliacaoDAO->excluirPorId($objeto->getId());
				break;
			case 'Comentario':
				$comentarioDAO = new ComentarioDAO;
				$comentarioDAO->excluirPorId($objeto->getId());
				break;
			case 'Imagem':
				$imagemDAO = new ImagemDAO;
				$imagemDAO->excluirPorId($objeto->getId());
				break;
			case 'Video':
				$videoDAO = new VideoDAO;
				$videoDAO->excluirPorId($objeto->getId());
				break;
		}

		return true;
	}

	// Gera uma lista de imagens aleatorias com tamanho num_imagens
	// Caso o numero de imagens na DB < num_imagens, sera retornada
	// uma lista com todas as imagens
	// Parametros:
	//	num_imagens: numero de imagens na lista
	public function gerarListaImagensAleatorias($num_imagens) {
		$imagemDAO = new ImagemDAO;
		return $imagemDAO->gerarListaImagensAleatorias($num_imagens);
	}

	// Carrega um estabelecimento e todo o seu conteudo
	// Parametros:
	//	id: id do estabelecimento
	public function carregarEstabelecimento($id) {
		$estabelecimentoDAO = new EstabelecimentoDAO;
		$estabelecimento = $estabelecimentoDAO->buscarPorId($id);
		$estabelecimentoDAO->carregarConteudo($estabelecimento);
		return $estabelecimento;
	}

	// Carrega um evento e todo o seu conteudo
	// Parametros:
	//	id: id do evento
	public function carregarEvento($id) {
		$eventoDAO = new EventoDAO;
		$evento = $eventoDAO->buscarPorId($id);
		$eventoDAO->carregarConteudo($evento);
		return $evento;
	}

	// Carrega a linha do trem com conteudos selecionados
	// O numero de estacoes eh determinado por num_estacoes
	// Parametros:
	//	num_estacoes: numero de estacoes/conteudos na linha
	// Retorna:
	//	array ['imagens' | 'videos'] ['midias' | 'atracoes']
	public function carregarLinhaTrem($num_estacoes) {

		$imagemDAO = new ImagemDAO;
		$videoDAO = new VideoDAO;
		$estabelecimentoDAO = new EstabelecimentoDAO;
		$eventoDAO = new EventoDAO;

		$imagens = $imagemDAO->buscarMidiasSelecionadas();
		$videos = $videoDAO->buscarMidiasSelecionadas();

		$num_imagens = count($imagens);
		$num_videos = count($videos);
		$num_midias = $num_imagens + $num_videos;
		$num_imagens = round($num_estacoes / $num_midias * $num_imagens);
		$num_videos = $num_estacoes - $num_imagens;

		$imagens_sel = array();
		$videos_sel = array();
		$atracoes_imagens = array();
		$atracoes_videos = array();

		for ($i=0; $i < $num_imagens; $i++) { 
			$j = mt_rand(0, count($imagens) - 1);
			$imagens_sel[$i] = clone $imagens[$j];
			unset($imagens[$j]);
			$imagens = array_values($imagens);

			if ($imagens_sel[$i]->getIdEstabelecimento()) {
				$atracoes_imagens[$i] = $estabelecimentoDAO->buscarPorId($imagens_sel[$i]->getIdEstabelecimento());
			} 
			else {
				$atracoes_imagens[$i] = $eventoDAO->buscarPorId($imagens_sel[$i]->getIdEvento());
			}
			
		}

		for ($i=0; $i < $num_videos; $i++) { 
			$j = mt_rand(0, count($videos) - 1);
			$videos_sel[$i] = clone $videos[$j];
			unset($videos[$j]);
			$videos = array_values($videos);

			if ($videos_sel[$i]->getIdEstabelecimento()) {
				$atracoes_videos[$i] = $estabelecimentoDAO->buscarPorId($videos_sel[$i]->getIdEstabelecimento());
			} 
			else {
				$atracoes_videos[$i] = $eventoDAO->buscarPorId($videos_sel[$i]->getIdEvento());
			}
		}

		$lista_imagens = array();
		$lista_videos = array();
		$midias = array();

		$lista_imagens['midias'] = $imagens_sel;
		$lista_imagens['atracoes'] = $atracoes_imagens;

		$lista_videos['midias'] = $videos_sel;
		$lista_videos['atracoes'] = $atracoes_videos;

		// $midias populada com midias selecionadas
		$midias['imagens'] = $lista_imagens;
		$midias['videos'] = $lista_videos;

		return $midias;
	}

	// Realiza o login a partir do id_google ou id_facebook e retorna 
    // um objeto da classe Usuario. Caso o usuario nao exista, cria
    // uma nova entrada
    // Parametros:
    //  usuario: objeto da classe Usuario 
	public function login($usuario) {
		$usuarioDAO = new UsuarioDAO;
		$usuarioDAO->login($usuario);
	}
/*
	public function sequenciarIds($id) {
		$imagemDAO = new ImagemDAO;
		$imagemDAO->sequenciarIds();
	}
	*/
}

?>