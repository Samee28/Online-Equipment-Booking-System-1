<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PDO;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve POST data
    $time = $_POST['time'];
    $date = $_POST['date'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $nsam = $_POST['nsam'];
    $tsam = $_POST['tsam'];
    $rmag = $_POST['rmag'];
    $taa = $_POST['taa'];
    $toa = $_POST['toa'];

    $equipmentId = $_POST['1'];
    $equipmentName = 'Liquid Chromatography-High Resolution Mass Spectrometry (LC-HRMS)';

    // Database connection configuration
    $dsn = 'mysql:host=localhost;dbname=login';
    $username = 'root';
    $password = '12345';

    try {
        // Create a PDO instance
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Check if the slot is already booked
        $stmt = $pdo->prepare("SELECT * FROM bookings WHERE date = ? AND time = ? AND equipment_id = ?");
        $stmt->execute([$date, $time, $equipmentId]);
        $existingBooking = $stmt->fetch();

        if ($existingBooking) {
            // Slot already booked, inform user
            echo json_encode(['status' => 'error', 'message' => 'This slot is already booked.']);
        } else {
            // Slot is available, proceed with booking
            $stmt = $pdo->prepare("INSERT INTO bookings (time, date, name, email, equipment_id, status) VALUES (?, ?, ?, ?, ?, 'pending')");
            $stmt->execute([$time, $date, $name, $email, $equipmentId]);

            // Send email notification to faculty in charge
            $mail = new PHPMailer(true);

            try {
                // SMTP configuration
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
                //$mail->addAddress('shankarbablu.com', 'Technician');

                $mail->isHTML(true);
                $mail->Subject = 'New Booking Request';
                $mail->Body = "<p>A new booking request has been made for the equipment:</p>
                              <p><strong>Equipment:</strong> $equipmentName</p>
                              <p><strong>Name:</strong> $name</p>
                              <p><strong>Email:</strong> $email</p>
                              <p><strong>Time:</strong> $time</p>
                              <p><strong>Date:</strong> $date</p>


                                <p><strong>Number of samples:</strong> $nsam</p>
                                <p><strong>Sample Type:</strong> $tsam</p>
                                <p><strong>Required Magnification :</strong> $rmag</p>
                                <p><strong>Type of Acquisition (2D/3D)  :</strong> $taa</p>
                                <p><strong>Type Of Analysis :</strong> $toa</p>

                              <p>Please review and approve the booking request.</p>
                              <a href='http://localhost/booking/Equipment-Booking-System/crif/list_pending_bookings.php'>Go to Pending Bookings</a>";

                $mail->AltBody = "A new booking request has been made for the equipment: $equipmentName\n
                                  Name: $name\n
                                  Email: $email\n
                                  Time: $time\n
                                  Date: $date\n
                                  Number of samples: $nsam\n
                                    Sample Type: $tsam\n
                                    Required Magnification : $rmag\n
                                    Type of Acquisition (2D/3D)  : $taa\n
                                    Type Of Analysis : $toa\n

                                  Please review and approve the booking request.";

                // Send email
                $mail->send();
                echo json_encode(['status' => 'success', 'message' => 'Booking request has been sent to the faculty in charge for approval.']);
            } catch (Exception $e) {
                echo json_encode(['status' => 'error', 'message' => "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"]);
            }
        }
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>