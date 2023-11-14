<?php
if(isset($_POST['submit'])) {
    // $to = "patricia.aira@pactarialegal.com"; // Cambiar por la dirección de correo electrónico a la que deseas enviar el mensaje
    $to = "emilioarenasmayor@gmail.com";
    $name = $_POST['nombre'];
    $email = $_POST['email'];
    $subject = $_POST['asunto'];
    $message = $_POST['mensaje'];
    $headers = "From: $email";

    mail($to, $subject, "Nombre: ".$name."\nEmail: ".$email."\n\n".$message, $headers);
}
?>
