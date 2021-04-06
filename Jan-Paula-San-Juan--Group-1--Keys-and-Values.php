<?php
	/*
	Let's create a new array called $users that have the following keys and values
	Create a function where you can pass in $users and print an output that looks like below
	There are 2 keys in this array: 
     first_name
     last_name
	The value in the key 'first_name' is 'Michael'.
	The value in the key 'last_name' is 'Choi'.
	*/
	$users['first_name'] = "Michael";
	$users['last_name'] = "Choi";
	function print_array($array){
		echo "There are " . count($array) . " keys in this array:<br/><ul>";
		foreach($array as $key => $value){
			echo "<li>{$key}</li>";
		}
		echo "</ul>";
		foreach($array as $key => $value){
			echo "The value in the key '{$key}' is '{$value}'.<br/>";
		}
	}
	print_array($users);
?>