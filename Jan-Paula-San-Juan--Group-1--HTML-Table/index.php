<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8"/>
		<title>Jan Paula S. San Juan-Group 1-HTML Table</title>
		<link rel="stylesheet" type="text/css" href="normalize.css"/>
		<link rel="stylesheet" type="text/css" href="Jan-Paula-San-Juan--Group-1--HTML-Table.css"/>
	</head>
	<body>
<?php
			$users=array( 
			   array("first_name"=>"Michael", "last_name"=>"Choi"),
			   array("first_name"=>"John", "last_name"=>"Supsupin"),
			   array("first_name"=>"Mark", "last_name"=>"Guillen"),
			   array("first_name"=>"KB", "last_name"=>"Tonel"),
			   array("first_name"=>"Jan Paula", "last_name"=>"San Juan"),
			   array("first_name"=>"Dio", "last_name"=>"Brando"),
			   array("first_name"=>"Jonathan", "last_name"=>"Joestar"),
			   array("first_name"=>"Joseph", "last_name"=>"Joestar"),
			   array("first_name"=>"Jotaro", "last_name"=>"Kujo"),
			   array("first_name"=>"Josuke", "last_name"=>"Higashikata"),
			   array("first_name"=>"Giorno", "last_name"=>"Giovanna"),
			   array("first_name"=>"Jolyne", "last_name"=>"Cujoh"),
			   array("first_name"=>"Johnny", "last_name"=>"Joestar"),
			   array("first_name"=>"Gappy", "last_name"=>"Higashikata"),
			);
?>
		<table>
			<thead>
				<tr>
					<th>User #</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Full Name</th>
					<th>Full Name in upper case</th>
					<th>Length of full name <span>(without spaces)</span></th>
				</tr>
			</thead>
			<tbody>
<?php	for($i=0; $i<count($users); $i++) {
			if(($i+1)%5==0) {	?>
				<tr class="fifth">
<?php		} else {	?>
				<tr>
<?php		}	?>
					<td class="user"><?= $i + 1 ?></td>
					<td><?= $users[$i]["first_name"] ?></td>
					<td><?= $users[$i]["last_name"] ?></td>
					<td><?= $users[$i]["first_name"]." ".$users[$i]["last_name"] ?></td>
					<td><?= strtoupper($users[$i]["first_name"]." ".$users[$i]["last_name"]) ?></td>
					<td><?= strlen(implode("", explode(" ", $users[$i]["first_name"])).implode("", explode(" ", $users[$i]["last_name"]))) ?></td>
				</tr>
<?php	}	?>
			</tbody>
		</table>
	</body>
</html>