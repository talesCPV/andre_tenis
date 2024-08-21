  DROP VIEW IF EXISTS vw_clube;
 CREATE VIEW vw_clube AS
	SELECT USR.nome AS prof, CLB.*
	FROM tb_clube AS CLB
    INNER JOIN tb_usuario AS USR
    ON CLB.id_usuario = USR.id
    ORDER BY CLB.nome;
    
SELECT * FROM vw_clube;

  DROP VIEW IF EXISTS vw_aluno;
 CREATE VIEW vw_aluno AS
	SELECT USR.nome AS prof, ALN.*
	FROM tb_aluno AS ALN
    INNER JOIN tb_usuario AS USR
    ON ALN.id_usuario = USR.id
    ORDER BY ALN.nome;
    
SELECT * FROM vw_aluno;    