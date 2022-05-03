<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

$destino= "roggerabraham1@gmail.com";
$motivo = $_POST["motivo"];
$nombre = $_POST["nom"];
$apellido = $_POST["surnom"];
$telefono = $_POST["tel"];
$correo = $_POST["correo"];
$mensaje = $_POST["mensaje"];
$contenido = "Nombre: " . $nombre . "\nApellido(s): " . $apellido . "\nTeléfono: " . $telefono . "\nCorreo: " . $correo . "\nMensaje: " .$mensaje;

try {
    //Server settings
    $mail->SMTPDebug = 0;                      
    $mail->isSMTP();                                           
    $mail->Host       = 'smtp.gmail.com';  //Host del servicio de gmail, cambiar de acuerdo al servicio que tiene el correo
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'pirineos.contacto@gmail.com';                     //Correo que envia el mensaje
    $mail->Password   = 'Pirineos-10';                               //Contraseña del correo
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('pirineos.contacto@gmail.com', 'Solicitud de formulario'); //Cambiar correo de acuerdo a la persona o empresa que quiere ENVIAR el correo
    $mail->addAddress($destino);     //Correo que RECIBE el mensaje

    //Content
    $mail->isHTML(true);                                  //Contenido del correo
    $mail->Subject = ($motivo);
    $mail->Body    = ($contenido);

    $mail->send();
    echo 'El mensaje se envio correctamente';
} catch (Exception $e) {
    echo "Error al enviar el mensaje: {$mail->ErrorInfo}";
}