<?php
require("class.phpmailer.php");
require("class.smtp.php");

$mail = new PHPMailer();

$mail->IsSMTP();                                      // set mailer to

$mail->Host = "mail.tu-nombre-de-dominio.com";  // specify main and backup server
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->Username = "tu-correo@tu-nombre-de-dominio.com";  // SMTP username
$mail->Password = "tu-contraseña"; // SMTP password

$mail->From = "prueba@tu-nombre-de-dominio.com";
$mail->FromName = "remitente";        // remitente
$mail->AddAddress("tu-correo@tu-nombre-de-dominio.com", "destinatario");        // destinatario

$mail->AddReplyTo("tu-correo@tu-nombre-de-dominio.com", "respuesta a");    // responder a

$mail->WordWrap = 50;     // set word wrap to 50 characters
$mail->IsHTML(true);     // set email

$mail->Subject = "Asunto .....";
$mail->Body    = "This is the HTML message body <b>in bold!</b>";
$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}

echo "Message has been sent";
?> 