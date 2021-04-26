<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8"/>
		<title>Jan Paula S. San Juan-Group 1-Email Validation with DB</title>
		<link rel="stylesheet" type="text/css" href="normalize.css"/>
		<link rel="stylesheet" type="text/css" href="style.css"/>
	</head>
	<body>
		<h1>Email Validation with DB</h1>
		<form action="process.php" method="post">
			<input type="hidden" name="action" value="insert"/>
			<p>Email: <input type="text" name="email"/></p>
			<input type="submit" name="submit"/>
		</form>
<?php
	if(isset($_SESSION["errors"])) {
		foreach($_SESSION["errors"] as $error) {
?>
		<div><?= $error ?></div>
<?php
		}
		$_SESSION=array();
	}
?>
	</body>
</html>