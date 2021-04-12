<?php
session_start();
if(empty($_SESSION["answer"])) {
	$_SESSION["answer"] = round(rand(1, 100));
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Jan Paula S. San Juan-Group 1-Great Number Game</title>
		<link rel="stylesheet" type="text/css" href="normalize.css"/>
		<link rel="stylesheet" type="text/css" href="style.css"/>
	</head>
	<body>
		<form method="post" action="index.php">
			<h1>Welcome to the Great Number Game!</h1>
			<p>I am thinking of a number between 1 and 100.</p>
			<p>Take a guess!</p>
			<input type="text" name="number"/>
			<input type="submit" name="submit"/>
		</form>
<?php	if(isset($_POST["number"])) {
			if($_POST["number"] < $_SESSION["answer"]) {	?>
		<h1 class="wrong">Too low!</h1>
<?php		} elseif($_POST["number"] > $_SESSION["answer"]) {	?>
		<h1 class="wrong">Too high!</h1>
<?php		} elseif($_POST["number"] == $_SESSION["answer"]) {	?>
		<div>
			<h1 class="correct"><?= $_SESSION["answer"] ?> was the number.</h1>
			<a href="index.php">Play again!</a>
		</div>
<?php		}
		} else {
		}	?>
	</body>
</html>