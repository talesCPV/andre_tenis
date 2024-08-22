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

  DROP VIEW IF EXISTS vw_aula;
 CREATE VIEW vw_aula AS
	SELECT USR.nome AS prof, CLB.nome AS clube, AUL.*
	FROM tb_aula AS AUL
    INNER JOIN tb_usuario AS USR
    INNER JOIN tb_clube AS CLB
    ON AUL.id_usuario = USR.id
    AND AUL.id_clube = CLB.id
    ORDER BY AUL.descricao;
    
SELECT * FROM vw_aula;

	DROP VIEW IF EXISTS vw_agenda;
 	CREATE VIEW vw_agenda AS
		SELECT AGD.*, ALN.nome, AUL.descricao, CLB.nome AS clube,
        CLB.id AS id_clube, CONCAT("w-",AGD.dia,"-",AGD.hora) AS id_call
		FROM tb_agenda AS AGD
		INNER JOIN tb_aluno AS ALN
		INNER JOIN tb_aula AS AUL
		INNER JOIN tb_clube AS CLB
		ON AGD.id_aluno = ALN.id
		AND AGD.id_aula = AUL.id
		AND AUL.id_clube = CLB.id
		ORDER BY AGD.hora,AGD.dia;
        
SELECT * FROM vw_agenda;        