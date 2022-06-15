<?php

require __DIR__.'/Bibliotecas/PHPMailer/src/Exception.php';
require __DIR__.'/Bibliotecas/PHPMailer/src/PHPMailer.php';
require __DIR__.'/Bibliotecas/PHPMailer/src/SMTP.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

$nome = $_POST["nome"];
$email= $_POST["email"];
$mensagem = $_POST["mensagem"]; 

    $mail = new PHPMailer;

    $mail->isSMTP();
    $mail->Host = 'smtp-mail.outlook.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Mailer = "smtp";
    $mail->Username = base64_decode('YWdpbHNvbl94eHRAaG90bWFpbC5jb20=');
    $mail->Password = base64_decode('QFJpYWNodTAx');
    $mail->Port = 587;

    $mail->SetFrom(base64_decode('YWdpbHNvbl94eHRAaG90bWFpbC5jb20='));
    $mail->addAddress('agilson.profissional@gmail.com');
    $mail->addReplyTo($email);

    $mail->isHTML(true);
   

    $mail->Subject = "Novo contato RECRUTADOR: $nome";
    $mail->Body    = nl2br($mensagem);
    $mail->AltBody = nl2br(strip_tags($mensagem));

    if(!$mail->send()) {
        echo 'Não foi possível enviar a mensagem.<br>';
        echo 'Erro: ' . $mail->ErrorInfo;
        header('Location: index.php?email=1#email');
    } else {
         header('Location: index.php?email=2#email');
    }
?>
