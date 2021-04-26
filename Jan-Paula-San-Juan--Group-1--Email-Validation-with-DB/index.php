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
		<div>
<?php	if(!empty($_SESSION["errors"])) {	?>
			<?= $_SESSION["errors"] ?>
<?php
		}
		$_SESSION=array();
?>
		</div>
	</body>
</html>