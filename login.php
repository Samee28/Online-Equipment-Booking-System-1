<?php
// Initialize session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  header("location: welcome.php");
  exit;
}

// Include config file
require_once "config/config.php";

// Define variables and initialize with empty values
$username = $password = '';
$username_err = $password_err = '';

// Process submitted form data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Check if username is empty
  if (empty(trim($_POST['username']))) {
    $username_err = 'Please enter username.';
  } else {
    $username = trim($_POST['username']);
  }

  // Check if password is empty
  if (empty(trim($_POST['password']))) {
    $password_err = 'Please enter your password.';
  } else {
    $password = trim($_POST['password']);
  }

  // Validate credentials
  if (empty($username_err) && empty($password_err)) {
    // Prepare a select statement
    $sql = 'SELECT id, username, password FROM users WHERE username = ?';

    if ($stmt = $mysql_db->prepare($sql)) {

      // Set parameter
      $param_username = $username;

      // Bind parameter to statement
      $stmt->bind_param('s', $param_username);

      // Attempt to execute the prepared statement
      if ($stmt->execute()) {

        // Store result
        $stmt->store_result();

        // Check if username exists, if yes then verify password
        if ($stmt->num_rows == 1) {
          // Bind result variables
          $stmt->bind_result($id, $username, $hashed_password);
          if ($stmt->fetch()) {
            if (password_verify($password, $hashed_password)) {
              // Password is correct, start a new session
              session_start();

              // Store data in session variables
              $_SESSION['loggedin'] = true;
              $_SESSION['id'] = $id;
              $_SESSION['username'] = $username;

              // Redirect user to welcome page
              header('location: welcome.php');
            } else {
              // Display an error message if password is invalid
              $password_err = '<span style="color: red;">Invalid password.</span>';
            }
          }
        } else {
          // Display an error message if username doesn't exist
          $username_err = '<span style="color: red;">Username does not exist.</span>';
        }
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
  <title>Login</title>
  <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/cosmo/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-qdQEsAI45WFCO5QwXBelBe1rR9Nwiss4rGEqiszC+9olH1ScrLrMQr1KmDR964uZ" crossorigin="anonymous">
  <style>
    body {
      background-color: #f8f9fa;
      background-image: url('img/g7.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      height: 100vh;
      display: flex;
      flex-direction: column;
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

    .btn-login {
      border-radius: 4px;
    }

    .alert {
      margin-top: 10px;
      margin-bottom: 0;
    }

    .error-message {
      color: red;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="wrapper">
      <h2 class="display-4">Login</h2>
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
          <label for="username">Username</label>
          <input type="text" name="username" id="username" class="form-control" value="<?php echo $username ?>">
          <span class="error-message"><?php echo $username_err; ?></span>
        </div>

        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
          <label for="password">Password</label>
          <input type="password" name="password" id="password" class="form-control" value="<?php echo $password ?>">
          <span class="error-message"><?php echo $password_err; ?></span>
        </div>

        <div class="form-group">
          <input type="submit" class="btn btn-block btn-primary btn-login" value="Login">
        </div>
        <p class="text-center">Don't have an account? <a href="register.php">Sign up now</a>.</p>
      </form>
    </div>
  </div>
</body>

</html>