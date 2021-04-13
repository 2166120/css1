<?php
session_start();
if(empty($_SESSION["gold"])&&!isset($_SESSION["message"])) {
	$_SESSION["gold"]=0;
	$_SESSION["message"]="";
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8"/>
		<title>Make Money!!!</title>
		<link rel="stylesheet" type="text/css" href="normalize.css"/>
		<link rel="stylesheet" type="text/css" href="style.css"/>
	</head>
	<body>
		<h1>Your Gold: <span><?= $_SESSION["gold"] ?></span></h1>
<?php	for($i=0; $i<4; $i++) {	?>
		<form action="process.php" method="post">
<?php		if($i==0) {	?>
			<h1>Farm</h1>
			<input type="hidden" name="building" value="farm"/>
			<h2>(earns 10-20 golds)</h2>
<?php		} elseif($i==1) {	?>
			<h1>Cave</h1>
			<input type="hidden" name="building" value="cave"/>
			<h2>(earns 5-10 golds)</h2>
<?php		} elseif($i==2) {	?>
			<h1>House</h1>
			<input type="hidden" name="building" value="house"/>
			<h2>(earns 2-5 golds)</h2>
<?php		} else {	?>
			<h1>Casino!</h1>
			<input type="hidden" name="building" value="casino"/>
			<h2>(earns/takes 0-50 golds)</h2>
<?php		}	?>
			<input type="submit" value="Find Gold!"/>
		</form>
<?php	}	?>
		<p>Activities:</p>
		<div><?= $_SESSION["message"] ?></div>
	</body>
</html>