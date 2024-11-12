<?php 

    if(isset($_POST['para']) &&isset($_POST['assunto']) && isset($_POST['mensagem'])){
        require("mail/PHPMailer.php"); 
        require("mail/SMTP.php"); 
         $mail = new PHPMailer\PHPMailer\PHPMailer();
         $mail->CharSet = "UTF-8";
         $mail->Encoding = 'base64';
         $mail->IsSMTP(); // enable SMTP 
         $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only 
         $mail->SMTPAuth = true; // authentication enabled 
         $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail 
         $mail->Host = "smtp.titan.email "; 
         $mail->Port = 465; //465 or 587 
         $mail->IsHTML(true); 
         $mail->Username = "tales@planet3.com.br"; 
         $mail->Password = "@Xspider0"; 
         $mail->From = 'tales@planet3.com.br';

         $mail->Subject = $_POST['assunto']; 
         $mail->Body = $_POST['mensagem']; 
         $mail->AddAddress($_POST['para']); 

        if(!$mail->Send()) { 
            echo '{"send_mail" : 0}' ; 
        } else { 
            echo '{"send_mail" : 1}' ; 
        } 
    } else { 
        echo '{"send_mail" : 0}' ; 
    } 

?> 