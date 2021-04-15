<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8"/>
		<title>Jan Paula S. San Juan-Group 1-Registration without DB</title>
		<link rel="stylesheet" type="text/css" href="normalize.css"/>
		<link rel="stylesheet" type="text/css" href="style.css"/>
	</head>
	<body>
		<h1>Registration without DB</h1>
		<form action="process.php" method="post" enctype="multipart/form-data">
			<p>Email: <input type="text" name="email"/></p>
			<p>First Name: <input type="text" name="first_name"/></p>
			<p>Last Name: <input type="text" name="last_name"/></p>
			<p>Password: <input type="password" name="password"/></p>
			<p>Confirm Password: <input type="password" name="confirm_password"/></p>
			<p>Birthday (dd/mm/YYYY): <input type="text" name="birthday" placeholder="dd/mm/YYYY"/></p>
			<p>Profile Picture:</p>
			<p><input type="file" name="profile_picture"/></p>
			<input type="submit"/>
		</form>
<?php
	if(isset($_SESSION["errors"])) {
		foreach($_SESSION["errors"] as $error) {
			echo $error;
		}
		$_SESSION=array();
	}
?>
	</body>
</html>