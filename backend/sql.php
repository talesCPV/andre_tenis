<?php

    $query_db = array(
        /* LOGIN */
        "LOG-0"  => 'CALL sp_login("x00", "x01");', // USER, PASS

        /* USERS */
        "USR-0"  => 'CALL sp_viewUser(@access,@hash,"x00","x01","x02");', // FIELD,SIGNAL, VALUE
        "USR-1"  => 'CALL sp_setUser(@access,@hash,x00,"x01","x02","x03");', // ID, EMAIL, PASS, ACCESS
        "USR-2"  => 'CALL sp_updatePass(@hash,"x00");', // PASS
        "USR-3"  => 'CALL sp_check_usr_mail(@hash);', //

        /* CALENDAR */
        "CAL-0"  => 'CALL sp_view_calendar(@hash,"x00","x01");', // DT_INI, DT_FIN
        "CAL-1"  => 'CALL sp_set_calendar(@hash,"x00","x01");', // DT_AGD, OBS

        /* MAIL */
        "MAIL-0"  => 'CALL sp_set_mail(@hash,"x00","x01");', // ID_TO, MESSAGE
        "MAIL-1"  => 'CALL sp_view_mail(@hash,x00);', // I_SEND
        "MAIL-2"  => 'CALL sp_all_mail_adress(@hash);', //      
        "MAIL-3"  => 'CALL sp_del_mail(@hash,"x00",x01,x02);', // DATA, ID_FROM, ID_TO
        "MAIL-4"  => 'CALL sp_mark_mail(@hash,"x00",x01,x02);', // DATA, ID_FROM, ID_TO

        /* SYSTEMA */
        "SYS-0"  => 'CALL sp_set_usr_perm_perf(@access,@hash,x00,"x01");', // ID, NOME
        "SYS-1"  => 'CALL sp_view_usr_perm_perf(@access,@hash,"x00","x01","x02");', // FIELD,SIGNAL, VALUE

        /* ADMIN */
        "ADM-0"  => 'CALL sp_view_clube(@access,@hash,"x00","x01","x02");', // FIELD, SIGNAL, VALUE
        "ADM-1"  => 'CALL sp_set_clube(@access,@hash,x00,"x01","x02","x03","x04","x05","x06","x07");', // id,nome,rua,num,cidade,bairro,uf,cep
        "ADM-2"  => 'CALL sp_view_aluno(@access,@hash,"x00","x01","x02");', // FIELD, SIGNAL, VALUE
        "ADM-3"  => 'CALL sp_set_aluno(@access,@hash,x00,x01,"x02","x03","x04","x05","x06","x07","x08","x09","x10","x11","x12","x13");', // id,id_clube,nome,nasc,rua,num,cidade,bairro,uf,cep,data_adm,cel,ativo,obs
        "ADM-4"  => 'CALL sp_view_valor(@hash);',
        "ADM-5"  => 'CALL sp_set_valor(@access,@hash,x00,x01,"x02","x03","x04");', // id,id_clube,descricao,valor,obs

        /*AGENDA*/
        "AGD-0" => '',
        "AGD-1" => 'CALL sp_set_agenda(@access,@hash,x00,x01,x02,x03,x04);',
    );

?>