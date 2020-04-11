<?php

    require_once("constantes.php");
    require_once("funcionesBD.php");
    date_default_timezone_set('America/Argentina/Cordoba');

    require("class.phpmailer.php");
    require("class.smtp.php");

    $vNombre  = $_POST['nombre'];
    $vEmail = $_POST['email'];
    $vAsunto  = $_POST['asunto'];
    $vMensaje = $_POST['mensaje'];
    
    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer();

    $mail->IsSMTP();                                      // set mailer to
    
    $mail->Host = "mail.mpenglishtranslator.com.ar";  // specify main and backup server
    $mail->Port = 25; 
    $mail->SMTPAuth = true;     // turn on SMTP authentication
    $mail->Username = "consultas@mpenglishtranslator.com.ar";  // SMTP username
    $mail->Password = ".M4r1b3LP.!"; // SMTP password
    
    $mail->From = $vEmail;
    $mail->FromName = $vNombre;        // remitente

    $mail->AddAddress("consultas@mpenglishtranslator.com.ar", "MP English Translator");        // destinatario
    
    //$mail->AddReplyTo("tu-correo@tu-nombre-de-dominio.com", "respuesta a");    // responder a
    
    $mail->WordWrap = 50;     // set word wrap to 50 characters
    $mail->IsHTML(true);     // set email
    
    $mail->Subject = $vAsunto;
    $mail->Body    = $vMensaje;
    $mail->AltBody = $vMensaje;

    if(!$mail->Send())
    {
        echo json_encode(array('error' => true));
    }else{
    	echo json_encode(array('error' => false));
    }

?>