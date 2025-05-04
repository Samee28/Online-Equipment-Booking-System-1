<?php
header('Content-Type: application/json');

$dsn = 'mysql:host=localhost;dbname=login';
$username = 'root';
$password = '12345';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id']) && isset($_POST['status'])) {
        $id = $_POST['id'];
        $status = $_POST['status'];

        try {
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare("UPDATE bookings SET status = ? WHERE id = ?");
            $stmt->execute([$status, $id]);

            echo json_encode(['message' => 'Booking status updated to ' . $status . ' successfully.']);
        } catch (PDOException $e) {
            echo json_encode(['message' => 'Database error: ' . $e->getMessage()]);
        }
    } else {
        echo json_encode(['message' => 'Invalid ID or status provided']);
    }
} else {
    echo json_encode(['message' => 'Invalid request method']);
}
?>