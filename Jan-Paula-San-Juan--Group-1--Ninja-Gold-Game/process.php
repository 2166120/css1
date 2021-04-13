<?php
session_start();
$current_date = date("m d Y h:ia", strtotime("+8 hours"));
if($_POST["building"]=="farm") {
	$add=rand(10, 20);
	$_SESSION["gold"]+=$add;
	$_SESSION["message"].="<p>You entered a farm and earned {$add} golds. ({$current_date})</p>";
} elseif($_POST["building"]=="cave") {
	$add=rand(5, 10);
	$_SESSION["gold"]+=$add;
	$_SESSION["message"].="<p>You entered a farm and earned {$add} golds. ({$current_date})</p>";
} elseif($_POST["building"]=="house") {
	$add=rand(2, 5);
	$_SESSION["gold"]+=$add;
	$_SESSION["message"].="<p>You entered a farm and earned {$add} golds. ({$current_date})</p>";
} else {
	$add_or_subtract=rand(0, 1);
	$add=rand(0, 50);
	if($add_or_subtract==0) {
		$_SESSION["gold"]+=$add;
		$_SESSION["message"].="<p>You entered a farm and earned {$add} golds. ({$current_date})</p>";
	} else {
		$_SESSION["gold"]-=$add;
		$_SESSION["message"].="<p class='ouch'>You entered a farm and lost {$add} golds... Ouch.. ({$current_date})</p>";
	}
}
header("Location: index.php");
die();
?>