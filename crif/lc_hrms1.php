<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $time = $_POST['time'];
    $date = $_POST['date'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $equipment = 'Liquid Chromatography-High Resolution Mass Spectrometry (LC-HRMS)';


    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'shankerr7780@gmail.com';
        $mail->Password = 'noludutdzbromqiy';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('shankerr7780@gmail.com', 'Booking System');
        $mail->addAddress('shankarbablu22@gmail.com', 'HOD');
        $mail->addAddress('shankerr7780@gmail.com', 'Faculty In-charge');
        $mail->addAddress('technician_email@example.com', 'Technician');

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Booking Confirmed';
        $mail->Body = "<p>A new booking has been confirmed for the equipment:</p>
                          <p><strong>Equipment:</strong> $equipment</p>
                          <p><strong>Name:</strong> $name</p>
                          <p><strong>Email:</strong> $email</p>
                          <p><strong>Time:</strong> $time</p>
                          <p><strong>Date:</strong> $date</p>";
        $mail->AltBody = "A new booking has been confirmed for the equipment: $equipment\n
                          Name: $name\n
                          Email: $email\n
                          Time: $time\n
                          Date: $date";

        $mail->send();
        echo 'Booking confirmation email has been sent successfully!';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo 'Invalid request method';
}
?>