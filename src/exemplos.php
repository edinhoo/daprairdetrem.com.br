<?php
// Dependencias
require_once 'DAO/LinhaDAO.php';
require_once 'VO/Linha.php';

	$linhaDAO = new LinhaDAO();
	$linhas = null;
	
	// Carrega uma lista de todas as linhas do BD
	$linhas = $linhaDAO->gerarListaLinhas();
	
	// Carrega todas as estacoes da linha i	
	$linhas[$i]->loadListaEstacoes();
	
	// Carrega todas as atracoes (estabelecimentos e eventos) da estacao j na linha i
	// Todo o conteudo da atracao (imagens, videos, comentarios e avaliacoes) tambem eh carregado
	$linhas[$i]->listaEstacoes[$j]->loadListasAtracoes();
	
	// Retorna o link da imagem l, do estabelecimento k, da estacao j, da linha i (ufa!)
	$linhas[$i]->listaEstacoes[$j]->listaEstabelecimentos[$k]->listaImagens[$l]->getLink();
		
?>
