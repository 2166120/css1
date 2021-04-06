<?php
	/*
	Create a function called 'print_lists' that takes any array and prints each value in the array in an <li>, which is part of a <ul>.
	For example, running print_lists($A) where $A = array(2,3,'hello'); should output a html response that looks like...
	<ul>
	  <li>2</li>
	  <li>3</li>
	  <li>hello</li>
	</ul>
	*/
	function print_lists($array){
		echo "<ul>";
		foreach($array as $value){
			echo "<li>{$value}</li>";
		}
		echo "</ul>";
	}
	$A = array(2,3,'hello');
	print_lists($A);
?>