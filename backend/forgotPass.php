<?php
/*
    $post = file_get_contents('php://input');
    echo $post;
*/
    if(isset($_POST['asaas_id']) && isset($_POST['pass']) && isset($_POST['email'])){
        

        echo $_POST['asaas_id']." ".$_POST['email']." ". $_POST['pass'];

/*        
        include_once "connect.php";

        $query = 'SELECT asaas_id FROM tb_usuario WHERE email = "'.$_GET['email'].'";';

        $result = mysqli_query($conexao, $query);

        $conexao->close();

//        header("Location: https://planet3.com.br//backhand/");
*/


    }else if(isset($_GET['email'])){

        include_once "connect.php";
        include_once "mail_pnt3.php";

        $rows = array();
        $query = 'SELECT asaas_id FROM tb_usuario WHERE email = "'.$_GET['email'].'";';

        $result = mysqli_query($conexao, $query);
        if(is_object($result)){
            if($result->num_rows > 0){			
                while($r = mysqli_fetch_assoc($result)) {
                    $rows[] = $r;
                }
            }        
        }
        $conexao->close();

        $asaas_id = $rows[0]['asaas_id'];
        $path = 'localhost';//getcwd();
        $texto = '
             <style>
                body{
                    display: flex;
                    flex-direction: column;
                }

                fieldset{
                    display: flex;
                    flex-direction: column;
                    gap: 10px;
                    border-radius: 5px;
                }

                input{
                    padding: 5px;
                }

                button{
                    padding: 5px;
                    background-color: #84ecb2;
                    border: solid 1px;
                    border-radius: 3px;
                    text-decoration: none;
                    cursor: pointer;
                }

                button:hover{
                    background-color: #519972;
                    color: aliceblue;
                }

                .head, .middle{
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                }



            </style>


            <div class="head">
                <h2>BACKHAND</h2>
                <h4>o maior portal gerenciador de aulas de tênis do Brasil</h4>    
            </div>



            <form class="middle"  action="#" method="POST">
                <p>Você acionou o sistema de recuperação de senha pelo nosso portal, clique no botão abaixo para escolher uma nova senha</p>

                <fieldset>
                    <legend id="lgd">Resetar a Senha de Acesso</legend>
                    <input type="text" value="'.$_GET['email'].'" disabled>
                    <input type="password" name="pass" id="edtPass" placeholder="Digite a nova senha">
                    <input type="password" name="repass" id="edtRePass" placeholder="Repita a senha">
                    <input type="hidden" name="asaas_id" id="asaas_id" value="'.$asaas_id.'">
                    <input type="hidden" name="email" id="asaas_id" value="'.$_GET['email'].'">
                    <button type="submit" class="button">Salvar</button>

                </fieldset>


                <p>Caso não tenha sido você, ignore este email</p>
            </form>
        ';


        print($texto);



//        sendMail($email,'BACKHAND - Recuperação de Senha',$texto);


    }

?>