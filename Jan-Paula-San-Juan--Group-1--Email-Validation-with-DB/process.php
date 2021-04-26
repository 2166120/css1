<?php
session_start();
require_once("new-connection.php");
$errors=array();
$messages=array();
$message="";
if(isset($_POST["submit"])) {
	if(!empty($_POST["email"])) {
		if($_POST["action"]=="insert"&&!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
			$errors="This email is not valid.\n";
		}
	} else {
		if($_POST["action"]=="insert") {
			$errors="Email should not be empty.\n";
		}
	}
	if($_POST["action"]=="insert") {
		$email=$_POST["email"];
		$query="INSERT INTO emails.emails (email, created_at, updated_at) VALUES ('{$email}', NOW(), NOW())";
		run_mysql_query($query);
		$message="The email address that you entered ({$_POST["email"]}) is a VALID email address! Thank you!\n";
	} elseif($_POST["action"]=="delete") {
		for($i=0; $i<count($_POST["email"]); $i++) {
			$query="DELETE FROM emails.emails WHERE email='{$_POST["email"][$i]}'";
			run_mysql_query($query);
			$messages[$i]="The checked email address {$_POST["email"][$i]} has been successfully deleted.\n";
		}
		$_SESSION["delete_messages"]=$messages;
	}
	if(!empty($errors)) {
		$_SESSION["errors"]=$errors;
		header("Location: index.php");
	} else {
		$_SESSION["message"]=$message;
		header("Location: success.php");
	}
}
mysqli_close($connection);
die();
?>