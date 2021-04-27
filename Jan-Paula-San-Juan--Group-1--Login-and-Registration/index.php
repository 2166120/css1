<?php
session_start();
if(!empty($_SESSION["logged_in"])&&$_SESSION["logged_in"]===TRUE) {
	header("Location: success.php");
	die();
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8"/>
		<title>Jan Paula S. San Juan-Group 1-Login and Registration</title>
		<link rel="stylesheet" type="text/css" href="normalize.css"/>
		<link rel="stylesheet" type="text/css" href="style.css"/>
	</head>
	<body>
<?php	if(isset($_SESSION["errors"])) {	?>
		<div class="error">
<?php		foreach($_SESSION["errors"] as $error) {	?>
			<p><?= $error ?></p>
<?php		}
			unset($_SESSION["errors"]);
?>	
		</div>
<?php	}
		if(isset($_SESSION["success_message"])) {
?>
		<p class="success"><?= $_SESSION["success_message"] ?></p>
<?php		unset($_SESSION["success_message"]);
		}
?>
		<form action="process.php" method="post">
			<input type="hidden" name="action" value="register"/>
			<h2>Register</h2>
			<p>First Name: <input type="text" name="first_name"/></p>
			<p>Last Name: <input type="text" name="last_name"/></p>
			<p>Email Address: <input type="text" name="email"/></p>
			<p>Password: <input type="password" name="password"/></p>
			<p>Confirm Password: <input type="password" name="confirm_password"/></p>
			<input type="submit" value="Register"/>
		</form>
		<form action="process.php" method="post">
			<input type="hidden" name="action" value="login"/>
			<h2>Login</h2>
			<p>Email Address: <input type="text" name="email"/></p>
			<p>Password: <input type="password" name="password"/></p>
			<input type="submit" value="Log In"/>
		</form>
	</body>
</html>