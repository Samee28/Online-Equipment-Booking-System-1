<?php
header('Content-Type: application/json');

$dsn = 'mysql:host=localhost;dbname=login';
$username = 'root';
$password = '12345';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['date']) && isset($_POST['time'])) {
        $date = $_POST['date'];
        $time = $_POST['time'];

        try {
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare("SELECT status FROM bookings WHERE date = ? AND time = ?");
            $stmt->execute([$date, $time]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                $status = $row['status'];
                if ($status == 'pending') {
                    echo json_encode(['status' => 'pending']);
                } elseif ($status == 'approved') {
                    echo json_encode(['status' => 'booked']);
                } elseif ($status == 'denied') {
                    echo json_encode(['status' => 'available']);
                } else {
                    echo json_encode(['status' => 'unknown']);
                }
            } else {
                echo json_encode(['status' => 'available']);
            }
        } catch (PDOException $e) {
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid date or time provided']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>