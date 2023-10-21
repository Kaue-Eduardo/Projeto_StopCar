/*  
	SUGESTÃO...
    
	Simplifica Cursos On-line®
    Curso: Bônus Linguagem SQL
    Conteúdo: Modelagem de BD, SGBD MySQL e Linguagem SQL DDL, DML e DCL.
    Mini-Mundo/Database: Simplifica
*/

-- 01. Criar banco de dados
CREATE DATABASE SIMPLIFICA;

-- 02. Setar banco de dados para trabalhar
USE SIMPLIFICA;

-- 03. Criar tabela Funcionario
CREATE TABLE FUNCIONARIO
( CHAPA INT AUTO_INCREMENT,
  NOME VARCHAR(50) NOT NULL,
  SEXO ENUM('F','M') NOT NULL,
  SALARIO NUMERIC(15,2) NOT NULL,
  PRIMARY KEY(CHAPA)
);

-- 03.1 Selecionar os regitros da tabela Funcionario
SELECT * FROM FUNCIONARIO;

-- 03.2 Inserir regitros na tabela Funcionario
INSERT INTO FUNCIONARIO (CHAPA,NOME,SEXO,SALARIO)
      VALUES (1,'Gilberto','M','1500.99'),(2,'Cristiano','M','1500.99'),(3,'Jurema','F','1305.88');

-- 03.2.1 Inserir regitros na tabela Funcionario
INSERT INTO FUNCIONARIO (NOME,SEXO,SALARIO)
      VALUES ('Pedro','M','2100'),('Lidiane','F','1581.17');

-- 04. Criar tabela Dependente
CREATE TABLE DEPENDENTE
( CODIGO INT AUTO_INCREMENT,
  NOME VARCHAR(50) NOT NULL,
  SEXO ENUM('F','M') NOT NULL,
  NASCIMENTO DATE NOT NULL,
  PRIMARY KEY(CODIGO)
);

-- 04.1 Criar o relacionamento entre Funcionario & Dependente
ALTER TABLE DEPENDENTE
ADD COLUMN FUNCIONARIO INT; 

-- 04.1.2 Criar o relacionamento entre Funcionario & Dependente
ALTER TABLE DEPENDENTE
ADD FOREIGN KEY (FUNCIONARIO) REFERENCES FUNCIONARIO (CHAPA);

-- 04.2 Selecionar os regitros da tabela Dependente
SELECT * FROM DEPENDENTE;

-- 04.3 Inserir regitros na tabela Dependente
INSERT INTO DEPENDENTE (CODIGO,NOME,SEXO,NASCIMENTO,FUNCIONARIO)
	 VALUES (1,'Camila','F','1999-02-27',1),
			(2,'Matheus','M','2002-12-31',1),
			(3,'Clara','F','1997-05-01',2),
			(4,'Renato','M','2000-04-28',2),
			(5,'André','M','2004-11-15',2);

-- 04.3.1 Inserir regitros na tabela Dependente
INSERT INTO DEPENDENTE (NOME,SEXO,NASCIMENTO,FUNCIONARIO)
      VALUES ('Ana Clara','F','1995-09-17',3),
             ('Juliana','F','2022-01-01',5);
             
-- 05. Selecionar Funcionários & Dependentes
SELECT * 
  FROM FUNCIONARIO, DEPENDENTE
 WHERE FUNCIONARIO.CHAPA = DEPENDENTE.FUNCIONARIO;
 
-- 05.1 Selecionar Funcionários & Dependentes
SELECT * 
  FROM FUNCIONARIO INNER JOIN DEPENDENTE
	               ON FUNCIONARIO.CHAPA = DEPENDENTE.FUNCIONARIO;

-- 06. Criar tabela Funcao
CREATE TABLE FUNCAO
( CODIGO INT AUTO_INCREMENT,
  DESCRICAO VARCHAR(50) NOT NULL,
  SETOR VARCHAR(50) NOT NULL,
  PRIMARY KEY(CODIGO)
);

-- 06.1 Inserir regitros na tabela Função
INSERT INTO FUNCAO (CODIGO,DESCRICAO,SETOR)
	 VALUES (1,'Analista de Sistemas','Núcleo de Informática'),
			(2,'Tesoureiro','Contabilidade'),
            (3,'Auxiliar Administrativo','RH');
            
-- 06.1.2 Inserir regitros na tabela Função            
INSERT INTO FUNCAO (DESCRICAO,SETOR)
	 VALUES ('Representante Comercial','Marketing');
     
-- 06.2 Selecionar os regitros da tabela Função
SELECT * FROM FUNCAO;

-- 06.1 Criar o relacionamento entre Funcionario & Função
ALTER TABLE FUNCIONARIO
ADD COLUMN FUNCAO INT; 

-- 06.1.2 Criar o relacionamento entre Funcionario & Função
ALTER TABLE FUNCIONARIO
ADD FOREIGN KEY (FUNCAO) REFERENCES FUNCAO (CODIGO);

-- 07.1 Atualizar Função
UPDATE FUNCIONARIO
   SET FUNCAO = 1
 WHERE CHAPA IN (1,2); 

-- 07.1.2 Atualizar Função
UPDATE FUNCIONARIO
   SET FUNCAO = 2
 WHERE CHAPA = 4;

-- 07.1.3 Atualizar Função
UPDATE FUNCIONARIO
   SET FUNCAO = 3
 WHERE CHAPA = 3;
 
 -- 07.1.4 Atualizar Função
UPDATE FUNCIONARIO
   SET FUNCAO = 4
 WHERE CHAPA = 5;

-- 07.1 Selecionar Funcionário & Função
SELECT * 
  FROM FUNCIONARIO INNER JOIN FUNCAO 
				   ON FUNCIONARIO.FUNCAO = FUNCAO.CODIGO
ORDER BY FUNCAO.DESCRICAO, FUNCIONARIO.NOME;

-- 07.1 Selecionar Funcionário & Função
SELECT * 
  FROM FUNCIONARIO,FUNCAO 
 WHERE FUNCIONARIO.FUNCAO = FUNCAO.CODIGO
ORDER BY FUNCAO.SETOR, FUNCIONARIO.NOME;                   