<?php

use PHPMailer\PHPMailer\PHPMailer;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
//require 'PHPMailer/Exception.php';

$errors = [];
$errorMessage = '';

if (!empty($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if (empty($name)) {
        $errors[] = 'Name is empty';
    }

    if (empty($email)) {
        $errors[] = 'Email is empty';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email is invalid';
    }

    if (empty($message)) {
        $errors[] = 'Message is empty';
    }


    if ($errors) {
//        $allErrors = join('<br/>', $errors);
//        $errorMessage = "";
        echo "<script>alert('Error al Enviar el Correo')</script>";

    } else {
        $mail = new PHPMailer();

        // specify SMTP credentials
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'orelenriquez19@gmail.com';
        $mail->Password = 'orel199720';
        $mail->SMTPSecure = 'PHPMailer::ENCRYPTION_STARTTLS';
        $mail->Port = 25;

        $mail->setFrom($email, 'Oliver Enríquez');
        $mail->addAddress('orelenriquez19@gmail.com', 'Me');
        $mail->Subject = 'Nuevo Correo recibido de tu Web';

        // Enable HTML if needed
        $mail->isHTML(true);

        $bodyParagraphs = ["Nombre: {$name}", "Correo: {$email}", "Mensaje:", nl2br($message)];
        $body = join('<br />', $bodyParagraphs);
        $mail->Body = $body;

//        echo $body;
        if($mail->send()){
            echo "<script>
                alert('Correo enviado Exitosamente');
                window.location= '../main/main.html'
    </script>";
        } else {
            $errorMessage = 'Oops, something went wrong. Mailer Error: ';
        }
    }
}

?>