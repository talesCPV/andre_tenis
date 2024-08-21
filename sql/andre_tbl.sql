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

