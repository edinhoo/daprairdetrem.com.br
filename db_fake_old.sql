INSERT INTO Usuarios
VALUES (1, 1, "Caio", "Taniguchi", TRUE, '1990-10-12', "Rio de Janeiro", "Lagoa", "caiotaniguchi@gmail.com");

INSERT INTO Usuarios
VALUES (2, 2, "Harrison", "Mendonca", TRUE, '1987-07-15', "Rio de Janeiro", "Algum lugar", "h@harrison.com.br");

INSERT INTO Linhas
VALUES ("Linha 1");

INSERT INTO Linhas
VALUES ("Linha 2");

INSERT INTO Estacoes
VALUES ("Estacao 1", "Alguma Rua 1", 141.140338, 141.140338);

INSERT INTO Estacoes
VALUES ("Estacao 2", "Alguma Rua 2", 141.140338, 141.140338);

INSERT INTO Estacoes
VALUES ("Estacao 3", "Alguma Rua 3", 141.140338, 141.140338);

INSERT INTO LinhasEstacoes
VALUES (1, 1, 1);

INSERT INTO LinhasEstacoes
VALUES (1, 2, 2);

INSERT INTO LinhasEstacoes
VALUES (2, 1, 1);

INSERT INTO LinhasEstacoes
VALUES (2, 3, 2);

INSERT INTO Estabelecimentos
VALUES ("Bar do Fulano", '1990-10-12', "Alguma Rua 1", "Mendonca", TRUE, '1987-07-15', "Rio de Janeiro", "Algum lugar", "h@harrison.com.br");