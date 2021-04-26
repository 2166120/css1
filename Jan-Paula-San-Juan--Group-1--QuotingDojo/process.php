<?php
session_start();
require_once("new-connection.php");
$errors=array();
if(isset($_POST["submit"])) {
	if(!empty($_POST["name"])&&!empty($_POST["quote"])) {
		$name=$_POST["name"];
		$quote=$_POST["quote"];
		$query="INSERT INTO name_to_quote (name, quote, created_at, updated_at) VALUES ('".escape_this_string($name)."', '".escape_this_string($quote)."', NOW(), NOW())";
		run_mysql_query($query);
	} else {
		if(empty($_POST["name"])) {
			$errors[]="Name should not be empty.\n";
		}
		if(empty($_POST["quote"])) {
			$errors[]="Quote should not be empty.\n";
		}
	}
	if(!empty($errors)) {
	$_SESSION["errors"]=$errors;
	header("Location: index.php");
	} else {
		header("Location: main.php");
	}
}
mysqli_close($connection);
die();
?>