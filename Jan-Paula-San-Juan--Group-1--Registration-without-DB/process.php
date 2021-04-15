<?php
	session_start();
	$errors=array();
	
	if(!empty($_POST["email"])) {
		if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
			$errors[]="This email is not valid.\n";
		}	
	} else {
		$errors[]="Email should not be empty.\n";
	}
	
	if(!empty($_POST["first_name"])) {
		for($i=0;$i<strlen($_POST["first_name"]);$i++) {
			if($_POST["first_name"]{$i}=="0"||$_POST["first_name"]{$i}=="1"||$_POST["first_name"]{$i}=="2"||$_POST["first_name"]{$i}=="3"||$_POST["first_name"]{$i}=="4"||
			$_POST["first_name"]{$i}=="5"||$_POST["first_name"]{$i}=="6"||$_POST["first_name"]{$i}=="7"||$_POST["first_name"]{$i}=="8"||$_POST["first_name"]{$i}=="9") {
				$errors[]="First name should not have numbers.\n";
				break;
			}
		}
	} else {
		$errors[]="First name should not be empty.\n";
	}
	
	if(!empty($_POST["last_name"])) {
		for($i=0;$i<strlen($_POST["last_name"]);$i++) {
			if($_POST["last_name"]{$i}=="0"||$_POST["last_name"]{$i}=="1"||$_POST["last_name"]{$i}=="2"||$_POST["last_name"]{$i}=="3"||$_POST["last_name"]{$i}=="4"||
			$_POST["last_name"]{$i}=="5"||$_POST["last_name"]{$i}=="6"||$_POST["last_name"]{$i}=="7"||$_POST["last_name"]{$i}=="8"||$_POST["last_name"]{$i}=="9") {
				$errors[]="Last name should not have numbers.\n";
				break;
			}
		}
	} else {
		$errors[]="Last name should not be empty.\n";
	}
	
	if(!empty($_POST["password"])) {
		if(strlen($_POST["password"])<7) {
			$errors[]="Password should have more than 6 characters.\n";
		}
	} else {
		$errors[]="Password should not be empty.\n";
	}
	
	if(!empty($_POST["confirm_password"])) {
		if($_POST["confirm_password"]!=$_POST["password"]) {
			$errors[]="Password and confirm password should be the same.\n";
		}
	} else {
		$errors[]="Password confirmation should not be empty.\n";
	}
	
	if(!empty($_POST["birthday"])) {
		$birth=explode("/", $_POST["birthday"]);
		if(!empty($birth[1])&&!empty($birth[2])) {
			if(strlen($birth[0])!=2||strlen($birth[1])!=2||strlen($birth[2])!=4) {
				$errors[]="Birthday should be in valid date format.\n";
			}
			if(!checkdate($birth[1], $birth[0], $birth[2])) {
				$errors[]="Birthday should have an appropriate day according to a month and whether a year is a leap year or not, an month, and a year.";
			}
		} else {
			$errors[]="Birthday should be in valid date format and have a day, a month, and a year.\n";
		}
	} else {
		$errors[]="Birthday should not be empty.\n";
	}
	
	$uploaddir = "uploads/";
	$uploadfile = $uploaddir . basename($_FILES["profile_picture"]["name"]);
	if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $uploadfile)) {
			
	} else {
		$errors[]="Profile picture is invalid.\n";
	}

	
	if(!empty($errors)) {
		$_SESSION["errors"]=$errors;
		header("Location: index.php");
	} else {
		echo "YOU ARE LOGGED IN";
	}
?>