CREATE DATABASE IF NOT EXISTS daprairdetrem;
USE daprairdetrem;

-- Tabela de usuario
CREATE TABLE Usuarios (
    id_usuario BIGINT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    id_facebook BIGINT UNSIGNED,
    id_google DECIMAL(21, 0),
    nome VARCHAR(255) NOT NULL,
    sobrenome VARCHAR(255) NOT NULL,
    genero BOOL NOT NULL,
    aniversario DATE NOT NULL,
    cidade VARCHAR(255) NOT NULL,
    bairro VARCHAR(255),
    email VARCHAR(255) NOT NULL
);

-- Tabela de permissoes do sistema
CREATE TABLE Permissoes (
    id TINYINT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    vizualizar BOOL NOT NULL,
    adicionar_linha BOOL NOT NULL,
    adicionar_estacao BOOL NOT NULL,
    adicionar_atracao BOOL NOT NULL,
    adicionar_conteudo BOOL NOT NULL,
    adicionar_usuario BOOL NOT NULL,
    alterar_linha BOOL NOT NULL,
    alterar_estacao BOOL NOT NULL,
    alterar_atracao BOOL NOT NULL,
    alterar_conteudo BOOL NOT NULL,
    alterar_usuario BOOL NOT NULL,
    alterar_atracao_propria BOOL NOT NULL,
    alterar_conteudo_proprio BOOL NOT NULL,
    alterar_info_propria BOOL NOT NULL,
    excluir_linha BOOL NOT NULL,
    excluir_estacao BOOL NOT NULL,
    excluir_atracao BOOL NOT NULL,
    excluir_conteudo BOOL NOT NULL,
    excluir_usuario BOOL NOT NULL,
    excluir_atracao_propria BOOL NOT NULL,
    excluir_conteudo_proprio BOOL NOT NULL,
    excluir_info_propria BOOL NOT NULL
);

-- Tabela de papeis
CREATE TABLE Papeis (
    id_usuario BIGINT UNSIGNED NOT NULL REFERENCES Usuarios (id_usuario) ,
    id_permissao TINYINT UNSIGNED REFERENCES Permissoes (id),
    PRIMARY KEY (id_usuario, id_permissao)
);

-- Tabelas de linhas e estacoes da Supervia
CREATE TABLE Linhas (
    id TINYINT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL
);
 
CREATE TABLE Estacoes (
    id SMALLINT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    latitude  FLOAT(10, 6) NOT NULL,
    longitude  FLOAT(10, 6) NOT NULL
);
 
CREATE TABLE LinhasEstacoes (
    id_linha TINYINT UNSIGNED NOT NULL REFERENCES Linhas (id),
    id_estacao SMALLINT UNSIGNED NOT NULL REFERENCES Estacoes (id),
    num_estacao SMALLINT UNSIGNED NOT NULL,
    PRIMARY KEY (id_linha, id_estacao)
);

-- Tabela de estabelecimentos
CREATE TABLE Estabelecimentos (
    id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    tipo TINYINT UNSIGNED NOT NULL,
    data_inclusao DATE NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    latitude FLOAT(10, 6) NOT NULL,
    longitude FLOAT(10, 6) NOT NULL,
    id_usuario BIGINT UNSIGNED NOT NULL REFERENCES Usuarios (id_usuario),
    id_estacao SMALLINT UNSIGNED NOT NULL REFERENCES Estacoes (id)
);

-- Tabela de eventos
CREATE TABLE Eventos (
    id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    info_evento TEXT NOT NULL,
    data_inclusao DATE NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    latitude FLOAT(10, 6) NOT NULL,
    longitude FLOAT(10, 6) NOT NULL,
    id_usuario BIGINT UNSIGNED NOT NULL REFERENCES Usuarios (id_usuario),
    id_estacao SMALLINT UNSIGNED NOT NULL REFERENCES Estacoes (id)
);

-- Tabelas de comentarios, avaliacoes e midias
CREATE TABLE Comentarios (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    texto TEXT NOT NULL,
    categoria TINYINT UNSIGNED NOT NULL,
    data_inclusao DATE NOT NULL,
    id_estabelecimento INT UNSIGNED REFERENCES Estabelecimentos (id),
    id_evento INT UNSIGNED REFERENCES Eventos (id),
    id_usuario BIGINT UNSIGNED NOT NULL REFERENCES Usuarios (id_usuario)
);

CREATE TABLE Imagens (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    link TEXT NOT NULL,
    categoria TINYINT UNSIGNED NOT NULL,
    data_inclusao DATE NOT NULL,
    id_estabelecimento INT UNSIGNED REFERENCES Estabelecimentos (id),
    id_evento INT UNSIGNED REFERENCES Eventos (id),
    id_usuario BIGINT UNSIGNED NOT NULL REFERENCES Usuarios (id_usuario)
);

CREATE TABLE Videos (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    link TEXT NOT NULL,
    categoria TINYINT UNSIGNED NOT NULL,
    data_inclusao DATE NOT NULL,
    id_estabelecimento INT UNSIGNED REFERENCES Estabelecimentos (id),
    id_evento INT UNSIGNED REFERENCES Eventos (id),
    id_usuario BIGINT UNSIGNED NOT NULL REFERENCES Usuarios (id_usuario)
);

CREATE TABLE Avaliacoes (
    id BIGINT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nota TINYINT UNSIGNED NOT NULL,
    categoria TINYINT UNSIGNED NOT NULL,
    data_inclusao DATE NOT NULL,
    id_estabelecimento INT UNSIGNED REFERENCES Estabelecimentos (id),
    id_evento INT UNSIGNED REFERENCES Eventos (id),
    id_usuario BIGINT UNSIGNED NOT NULL REFERENCES Usuarios (id_usuario)
);
