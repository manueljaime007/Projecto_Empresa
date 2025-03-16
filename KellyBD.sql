-- LOJABD DA VILMA

# 1. Criar usar a BD
CREATE DATABASE lojabd_manuel;
USE lojabd_manuel;


# 2. Criar as tabelas
CREATE TABLE Clientes(
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    morada VARCHAR(100) NOT NULL,
    idade INT NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    genero ENUM('F', 'M') NOT NULL
);
CREATE TABLE Produtos(
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome_produto VARCHAR(100) NOT NULL,
    descricao TEXT NOT NULL,
    preco DECIMAL(10, 2) NOT NULL,
    qtd_estoque INT NOT NULL
);
CREATE TABLE Encomendas(
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_cliente INT,
    estado VARCHAR(100) NOT NULL,
    valor DECIMAL(10, 2) NOT NULL,
    Foreign Key (id_cliente) REFERENCES Clientes(id) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE Itens_Encomendas(
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_encomenda INT,
    id_produto INT,
    qtd_encomenda INT NOT NULL,
    valor DECIMAL(10, 2) NOT NULL,
    Foreign Key (id_encomenda) REFERENCES Encomendas(id) ON DELETE CASCADE ON UPDATE CASCADE,
    Foreign Key (id_produto) REFERENCES Produtos(id) ON DELETE CASCADE ON UPDATE CASCADE
);


# 3.  Inserir dados nas tabelas
INSERT INTO Clientes (nome, morada, idade, genero, email) values
    ("António", "Viana", 19 , 'M', "antonio@gmail.com"),
    ("João", "Viana", 18 , 'M', "joao@gmail.com "),
    ("Ana", "Viana", 22 , 'F', "ana@gmail.com"),
    ("Manuel", "Cazenga", 23 , 'M', "manuel@gmail.com"),
	("David", "Viana", 35 , 'M', "david@gmail.com"),
	("Arlindo", "Viana", 18 , 'F', "arlindo@gmail.com"),
	("Bernice", "Viana", 22 , 'M', "bernice@gmail.com");

INSERT INTO Produtos(nome_produto, descricao, preco, qtd_estoque) values
    ('Coca Cola', 'Refri', 500, 2000),
    ('Agua', 'Agua', 1000, 4000),
    ('Vinho', 'Alc', 100, 400),
    ('Camiseta Básica', 'camiseta de algodão básica para uso diário', 49.99, 800),
    ('Calça Jeans', 'Calça jeans de corte recto e lavagem clara', 500, 2000),
    ('Tenis desportivo', 'Tenis desportivo leve e confortável para corrida', 79.99, 10),
    ('Relogio de pulso', 'Relogio analogico de pulso com pulseira de couro', 99.99, 14),
    ('Mochila escolar', 'Mochila resistente com multiplos compartimentos', 39.99, 33),
    ('oculos de sol', 'oculos de sol com proteçao UV e armação de acetato', 59.99, 23);

INSERT INTO Encomendas(id, id_cliente, estado, valor) values
	(100, 1, "Presente", 15000),
    (101, 2, "Em processamento", 30000),
    (102, 3, "Cancelada", 13500),
    (103, 4, "Processada", 5000),
    (104, 5, "Processada", 18500),
    (105, 6, "Processada", 20000),
    (106, 7, "Em processamento", 55000);


INSERT INTO Itens_Encomendas(id_produto,id_encomenda, qtd_encomenda, valor) values
	(1, 100, 10, qtd_encomenda * 500),
    (2, 100, 10, qtd_encomenda * 1000),
    (3, 101, 200, qtd_encomenda * 100),
    (2, 101, 10, qtd_encomenda * 1000),
    (6, 102, 70, qtd_encomenda * 79.99),
    (7, 102, 69, qtd_encomenda * 99.99),
    (3, 103, 50, qtd_encomenda * 100),
    (2, 104, 18, qtd_encomenda * 1000),
    (7, 104, 5, qtd_encomenda * 99.99),
    (3, 105, 100, qtd_encomenda * 100),
    (1, 105, 20, qtd_encomenda * 500),
    (9, 106, 200, qtd_encomenda * 59.99),
    (7, 106, 500 , qtd_encomenda * 99.99),
    (8, 106, 76, qtd_encomenda * 39.99);


# 4. Selects nas Tabelas

select * from clientes where email is null;
select * from clientes where email is not null;
select * from clientes where nome like "antonio";
select * from clientes where nome like "%a";
select * from clientes where nome like "a%";
select * from clientes where nome like "a%a";
select * from clientes;
select * from clientes where nome like "___u%";
select * from clientes order by idade asc;
select * from clientes order by idade desc;
select * from clientes order by idade desc limit 2;
select count(idade) from clientes;





-- TAREFA DE TLP (RESOLUÇÃO)

# 1. Quantos produtos estão na tabela encomendas onde estado é = "em processamento" ?
SELECT SUM(Itens_Encomendas.qtd_encomenda) AS total_produtos
FROM Encomendas
JOIN Itens_Encomendas ON Encomendas.id = Itens_Encomendas.id_encomenda
WHERE Encomendas.estado = 'em processamento';

# 2. Listar nomes dos produtos da encomenda que totalizou 55.000
SELECT Produtos.nome_produto as Nome_dos_produtos_da_encomenda_de_55000
FROM encomendas
JOIN Itens_Encomendas ON Encomendas.id = Itens_Encomendas.id_encomenda
JOIN Produtos ON Itens_Encomendas.id_produto = Produtos.id
WHERE Encomendas.valor = 55000;

SELECT Produtos.nome_produto as Nome_dos_produtos_da_encomenda_de_55000
FROM encomendas
LEFT JOIN Itens_Encomendas ON Encomendas.id = Itens_Encomendas.id_encomenda
RIGHT JOIN Produtos ON Itens_Encomendas.id_produto = Produtos.id
WHERE Encomendas.valor = 55000;

# 3. Quais são os produtos que o cliente "antónio" encomendou ?
SELECT DISTINCT Produtos.nome_produto
FROM Clientes
JOIN Encomendas ON Clientes.id = Encomendas.id_cliente
JOIN Itens_Encomendas ON Encomendas.id = itens_encomendas.id_encomenda
JOIN Produtos ON Itens_Encomendas.id_produto = Produtos.id
WHERE Clientes.nome = 'António';


-- Exercío adicionado
# 4. Listar nomes dos produtos e a quantidade de cada, da tabela encomendas, que totalizou 55.000
SELECT Produtos.nome_produto, Itens_Encomendas.qtd_encomenda as QUANTIDADE_EM_ENCOMENDA, Produtos.preco
FROM Encomendas
JOIN Itens_Encomendas ON Encomendas.id = Itens_Encomendas.id_encomenda
JOIN Produtos ON Itens_Encomendas.id_produto = Produtos.id
WHERE Encomendas.valor = 55000;


-- HOJE (11 / 03 / 2025)

create view Dados_Views AS
Select * from Clientes;
select * from Dados_Views;


DELIMITER //
CREATE PROCEDURE PA_Enc_Cancel()
BEGIN
SELECT * FROM Encomendas WHERE estado LIKE 'Cancelada';
END //
DELIMITER //;
CALL PA_Enc_Cancel();

DELIMITER //
CREATE PROCEDURE Atualiza_Preco()
BEGIN
UPDATE Produtos SET preco = preco + (preco * 0.2);
END //
DELIMITER //;
CALL Atualiza_Preco();

DELIMITER //
CREATE PROCEDURE Atualiza_PrecoVl(valor float(10, 2))
BEGIN
UPDATE Produtos SET preco = preco + (preco * 0.2);
END //
DELIMITER //;
CALL Atualiza_PrecoVl(10.2);


delimiter //
create procedure Atualiza_PrecoV2(ID int, valor float(10, 2), OUT p float(10, 2))
begin
update Produtos set preco = preco + (preco *10) where id = ID;
set p = (select preco from Produtos WHERE id = ID);
end //
delimiter //;

call Atualiza_Preco()



/*TAREFAS

	PARA SEGUNDA FEIRA (17/03)
		1. Use a BD lojaBD
        2. Criar uma view de produtos e suas respectivas categorias. Na view deve constar o ID, nome do produto, nome da categorias e preco
		3. Criar uma view de nome "EncomendasCarlos" que mostre todas as encomendas (e seus respectivos detalhes) processadas pelo funcionario Carlos
		4. Criar uma view de nome "Diário_de_Caixa" que mostre o total de facturamento por dia

    PARA TERÇA FEIRA (18/03)
		1. Criar BD login
        2. Criar table user(nome , user, senha)
        3. Escrever uma PA que verifique se os dados inseridos para o login correspondente com os dados armazenados.







 */
