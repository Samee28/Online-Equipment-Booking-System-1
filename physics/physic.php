<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            background-image: url('../img2.jpg');
        }

        .navbar-custom {
            background: linear-gradient(to right, #6a8daf, #89a9c7);
            /* Light blue gradient */
            background: repeating-linear-gradient(45deg,
                    #6a8daf,
                    #6a8daf 2px,
                    #89a9c7 10px,
                    #89a9c7 20px);
            color: white;
        }

        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: gray;
            text-align: center;
            padding: 10px;
        }

        .list-group-item {
            transition: transform 0.2s;
        }

        .list-group-item:hover {
            transform: scale(1.05);
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
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="../welcome.php" class="btn btn-outline-success text-dark">Back to Home</a>
                </li>
            </ul>
        </div>
    </nav>

    <main>
        <section class="container mt-5">
            <div class="page-header">
                <h1 class="display-5 text-center">Welcome to Physics Department Equipment Booking System</h1>
                <u>
                    <h2 class="text-center mt-4">Physics Department Equipments List</h2>
                </u>
            </div>
            <div class="list-group mt-5">
                <a href="crif_equipment.php" class="list-group-item list-group-item-action">
                    <h5 class="mb-1">Equipment 1</h5>
                    <p class="mb-1">Description of Equipment 1.</p>
                </a>
                <a href="crif_equipment.php" class="list-group-item list-group-item-action">
                    <h5 class="mb-1">Equipment 2</h5>
                    <p class="mb-1">Description of Equipment 2.</p>
                </a>
                <a href="crif_equipment.php" class="list-group-item list-group-item-action">
                    <h5 class="mb-1">Equipment 3</h5>
                    <p class="mb-1">Description of Equipment 3.</p>
                </a>
                <a href="crif_equipment.php" class="list-group-item list-group-item-action">
                    <h5 class="mb-1">Equipment 4</h5>
                    <p class="mb-1">Description of Equipment 4.</p>
                </a>
            </div>
        </section>
    </main>

    <footer class="footer">
        <p>&copy; <?php echo date("Y"); ?> Shanker. All rights reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>