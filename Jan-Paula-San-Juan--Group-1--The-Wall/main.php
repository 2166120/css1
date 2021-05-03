<?php
	session_start();
	require_once("new-connection.php");
	$messages=fetch_all("SELECT id, message, DATE_FORMAT(created_at, '%M %D %Y') AS date FROM messages ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8"/>
		<title>Jan Paula S. San Juan-Group 1-The Wall</title>
		<link rel="stylesheet" type="text/css" href="normalize.css"/>
		<link rel="stylesheet" type="text/css" href="style.css"/>
	</head>
	<body>
		<header>
            <h1>CodingDojo Wall</h1>
            <div class="user_menu">
                <p>Welcome <?= $_SESSION["first_name"] ?> <?= $_SESSION["last_name"] ?>!</p>
                <a href="process.php">Log Off</a>
            </div>
		</header>
		<div class="container">
<?php	if(isset($_SESSION["success_message"])) {	?>
			<p class="success"><?= $_SESSION["success_message"] ?></p>
<?php		unset($_SESSION["success_message"]);
		}
?>
			<form action="post.php" method="post">
				<input type="hidden" name="action" value="post_message"/>
				<input type="hidden" name="user_id" value="<?= $_SESSION["user_id"] ?>"/>
				<h1>Post a message.</h1>
				<textarea name="message"></textarea>
				<input type="submit" name="submit" value="Post a message"/>
			</form>
<?php	if(isset($_SESSION["errors"])) {	?>
			<div class="error">
<?php		foreach($_SESSION["errors"] as $error) {	?>
				<p><?= $error ?></p>
<?php		}
			unset($_SESSION["errors"]);
?>	
			</div>
<?php	}
		if(count($messages)>0) {
			for($i=0; $i<count($messages); $i++) {
				$query="SELECT users.id, CONCAT(first_name, ' ', last_name) AS user FROM users INNER JOIN messages WHERE users.id=user_id AND message='".
				escape_this_string($messages[$i]['message'])."' LIMIT 1";
				$poster=fetch_all($query);
				$query="SELECT id, message_id, user_id, comment, DATE_FORMAT(created_at, '%M %D %Y') AS date FROM comments WHERE message_id={$messages[$i]['id']} ORDER BY created_at DESC";
				$comments=fetch_all($query);
?>
			<div>
				<form action="post.php" method="post">
					<input type="hidden" name="action" value="delete"/>
					<input type="hidden" name="content" value="message"/>
					<input type="hidden" name="message_id" value="<?= $messages[$i]["id"] ?>"/>
					<h2><?= $poster[0]["user"] ?> - <?= $messages[$i]["date"] ?></h2>
					<p><?= $messages[$i]["message"] ?></p>
<?php			if($poster[0]["id"]===$_SESSION["user_id"]) {	?>
					<input type="submit" name="submit" value="Delete 30 minutes after posting"/>
<?php			}	?>
				</form>
				<div class="message_comment">
<?php
				if(count($comments)>0) {
					for($j=0; $j<count($comments); $j++) {
						$query="SELECT users.id, CONCAT(first_name, ' ', last_name) AS user FROM users INNER JOIN comments INNER JOIN messages 
						WHERE users.id=comments.user_id AND messages.id=message_id AND comment='".escape_this_string($comments[$j]['comment'])."' LIMIT 1";
						$commenter=fetch_all($query);
?>
					<form action="post.php" method="post">
						<input type="hidden" name="action" value="delete"/>
						<input type="hidden" name="content" value="comment"/>
						<input type="hidden" name="message_id" value="<?= $messages[$i]["id"] ?>"/>
						<input type="hidden" name="comment_id" value="<?= $comments[$j]["id"] ?>"/>
						<h2>Comment by <?= $commenter[0]["user"] ?> - <?= $comments[$j]["date"] ?></h2>
						<p><?= $comments[$j]["comment"] ?></p>
<?php					if($commenter[0]["id"]===$_SESSION["user_id"]) {	?>
						<input type="submit" name="submit" value="Delete 30 minutes after posting"/>
<?php					}	?>
					</form>
<?php		
					}
				}
?>
					<form action="post.php" method="post">
						<input type="hidden" name="action" value="post_comment"/>
						<input type="hidden" name="user_id" value="<?= $_SESSION["user_id"] ?>"/>
						<input type="hidden" name="message_id" value="<?= $messages[$i]["id"] ?>"/>
						<h2>Post a comment.</h2>
						<textarea name="comment"></textarea>
						<input type="submit" name="submit" value="Post a comment"/>
					</form>
				</div>
			</div>
<?php		}
		}
?>
	</body>
</html>