<?php
	session_start();
	require_once("new-connection.php");
	$quotes=fetch_all("SELECT quote FROM name_to_quote ORDER BY id DESC");
	$names=fetch_all("SELECT name FROM name_to_quote ORDER BY id DESC");
	$dates=fetch_all("SELECT DATE_FORMAT(created_at, '%l:%i%p %M %d %Y') FROM name_to_quote ORDER BY id DESC");
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
			<a href="index.php">Go Back</a>
			<h1>Here are the awesome quotes!</h1>
<?php	if(!empty($quotes)) {
			for($i=0; $i<count($quotes); $i++) {
				$quote=implode(",", $quotes[$i]);
				$name=implode(",", $names[$i]);
				$date=implode(",", $dates[$i]);
?>
			<div>
				<p>"<?= $quote ?>"</p>
				<p class="name">-<?= $name ?> at <?= $date ?></p>
			</div>
<?php	
			}
		}	
?>
		</div>
	</body>
</html>