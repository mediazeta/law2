<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombre = htmlspecialchars($_POST["nombre"]);
  $email = htmlspecialchars($_POST["email"]);
  $asunto = htmlspecialchars($_POST["asunto"]);
  $mensaje = htmlspecialchars($_POST["mensaje"]);

  // Verifica que los campos no estén vacíos
  if (empty($nombre) || empty($email) || empty($asunto) || empty($mensaje)) {
    echo "Por favor, completa todos los campos del formulario.";
  } else {
    // Configura el destinatario del correo electrónico
    $destinatario = "patricia.aira@pactarialegal.com";

    // Crea el mensaje de correo electrónico
    $mensajeCorreo = "Nombre: $nombre\n";
    $mensajeCorreo .= "Email: $email\n";
    $mensajeCorreo .= "Asunto: $asunto\n";
    $mensajeCorreo .= "Mensaje:\n$mensaje";

    // Envía el correo electrónico
    // if (mail($destinatario, "Mensaje de contacto", $mensajeCorreo)) {
    //   echo "Mensaje enviado con éxito. Gracias por contactarnos.";
    // } else {
    //   echo "Hubo un problema al enviar el mensaje. Por favor, inténtalo de nuevo más tarde.";
    // }
    $mail = new PHPMailer(true);
    // $mail->isSMTP();
    $mail->setFrom($email);
    $mail->addAddress('emilioarenasmayor@gmail.com');
    $mail->Subject = $asunto;
    $mail->Body = $mensaje;

    $mail->send();
  }
}
?>
