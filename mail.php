<?php
$nombre= $_POST["nombre"];
$correo= $_POST["correo"];
$mensaje= $_POST["mensaje"];

$body = "Nombre: " . $nombre . "<br>Correo: " . $correo . "<br>Mensaje: "
 . $mensaje;





// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
                     // Enable verbose debug output
    $mail->isSMTP();
                                   // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);                // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'ibabiblioteca20@gmail.com';                     // SMTP username
    $mail->Password   = 'Biblioteca20';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;// TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('ibabiblioteca@gmail.com', $nombre);
    $mail->addAddress('ibabiblioteca20@gmail.com');     // Add a recipient




    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Asunto';
    $mail->Body    = $body;


    $mail->send();
    echo '<script>
    alert("El mensaje se envio correcamente");
    window.history.go(-1);
    </script>';

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
