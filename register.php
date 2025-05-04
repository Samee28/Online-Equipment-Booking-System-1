<?php
// Include config file
require_once 'config/config.php';

// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	// Validate username
	if (empty(trim($_POST['username']))) {
		$username_err = "Please enter a username.";
	} else {
		// Prepare a select statement
		$sql = 'SELECT id FROM users WHERE username = ?';

		if ($stmt = $mysql_db->prepare($sql)) {
			// Bind variables to the prepared statement as parameters
			$param_username = trim($_POST['username']);
			$stmt->bind_param('s', $param_username);

			// Attempt to execute the prepared statement
			if ($stmt->execute()) {
				// Store result
				$stmt->store_result();

				if ($stmt->num_rows == 1) {
					$username_err = 'This username is already taken.';
				} else {
					$username = trim($_POST['username']);
				}
			} else {
				echo "Oops! Something went wrong. Please try again later.";
			}

			// Close statement
			$stmt->close();
		} else {
			echo "Oops! Something went wrong. Please try again later.";
		}
	}

	// Validate password
	if (empty(trim($_POST["password"]))) {
		$password_err = "Please enter a password.";
	} elseif (strlen(trim($_POST["password"])) < 6) {
		$password_err = "Password must have at least 6 characters.";
	} else {
		$password = trim($_POST["password"]);
	}

	// Validate confirm password
	if (empty(trim($_POST["confirm_password"]))) {
		$confirm_password_err = "Please confirm password.";
	} else {
		$confirm_password = trim($_POST["confirm_password"]);
		if (empty($password_err) && ($password != $confirm_password)) {
			$confirm_password_err = "Password did not match.";
		}
	}

	// Check input errors before inserting into database
	if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {

		// Prepare an insert statement
		$sql = 'INSERT INTO users (username, password) VALUES (?, ?)';

		if ($stmt = $mysql_db->prepare($sql)) {
			// Bind variables to the prepared statement as parameters
			$param_username = $username;
			$param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

			$stmt->bind_param('ss', $param_username, $param_password);

			// Attempt to execute the prepared statement
			if ($stmt->execute()) {
				// Redirect to login page
				header('location: login.php');
				exit;
			} else {
				echo "Something went wrong. Please try signing up again later.";
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
	<title>Sign Up</title>
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

		.btn-login {
			border-radius: 4px;
		}

		.error-message {
			color: red;
		}

		/* Styling for the reset button hover effect */
		.btn-outline-success:hover {
			background-color: #28a745 !important;
			/* Change background color on hover */
			color: #fff !important;
			/* Change text color on hover */
			border-color: #28a745 !important;
			/* Change border color on hover */
		}

		.btn-outline-primary:hover {
			background-color: #007bff !important;
			/* Change background color on hover */
			color: #fff !important;
			/* Change text color on hover */
			border-color: #007bff !important;
			/* Change border color on hover */
		}
	</style>
</head>

<body>
	<main>
		<section class="container wrapper">
			<h2 class="display-4 pt-3">Sign Up</h2>
			<p class="text-center">Please fill in your credentials.</p>
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
				<div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
					<label for="username">Username</label>
					<input type="text" name="username" id="username" class="form-control"
						value="<?php echo htmlspecialchars($username); ?>">
					<span class="error-message"><?php echo $username_err; ?></span>
				</div>

				<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
					<label for="password">Password</label>
					<input type="password" name="password" id="password" class="form-control"
						value="<?php echo htmlspecialchars($password); ?>">
					<span class="error-message"><?php echo $password_err; ?></span>
				</div>

				<div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
					<label for="confirm_password">Confirm Password</label>
					<input type="password" name="confirm_password" id="confirm_password" class="form-control"
						value="<?php echo htmlspecialchars($confirm_password); ?>">
					<span class="error-message"><?php echo $confirm_password_err; ?></span>
				</div>

				<div class="form-group">
					<input type="submit" class="btn btn-block btn-outline-success btn-login" value="Submit">
					<input type="reset" class="btn btn-block btn-outline-primary" value="Reset">
				</div>
				<p class="text-center">Already have an account? <a href="login.php">Login here</a>.</p>
			</form>
		</section>
	</main>
</body>

</html>