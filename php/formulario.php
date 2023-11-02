<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombre = $_POST["nombre"];
  $email = $_POST["email"];
  $asunto = $_POST["asunto"];
  $mensaje = $_POST["mensaje"];

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
    if (mail($destinatario, "Mensaje de contacto", $mensajeCorreo)) {
      echo "Mensaje enviado con éxito. Gracias por contactarnos.";
    } else {
      echo "Hubo un problema al enviar el mensaje. Por favor, inténtalo de nuevo más tarde.";
    }
  }
}
?>
