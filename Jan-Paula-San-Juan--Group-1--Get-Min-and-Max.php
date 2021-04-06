<?php
	/*
	Create a function get_max_and_min() that takes an array of numbers and, then, returns both the minimum and the maximum number from the given array as an associative array.
	Do not use the PHP function max() or min() to get this to work. See if you can do this using arrays and for loops!
	*/
	function get_max_and_min($array){
		$max = $array[0];
		$min = $array[0];
		foreach($array as $value){
			if($max < $value){
				$max = $value;
			}
			if($min > $value){
				$min = $value;
			}
		}
		return array('max' => $max, 'min' => $min);
	}
	$sample = array( 135, 2.4, 2.67, 1.23, 332, 2, 1.02); 
	$output = get_max_and_min($sample); 
	var_dump($output); 
	//$output should be equal to array('max' => 332, 'min' => 1.02);
?>