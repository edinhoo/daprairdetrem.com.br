CREATE DATABASE IF NOT EXISTS daprairdetrem;
USE daprairdetrem;

-- Tabela de usuario
CREATE TABLE Usuarios (
    id_usuario INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
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
    id TINYINT UNSIGNED PRIMARY KEY NOT NULL,
    adicionar_estacao BOOL NOT NULL,
    adicionar_atracao BOOL NOT NULL,
    adicionar_conteudo BOOL NOT NULL,
    adicionar_usuario BOOL NOT NULL,
    alterar_estacao BOOL NOT NULL,
    alterar_atracao BOOL NOT NULL,
    alterar_conteudo BOOL NOT NULL,
    alterar_usuario BOOL NOT NULL,
    alterar_atracao_propria BOOL NOT NULL,
    alterar_conteudo_proprio BOOL NOT NULL,
    alterar_usuario_proprio BOOL NOT NULL,
    excluir_estacao BOOL NOT NULL,
    excluir_atracao BOOL NOT NULL,
    excluir_conteudo BOOL NOT NULL,
    excluir_atracao_propria BOOL NOT NULL,
    excluir_conteudo_proprio BOOL NOT NULL
--  visualizar BOOL NOT NULL,
--  excluir_info_propria BOOL NOT NULL
--  adicionar_linha BOOL NOT NULL,
--  alterar_linha BOOL NOT NULL,
--  excluir_linha BOOL NOT NULL,
--  excluir_usuario BOOL NOT NULL,
);


-- Cria os tipos de usuarios
/*
 id, 
 adicionar_estacao, adicionar_atracao, adicionar_conteudo, adicionar_usuario
 alterar_estacao, alterar_atracao, alterar_conteudo, alterar_usuario
 alterar_atracao_propria, alterar_conteudo_proprio, alterar_usuario_proprio
 excluir_estacao, excluir_atracao, excluir_conteudo,
 excluir_atracao_propria, excluir_conteudo_proprio
*/
-- Permissoes de usuario banido
INSERT INTO Permissoes
VALUES (
    0,
    FALSE, FALSE, FALSE, FALSE,
    FALSE, FALSE, FALSE, FALSE,
    FALSE, FALSE, FALSE,
    FALSE, FALSE, FALSE,
    FALSE, FALSE
);

-- Permissoes de visitante
INSERT INTO Permissoes
VALUES (
    1,
    FALSE, FALSE, FALSE, TRUE,
    FALSE, FALSE, FALSE, FALSE,
    FALSE, FALSE, FALSE,
    FALSE, FALSE, FALSE,
    FALSE, FALSE
);

-- Permissoes de usuario cadastrado
INSERT INTO Permissoes
VALUES (
    2,
    FALSE, TRUE, TRUE, FALSE,
    FALSE, FALSE, FALSE, FALSE,
    TRUE, TRUE, TRUE,
    FALSE, FALSE, FALSE,
    TRUE, TRUE
);


-- Permissoes de moderador
INSERT INTO Permissoes
VALUES (
    10,
    FALSE, TRUE, TRUE, FALSE,
    TRUE, TRUE, TRUE, TRUE,
    TRUE, TRUE, TRUE,
    FALSE, TRUE, TRUE,
    TRUE, TRUE
);

-- Permissoes de admin
INSERT INTO Permissoes
VALUES (
    255,
    TRUE, TRUE, TRUE, TRUE,
    TRUE, TRUE, TRUE, TRUE,
    TRUE, TRUE, TRUE,
    TRUE, TRUE, TRUE,
    TRUE, TRUE
);


-- Tabela de papeis
CREATE TABLE Papeis (
    id_usuario INT UNSIGNED NOT NULL REFERENCES Usuarios (id_usuario) ,
    id_permissao TINYINT UNSIGNED REFERENCES Permissoes (id),
    PRIMARY KEY (id_usuario)
);

-- Removido
-- Tabelas de linhas e estacoes da Supervia
/*
 CREATE TABLE Linhas (
   id TINYINT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL
 );
 */
 
CREATE TABLE Estacoes (
    id SMALLINT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    latitude  FLOAT(10, 6) NOT NULL,
    longitude  FLOAT(10, 6) NOT NULL,
    link_mapa TEXT NOT NULL
);

-- Removido 
/*
 CREATE TABLE LinhasEstacoes (
    id_linha TINYINT UNSIGNED NOT NULL REFERENCES Linhas (id),
    id_estacao SMALLINT UNSIGNED NOT NULL REFERENCES Estacoes (id),
    num_estacao SMALLINT UNSIGNED NOT NULL,
    PRIMARY KEY (id_linha, id_estacao)
 );
 */

-- Tabela de estabelecimentos
CREATE TABLE Estabelecimentos (
    id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    data_inclusao DATE NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    latitude FLOAT(10, 6) NOT NULL,
    longitude FLOAT(10, 6) NOT NULL,
    link_mapa TEXT NOT NULL,
    website VARCHAR(255),
    visualizacoes INT NOT NULL,
    id_usuario INT UNSIGNED NOT NULL REFERENCES Usuarios (id_usuario),
    id_estacao SMALLINT UNSIGNED NOT NULL REFERENCES Estacoes (id),
    eh_bar BOOL NOT NULL,
    eh_restaurante BOOL NOT NULL,
    eh_centro_cultural BOOL NOT NULL
);

-- Tabela de eventos
CREATE TABLE Eventos (
    id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    data_inclusao DATE NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    latitude FLOAT(10, 6) NOT NULL,
    longitude FLOAT(10, 6) NOT NULL,
    link_mapa TEXT NOT NULL,
    website VARCHAR(255),
    visualizacoes INT NOT NULL,
    id_usuario INT UNSIGNED NOT NULL REFERENCES Usuarios (id_usuario),
    id_estacao SMALLINT UNSIGNED NOT NULL REFERENCES Estacoes (id),
    info_evento TEXT NOT NULL
);

-- Tabelas de conteudo (avaliacoes, comentarios)
CREATE TABLE Avaliacoes (
    id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    categoria TINYINT UNSIGNED NOT NULL,
    data_inclusao DATE NOT NULL,
    id_estabelecimento INT UNSIGNED REFERENCES Estabelecimentos (id),
    id_evento INT UNSIGNED REFERENCES Eventos (id),
    id_usuario INT UNSIGNED NOT NULL REFERENCES Usuarios (id_usuario),
    nota TINYINT UNSIGNED NOT NULL
);

CREATE TABLE Comentarios (
    id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    categoria TINYINT UNSIGNED NOT NULL,
    data_inclusao DATE NOT NULL,
    id_estabelecimento INT UNSIGNED REFERENCES Estabelecimentos (id),
    id_evento INT UNSIGNED REFERENCES Eventos (id),
    id_usuario INT UNSIGNED NOT NULL REFERENCES Usuarios (id_usuario),
    texto TEXT NOT NULL
);

-- Tabelas de midias
CREATE TABLE Imagens (
    id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    categoria TINYINT UNSIGNED NOT NULL,
    data_inclusao DATE NOT NULL,
    id_estabelecimento INT UNSIGNED REFERENCES Estabelecimentos (id),
    id_evento INT UNSIGNED REFERENCES Eventos (id),
    id_usuario INT UNSIGNED NOT NULL REFERENCES Usuarios (id_usuario),
    link TEXT NOT NULL,
    selecao_trem BOOL NOT NULL
);

CREATE TABLE Videos (
    id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    categoria TINYINT UNSIGNED NOT NULL,
    data_inclusao DATE NOT NULL,
    id_estabelecimento INT UNSIGNED REFERENCES Estabelecimentos (id),
    id_evento INT UNSIGNED REFERENCES Eventos (id),
    id_usuario INT UNSIGNED NOT NULL REFERENCES Usuarios (id_usuario),
    link TEXT NOT NULL,
    selecao_trem BOOL NOT NULL
);


/*INSERT INTO Usuarios (id_facebook, id_google, nome, sobrenome, genero, aniversario, cidade, bairro, email)
VALUES  (1, 1, "Caio", "Taniguchi", TRUE, '1990-10-12', "Rio de Janeiro", "Lagoa", "caiotaniguchi@gmail.com"),
        (2, 2, "Harrison", "Mendonca", TRUE, '1987-07-15', "Rio de Janeiro", "Algum lugar", "h@harrison.com.br");

INSERT INTO Estacoes (nome, endereco, latitude, longitude, link_mapa)
VALUES  ("Estacao 1", "Alguma Rua 1", 141.140338, 141.140338, "link_maps"), 
        ("Estacao 2", "Alguma Rua 2", 141.140338, 141.140338, "link_maps"),
        ("Estacao 3", "Alguma Rua 3", 141.140338, 141.140338, "link_maps");


INSERT INTO Estabelecimentos (`nome`, `data_inclusao`, `endereco`, `latitude`, `longitude`, `link_mapa`, `website`, `visualizacoes`, `id_usuario`, `id_estacao`, `eh_bar`, `eh_restaurante`, `eh_centro_cultural`)
VALUES  ("Bar do Fulano", '1997-11-11', "Alguma Rua 1", 141.140338, 141.140338, "link_maps", "algum_site", 0, 1, 1, TRUE, TRUE, TRUE),
        ("Bar do Ciclano", '1999-01-22', "Alguma Rua 2", 141.140338, 141.140338, "link_maps", "algum_site", 0, 1, 1, FALSE, FALSE, FALSE);

INSERT INTO Eventos (`nome`, `data_inclusao`, `endereco`, `latitude`, `longitude`, `link_mapa`, `website`, `visualizacoes`, `id_usuario`, `id_estacao`, `info_evento`)
VALUES  ("Evento A", '1999-01-22', "Alguma Rua 2", 141.140338, 141.140338, "link_maps", "algum_site", 0, 1, 1, "descricao_evento"),
        ("Evento B", '1999-01-22', "Alguma Rua 2", 141.140338, 141.140338, "link_maps", "algum_site", 0, 1, 1, "descricao_evento");

INSERT INTO Imagens (`categoria`, `data_inclusao`, `id_estabelecimento`, `id_usuario`, `link`, `selecao_trem`)
VALUES  (0, '2014-12-25', 1, 1, 'um_link_ae', FALSE),
        (0, '2014-12-26', 1, 1, 'um_link_aew', TRUE),
        (0, '2014-12-25', 1, 1, 'um_link_ae', FALSE),
        (0, '2014-12-26', 1, 1, 'um_link_aew', TRUE);

INSERT INTO Videos (`categoria`, `data_inclusao`, `id_estabelecimento`, `id_usuario`, `link`, `selecao_trem`)
VALUES  (0, '2014-09-11', 1, 1, 'um_link_ae', FALSE),
        (0, '2014-08-22', 1, 1, 'um_link_aew', TRUE),
        (0, '2014-07-14', 1, 1, 'um_link_ae', FALSE),
        (0, '2014-06-18', 1, 1, 'um_link_aew', TRUE);

*/
