<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Jan Paula S. San Juan-Group 1-CSV</title>
	</head>
	<body>
<?php
ini_set("auto_detect_line_endings", true);
$file=fopen("us-500/us-500.csv", "r");
$i=1;
while(!feof($file)) {
	$line = fgetcsv($file);
	if(empty($line)) {
		break;
	} elseif($line[0]!="first_name"||$line[1]!="last_name"||$line[2]!="company_name"||$line[3]!="address"||$line[4]!="city"||$line[5]!="county"||$line[6]!="state"||
	$line[7]!="zip"||$line[8]!="phone1"||$line[9]!="phone2"||$line[10]!="email"||$line[11]!="web") {
?>
		<h1>Record <?=$i?></h1>
			<ul>
			  <li>First Name: <?= $line[0] ?></li>
			  <li>Last Name: <?= $line[1] ?></li>
			  <li>Company Name: <?= $line[2] ?></li>
			  <li>Address: <?= $line[3] ?></li>
			  <li>City: <?= $line[4] ?></li>
			  <li>Country: <?= $line[5] ?></li>
			  <li>State: <?= $line[6] ?></li>
			  <li>Zip: <?= $line[7] ?></li>
			  <li>Phone 1: <?= $line[8] ?></li>
			  <li>Phone 2: <?= $line[9] ?></li>
			  <li>Email: <?= $line[10] ?></li>
			  <li>Web: <?= $line[11] ?></li>
			</ul>
<?php
		$i++;
	}
}
fclose($file);
?>
	</body>
</html>