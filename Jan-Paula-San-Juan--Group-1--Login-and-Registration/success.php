<?php
session_start();
if(empty($_SESSION["logged_in"])||$_SESSION["logged_in"]===FALSE) {
	header("Location: index.php");
	die();
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" type="text/css" href="normalize.css"/>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<title>Jan Paula S. San Juan-Group 1-Login and Registration</title>
	</head>
	<body>
		<div>
			<p><?= "Howdy, {$_SESSION['last_name']}, {$_SESSION['first_name']}!" ?></p>
			<a href="process.php">LOG OFF!</a>
		</div>
	</body>
</html>