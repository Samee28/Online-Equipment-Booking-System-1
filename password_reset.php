<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect to login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('location: login.php');
    exit;
}

// Include config file
require_once 'config/config.php';

// Define variables and initialize with empty values
$new_password = $confirm_password = '';
$new_password_err = $confirm_password_err = '';

// Processing form data when form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Validate new password
    if (empty(trim($_POST['new_password']))) {
        $new_password_err = 'Please enter the new password.';
    } elseif (strlen(trim($_POST['new_password'])) < 6) {
        $new_password_err = 'Password must have atleast 6 characters.';
    } else {
        $new_password = trim($_POST['new_password']);
    }

    // Validate confirm password
    if (empty(trim($_POST['confirm_password']))) {
        $confirm_password_err = 'Please confirm the password.';
    } else {
        $confirm_password = trim($_POST['confirm_password']);
        if (empty($new_password_err) && ($new_password != $confirm_password)) {
            $confirm_password_err = 'Password did not match.';
        }
    }

    // Check input errors before updating the database
    if (empty($new_password_err) && empty($confirm_password_err)) {
        // Prepare an update statement
        $sql = 'UPDATE users SET password = ? WHERE id = ?';

        if ($stmt = $mysql_db->prepare($sql)) {
            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];

            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("si", $param_password, $param_id);


            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Password updated successfully. Destroy the session, and redirect to login page
                echo "<script>alert('Password updated successfully.');</script>";
                session_destroy();

                header("location: login.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }

        // Close connection
        $mysql_db->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/cosmo/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-qdQEsAI45WFCO5QwXBelBe1rR9Nwiss4rGEqiszC+9olH1ScrLrMQr1KmDR964uZ" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            background-image: url('img2.jpg');
        }

        .wrapper {
            max-width: 500px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        .wrapper h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 5px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-primary {
            border-radius: 4px;
        }

        .btn-link {
            border-radius: 4px;
        }

        .error-message {
            color: red;
        }
    </style>
</head>

<body>
    <main class="container wrapper">
        <section>
            <h2>Reset Password</h2>
            <p class="text-center">Please fill out this form to reset your password.</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                    <label>New Password</label>
                    <input type="password" name="new_password" class="form-control"
                        value="<?php echo htmlspecialchars($new_password); ?>">
                    <span class="error-message"><?php echo $new_password_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control">
                    <span class="error-message"><?php echo $confirm_password_err; ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-block btn-primary" value="Submit">
                    <a class="btn btn-block btn-link bg-light" href="welcome.php">Cancel</a>
                </div>
            </form>
        </section>
    </main>
</body>

</html>