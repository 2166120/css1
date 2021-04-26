<?php
	session_start();
	require_once("new-connection.php");
	$emails=fetch_all("SELECT email FROM emails ORDER BY id ASC");
	$dates=fetch_all("SELECT DATE_FORMAT(created_at, '%M %D, %Y %l:%i%p') FROM emails ORDER BY id ASC");
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
		<div>
<?php	if(isset($_SESSION["message"])) {	?>
			<p><?= $_SESSION["message"] ?></p>
<?php
		}
		if(!empty($_SESSION["delete_messages"])) {
			for($i=0; $i<count($_SESSION["delete_messages"]); $i++) {
?>
			<p><?= $_SESSION["delete_messages"][$i] ?></p>
<?php
			}
		}
?>
		</div>
		<h1>Email Addresses Entered:</h1>
		<form action="process.php" method="post">
			<input type="hidden" name="action" value="delete"/>
<?php	if(!empty($emails)) {
			for($i=0; $i<count($emails); $i++) {
				$email=implode(",", $emails[$i]);
				$date=implode(",", $dates[$i]);
?>
			<p>
				<input type="checkbox" name="email[]" value="<?= $email ?>">
				<label for="email"><?= "{$email} {$date}" ?></label>
			</p>
<?php	
			}
		}	
?>
			<input type="submit" name="submit" value="Delete Email"/>
		</form>
		<a href="index.php">Go Back</a>
<?php	$_SESSION=array();	?>
	</body>
</html>