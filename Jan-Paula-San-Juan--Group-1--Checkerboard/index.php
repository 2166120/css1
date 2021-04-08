<!DOCTYPE html>
	<head>
		<meta charset="UTF-8"/>
		<title>Jan Paula S. San Juan-Group 1-Checkerboard</title>
		<link rel="stylesheet" type="text/css" href="normalize.css"/>
		<link rel="stylesheet" type="text/css" href="Jan-Paula-San-Juan--Group-1--Checkerboard.css"/>
	</head>
	<body>
<?php	$color = 1;
		$size = 8;
		for($i=0; $i<2; $i++) {	?>
		<div class="board<?= $i + 1 ?>">
<?php		for($row=0; $row<$size; $row++) {	?>
			<div class="row">
<?php			for($column=0; $column<$size; $column++) {	?>
				<div class="color<?= $color ?>"></div>
<?php				if($color == 1) {
						$color = 2;
					} else {
						$color = 1;
					}
				}
				if($color == 1) {
					$color = 2;
				} else {
					$color = 1;
				}	?>
			</div>
<?php		}	?>
		</div>
<?php	}	?>
	</body>
</html>