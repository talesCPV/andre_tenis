<?php

//    $conexao = new mysqli("108.167.132.56", "plan3411_developer", "Xspider@", "plan3411_museu");
    $conexao = new mysqli("108.167.132.56", "plan3411_developer", "Xspider@", "plan3411_andretorres");
    if (!$conexao){
        die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());
    }    

?>