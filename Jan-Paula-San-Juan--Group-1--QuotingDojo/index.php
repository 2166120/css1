<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8"/>
		<title>Jan Paula S. San Juan-Group 1-QuotingDojo</title>
		<link rel="stylesheet" type="text/css" href="normalize.css"/>
		<link rel="stylesheet" type="text/css" href="style.css"/>
	</head>
	<body>
		<div>
			<h1>Welcome to QuotingDojo</h1>
			<form action="process.php" method="post">
				<input type="hidden" name="action" value="insert"/>
				<p>Your name: <input type="text" name="name"/></p>
				<p>Your quote: <textarea name="quote"></textarea></p>
				<input type="submit" id="submit" name="submit" value="Add my quote!"/>
				<a href="main.php">Skip to quotes!</a>
			</form>
			<div>
<?php
	if(!empty($_SESSION["errors"])) {
		foreach($_SESSION["errors"] as $error) {
?>
				<p><?= $error ?></p>
<?php
		}
		$_SESSION=array();
	}
?>
			</div>
		</div>
	</body>
</html>