<?php

require dirname(__DIR__,1).'/PHPMailer-master/src/Exception.php';
require dirname(__DIR__,1).'/PHPMailer-master/src/PHPMailer.php';
require dirname(__DIR__,1).'/PHPMailer-master/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST["send"])){
    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Mailer ="smtp";
        $mail->Host = "smtp.gmail.com";   
        $mail->Port = 587;
        $mail->SMTPDebug = 3;
        $mail->SMTPAuth = true;
        $mail->Username = "empresaejemplo020@gmail.com";
        $mail->Password = "pdcfcrwmobiowbmn";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->SMTPSecure = "tls";
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->setFrom('empresaejemplo020@gmail.com', 'Empresa 2');
        $mail->addAddress('EmpresaEjemplo0001@gmail.com', 'Empresa 1');
        $mail->isHTML(true);
        $mail->Subject = "Test mail";
        $mail->Body = "<p>This is a test mail send by EmpresaEjemplo020@gmail.com</p>";
        $mail->send();
    } catch (Exception $e) {
            echo "Mailer Error: ".$mail->ErrorInfo;
    }
}

?>