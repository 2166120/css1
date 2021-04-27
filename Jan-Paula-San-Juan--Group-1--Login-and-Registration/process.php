<?php
session_start();
require_once("new-connection.php");
$_SESSION["errors"]=array();
if(isset($_POST["action"])&&$_POST["action"]=="register") {
	register_user($_POST);
} elseif(isset($_POST["action"])&&$_POST["action"]=="login") {
	login_user($_POST);
} else {
	session_destroy();
	header("Location: index.php");
}

function register_user($post) {
	if(empty($post["first_name"])) {
		$_SESSION["errors"][]="First name can't be blank!";
	} else {
		if(strlen($post["first_name"])<2) {
			$_SESSION["errors"][]="First name should have 2 or more characters!";
		}
		for($i=0;$i<strlen($post["first_name"]);$i++) {
			if($post["first_name"]{$i}==="0"||$post["first_name"]{$i}==="1"||$post["first_name"]{$i}==="2"||$post["first_name"]{$i}==="3"||
			$post["first_name"]{$i}==="4"||$post["first_name"]{$i}==="5"||$post["first_name"]{$i}==="6"||$post["first_name"]{$i}==="7"||
			$post["first_name"]{$i}==="8"||$post["first_name"]{$i}==="9") {
				$_SESSION["errors"][]="First name should not have numbers!";
				break;
			}
		}
	}
	if(empty($post["last_name"])) {
		$_SESSION["errors"][]="Last name can't be blank!";
	} else {
		if(strlen($post["last_name"])<2) {
			$_SESSION["errors"][]="Last name should have 2 or more characters!";
		}
		for($i=0;$i<strlen($post["last_name"]);$i++) {
			if($post["last_name"]{$i}==="0"||$post["last_name"]{$i}==="1"||$post["last_name"]{$i}==="2"||$post["last_name"]{$i}==="3"||$post["last_name"]{$i}==="4"||
			$post["last_name"]{$i}==="5"||$post["last_name"]{$i}==="6"||$post["last_name"]{$i}==="7"||$post["last_name"]{$i}==="8"||$post["last_name"]{$i}==="9") {
				$_SESSION["errors"][]="Last name should not have numbers!";
				break;
			}
		}
	}
	if(empty($post["email"])) {
		$_SESSION["errors"][]="Email can't be blank!";
	}
	if(!filter_var($post["email"], FILTER_VALIDATE_EMAIL)) {
		$_SESSION["errors"][]="Please use a valid email!";
	}
	if(empty($post["password"])) {
		$_SESSION["errors"][]="Password can't be blank!";
	} else {
		if(strlen($post["password"])<8) {
			$_SESSION["errors"][]="Password should have 8 or more characters!";
		}
	}
	if(empty($post["confirm_password"])) {
		$_SESSION["errors"][]="Confirm password can't be blank!";
	}
	if($post["password"]!==$post["confirm_password"]) {
		$_SESSION["errors"][]="Password and confirm password must match!";
	}
	if(count($_SESSION["errors"])>0) {
		$_SESSION["errors"][]="You didn't validate correctly!";
	} else {
		$query="SELECT * FROM users WHERE email='".escape_this_string($post['email'])."' LIMIT 1";
		$user=fetch_all($query);
		if(count($user)===0) {
			$salt=bin2hex(openssl_random_pseudo_bytes(22));
			$query="INSERT INTO users (first_name, last_name, email, password, salt, created_at, updated_at) VALUES ('".
			escape_this_string($post['first_name'])."', '".escape_this_string($post['last_name'])."', '".
			escape_this_string($post['email'])."', '".md5(escape_this_string($post['password']).''.$salt)."', '{$salt}', NOW(), NOW())";
			run_mysql_query($query);
			$_SESSION["success_message"]="User successfully created! Good job registering!";
		} else {
			$_SESSION["errors"][]="This user already exists!";
		}
	}
	header("Location: index.php");
}
function login_user($post) {
	if(!empty($post["email"])&&!empty($post["password"])) {
		$query="SELECT * FROM users WHERE email='".escape_this_string($post['email'])."'";
		$user=fetch_all($query);
		if(count($user)>0) {
			if(md5(escape_this_string($post["password"]).''.$user[0]["salt"])===$user[0]["password"]) {
				$_SESSION["user_id"]=$user[0]["id"];
				$_SESSION["first_name"]=$user[0]["first_name"];
				$_SESSION["last_name"]=$user[0]["last_name"];
				$_SESSION["logged_in"]=TRUE;
				header("Location: success.php");
			} else {
				$_SESSION["errors"][]="Wrong password!";
				header("Location: index.php");
			}
		} else {
			$_SESSION["errors"][]="Can't find a user with those credentials!";
			header("Location: index.php");
		}
	} else {
		if(empty($post["email"])) {
			$_SESSION["errors"][]="Email can't be blank!";
		}
		if(empty($post["password"])) {
			$_SESSION["errors"][]="Password can't be blank!";
		}
		header("Location: index.php");
	}
}

mysqli_close($connection);
die();
?>