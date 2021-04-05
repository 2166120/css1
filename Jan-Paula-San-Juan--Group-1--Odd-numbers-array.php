<?php
	$array_variable = array();
	for($i = 0; $i < 20001; $i += 2) {
		if($i == 0) {
			i++;
		}
		$array_variable[] = $i;
	}
	var_dump($array_variable);
?>