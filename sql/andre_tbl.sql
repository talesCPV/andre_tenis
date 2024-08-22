 DROP TABLE IF EXISTS tb_usuario;
CREATE TABLE tb_usuario (
    id int(11) NOT NULL AUTO_INCREMENT,
    email varchar(70) NOT NULL,
    hash varchar(64) NOT NULL,
    nome varchar(30) NOT NULL DEFAULT "",
    token varchar(64) DEFAULT NULL,
    access int(11) DEFAULT -1,
	UNIQUE KEY (hash),
	UNIQUE KEY (email),
    PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

-- ALTER TABLE tb_usuario ADD nome varchar(30) NOT NULL DEFAULT ""; 
	INSERT INTO tb_usuario (email,hash,access)VALUES("admin@backhand.com.br","68c06055a0ec4b330ebd4a235603d67094d1b88b6bca5558309b436fdb595bb4",0);
-- UPDATE tb_usuario SET nome="Tales C. Dantas" WHERE id=1;

 DROP TABLE IF EXISTS tb_usr_perm_perfil;
CREATE TABLE tb_usr_perm_perfil (
    id int(11) NOT NULL AUTO_INCREMENT,
    nome varchar(30) NOT NULL,
    perm varchar(50) NOT NULL DEFAULT "0",
    PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

 DROP TABLE IF EXISTS tb_mail;
CREATE TABLE tb_mail (
	data TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, 
    id_from int(11) NOT NULL,
    id_to int(11) NOT NULL,
    message varchar(1000),
    looked boolean DEFAULT 0,
    FOREIGN KEY (id_from) REFERENCES tb_usuario(id),
    FOREIGN KEY (id_to) REFERENCES tb_usuario(id),
    PRIMARY KEY (data,id_from)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

 DROP TABLE IF EXISTS tb_calendario;
CREATE TABLE tb_calendario (
    id_user int(11) NOT NULL,
    data_agd date NOT NULL,
    obs varchar(255),
    PRIMARY KEY (id_user,data_agd)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

/* FIM PADRÂO */

 DROP TABLE IF EXISTS tb_clube;
CREATE TABLE tb_clube (
    id int(11) NOT NULL AUTO_INCREMENT,
    id_usuario int(11),
    nome varchar(70),
	rua varchar(60) DEFAULT NULL,
    num varchar(6) DEFAULT NULL,
    cidade varchar(50) DEFAULT NULL,
    bairro varchar(50) DEFAULT NULL,
    uf varchar(2) DEFAULT NULL,
    cep varchar(10) DEFAULT NULL,
    FOREIGN KEY (id_usuario) REFERENCES tb_usuario(id),
    PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

 DROP TABLE IF EXISTS tb_aluno;
CREATE TABLE tb_aluno (
    id int(11) NOT NULL AUTO_INCREMENT,
    id_usuario int(11) NOT NULL,
    id_clube int(11) NOT NULL,
    nome varchar(70) NOT NULL,
    rua varchar(60) DEFAULT NULL,
    num varchar(6) DEFAULT NULL,
    cidade varchar(50) DEFAULT NULL,
    bairro varchar(50) DEFAULT NULL,
    uf varchar(2) DEFAULT NULL,
    cep varchar(10) DEFAULT NULL,    
    data_adm datetime DEFAULT CURRENT_TIMESTAMP,
    cel varchar(15) DEFAULT NULL,
	email varchar(90) DEFAULT NULL,
    ativo boolean DEFAULT 1,
	obs varchar(255) DEFAULT NULL,
    FOREIGN KEY (id_usuario) REFERENCES tb_usuario(id),
    FOREIGN KEY (id_clube) REFERENCES tb_clube(id),
    PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

 DROP TABLE IF EXISTS tb_valor;
CREATE TABLE tb_valor (
    id int(11) NOT NULL AUTO_INCREMENT,
    id_usuario int(11) NOT NULL,
    id_clube int(11) NOT NULL,
    descricao varchar(70) NOT NULL,
    valor double NOT NULL DEFAULT 0,
    obs varchar(255) DEFAULT NULL,
    FOREIGN KEY (id_usuario) REFERENCES tb_usuario(id),
    FOREIGN KEY (id_clube) REFERENCES tb_clube(id),
    PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

 DROP TABLE IF EXISTS tb_agenda;
CREATE TABLE tb_agenda (
    id_usuario int(11) NOT NULL,
    id_aluno int(11) NOT NULL,
    id_valor int(11),
    dia int NOT NULL,
    hora int NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES tb_usuario(id),
    FOREIGN KEY (id_aluno) REFERENCES tb_aluno(id),
    FOREIGN KEY (id_valor) REFERENCES tb_valor(id),
    PRIMARY KEY (id_usuario,id_aluno,dia,hora)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;