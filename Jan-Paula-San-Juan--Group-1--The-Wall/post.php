<?php
session_start();
require_once("new-connection.php");
$_SESSION["errors"]=array();
if(isset($_POST["action"])&&$_POST["action"]==="post_message") {
	message($_POST);
} elseif(isset($_POST["action"])&&$_POST["action"]==="post_comment") {
	comment($_POST);
} elseif(isset($_POST["action"])&&$_POST["action"]==="delete") {
	delete($_POST);
}

function message($post) {
	if(!empty($post["message"])) {
		$query="INSERT INTO messages (user_id, message, created_at, updated_at) VALUES ({$_SESSION["user_id"]}, '".escape_this_string($post["message"])."', NOW(), NOW())";
		run_mysql_query($query);
	} else {
		$_SESSION["errors"][]="Sent message must not be empty!";
	}
}
function comment($post) {
	if(!empty($post["comment"])) {
		$query="INSERT INTO comments (user_id, comment, message_id, created_at, updated_at) 
		VALUES ({$_SESSION["user_id"]}, '".escape_this_string($post["comment"])."', {$post["message_id"]}, NOW(), NOW())";
		run_mysql_query($query);
	} else {
		$_SESSION["errors"][]="Sent comment must not be empty!";
	}
}
function delete($post) {
	if($post["content"]==="message") {
		$query="DELETE FROM messages WHERE user_id={$_SESSION["user_id"]} AND id={$post["message_id"]} AND TIMESTAMPDIFF(MINUTE, updated_at, NOW())>=30 LIMIT 1";
		run_mysql_query($query);
	} elseif($post["content"]==="comment") {
		$query="DELETE FROM comments WHERE user_id={$_SESSION["user_id"]} AND message_id={$post["message_id"]} AND id={$post["comment_id"]} AND 
		TIMESTAMPDIFF(MINUTE, updated_at, NOW())>=30";
		run_mysql_query($query);
	}
}

header("Location: main.php");
mysqli_close($connection);
die();
?>