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
	SELECT USR.nome AS prof, CLB.nome AS clube, ALN.*
	FROM tb_aluno AS ALN
    INNER JOIN tb_usuario AS USR
    INNER JOIN tb_clube AS CLB
    ON ALN.id_usuario = USR.id
    AND ALN.id_clube = CLB.id
    ORDER BY ALN.nome;
    
SELECT * FROM vw_aluno;

  DROP VIEW IF EXISTS vw_valor;
 CREATE VIEW vw_valor AS
	SELECT USR.nome AS prof, CLB.nome AS clube, VLR.*
	FROM tb_valor AS VLR
    INNER JOIN tb_usuario AS USR
    INNER JOIN tb_clube AS CLB
    ON VLR.id_usuario = USR.id
    AND VLR.id_clube = CLB.id
    ORDER BY VLR.descricao;
    
SELECT * FROM vw_valor;