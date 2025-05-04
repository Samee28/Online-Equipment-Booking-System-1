<?php
$dsn = 'mysql:host=localhost;dbname=login';
$username = 'root';
$password = '12345';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("SELECT * FROM bookings WHERE status = 'pending'");
    $stmt->execute();
    $bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'Database error: ' . $e->getMessage();
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pending Bookings</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            background-image: url('img2.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar-custom {
            background: linear-gradient(to right, #6a8daf, #89a9c7);
            background: repeating-linear-gradient(45deg, #6a8daf, #6a8daf 2px, #89a9c7 10px, #89a9c7 20px);
            color: white;
        }

        .footer {
            background-color: gray;
            color: white;
            text-align: center;
            padding: 10px;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        .table thead th {
            background-color: #343a40;
            color: white;
            border-color: #454d55;
        }

        .table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .table-bordered {
            border: 1px solid #dee2e6;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <a class="navbar-brand text-white" href="#">
            <img src="../nit.jpeg" width="30" height="30" class="d-inline-block align-top" alt=""
                style="border-radius:10px;">
            NITW - Online Equipment Booking System
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="color: white;"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <!-- <a href="../welcome.php" class="btn btn-outline-success text-dark mr-2">Back to Home</a> -->
                </li>
            </ul>
        </div>
    </nav>

    <main>
        <section class="container mt-5">
            <div class="page-header">
                <h1 class="display-5 text-center">Pending Bookings</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Equipment</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($bookings as $booking): ?>
                                <tr>
                                    <td><?= htmlspecialchars($booking['id']) ?></td>
                                    <td><?= htmlspecialchars($booking['name']) ?></td>
                                    <td><?= htmlspecialchars($booking['email']) ?></td>
                                    <td><?= htmlspecialchars($booking['date']) ?></td>
                                    <td><?= htmlspecialchars($booking['time']) ?></td>
                                    <td><?= htmlspecialchars($booking['equipment_id']) ?></td>
                                    <td>
                                        <button class="btn btn-success btn-sm approve-booking"
                                            data-id="<?= $booking['id'] ?>">Approve</button>
                                        <button class="btn btn-danger btn-sm deny-booking"
                                            data-id="<?= $booking['id'] ?>">Deny</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer bg-dark text-white mt-5">
        <div class="container text-center">
            <p>&copy; <?php echo date("Y"); ?> Your Company. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.approve-booking').on('click', function () {
                var bookingId = $(this).data('id');
                $.post('update_booking_status.php', { id: bookingId, status: 'approved' }, function (response) {
                    alert(response.message);
                    location.reload();
                }, 'json');
            });

            $('.deny-booking').on('click', function () {
                var bookingId = $(this).data('id');
                $.post('update_booking_status.php', { id: bookingId, status: 'denied' }, function (response) {
                    alert(response.message);
                    location.reload();
                }, 'json');
            });
        });
    </script>
</body>

</html>