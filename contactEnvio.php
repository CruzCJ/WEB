<?php
$name = $_POST['nombre'];
$email = $_POST['email'];
$txt = $_POST['Mensaje_del_Usuario'];

// Configurar PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'api/vendor/autoload.php';

$mensaje_cliente = "
<html>
<head>
    <title>Contactenos</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-size: 16px;
            font-weight: 300;
            color: #888;
            background-color: rgba(230, 225, 225, 0.5);
            line-height: 30px;
            text-align: center;
        }
        .contenedor {
            width: 80%;
            min-height: auto;
            text-align: center;
            margin: 0 auto;
            padding: 40px;
            background: #ececec;
            border-top: 3px solid #E64A19;
        }
        .bold {
            color: #333;
            font-size: 20px;
            font-weight: bold;
        }
        img {
            margin-left: auto;
            margin-right: auto;
            display: block;
            padding: 0px 0px 20px 0px;
        }
    </style>
</head>
<body>
    <div class=\"contenedor\">
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <span><strong class=\"bold\">Apartado de contacto!</strong></span>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <span>De parte de <strong class=\"bold\">$name</strong></span>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p><strong>Email de contacto: </strong>$email</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p><strong>Mensaje: </strong>$txt</p>
        <p>&nbsp;</p>
        <p><span class=\"bold\">Tu Inmueble S.A!</span></p>
        <p>&nbsp;</p>
        <img src=\"https://live.staticflickr.com/65535/52843572397_f19fa32886_z.jpg\" alt=\"Logo\" width=\"100px\">
        </p>
    </div>
</body>
</html>";

$mail = new PHPMailer(true);

try {
    // Configuración del servidor SMTP
    $mail->SMTPDebug = 2;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'inmuebletu4@gmail.com';                     //SMTP username
    $mail->Password   = 'txzbrnvkzjndzxyc';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;

    // Configuración del correo electrónico
    $mail->setFrom('inmuebletu4@gmail.com', 'Apartado de contactenos');
    $mail->addAddress('inmuebletu4@gmail.com', 'Tu Inmueble S.A');
    $mail->isHTML(true);
    $mail->Subject = '=?UTF-8?B?' . base64_encode('Nuevo mensaje de cliente') . '?=';
    $mail->CharSet = 'UTF-8';
    $mail->ContentType = 'text/html; charset=UTF-8';
    $mail->Body    = $mensaje_cliente;



    // Enviar el correo electrónico
    header("Location: contactenos.php");
    $mail->send();

    exit;
} catch (Exception $e) {
    echo 'El correo electrónico no pudo ser enviado. Error: ', $mail->ErrorInfo;
}
