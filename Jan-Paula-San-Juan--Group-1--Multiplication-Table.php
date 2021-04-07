<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8"/>
		<title>Jan Paula S. San Juan-Group 1-Multiplication Table</title>
		<style>
			th, td{
				height: 60px;
				width: 60px;
				outline: 2px solid black;
				margin: 20px;
				text-align: center;
				font-size: xx-large;
			}
			.alt-row{
				background-color: lightgrey;
			}
			.multiplier{
				font-weight: bold;
			}
		</style>
	</head>
	<body>
		<table>
			<thead>
				<tr class="multiplier">
					<th></th>
<?php			for($i = 1; $i < 10; $i++) {	?>
					<th><?=	$i	?></th>	
<?php			}	?>
				</tr>
			</thead>
			<tbody>
<?php	$row = 1;
		for($i = 1; $i < 10; $i++) {
			if($row == 1) {	?>
				<tr class="alt-row">
<?php			$row = 0;
			} else {	?>
				<tr class="row">
<?php			$row = 1;			
			}	?>
					<td class="multiplier"><?=	$i	?></td>	
<?php			for($j = 1; $j < 10; $j++) {	?>
					<td><?=	$i * $j	?></td>	
<?php			}	?>			
				</tr>
<?php	}	?>
			</tbody>
		</table>
	</body>
</html>