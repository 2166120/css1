<?php
	/*
	Part 1
	Create a function called draw_stars() that takes an array of numbers and echo out  an asterisk, or '*'.

	For example:
	*/
	$x = array(4, 6, 1, 3, 5, 7, 25);
	function draw_stars($array){
		foreach($array as $value){
			if(gettype($value) == "string"){
				for($i = 0; $i < strlen($value); $i++){
					echo $value[0];
				}
			} else{
				for($i = 0; $i < $value; $i++){
					echo "*";
				}
			}
			echo "<br/>";
		}
		echo "<br/>";
	}
	draw_stars($x);
	/*
	draw_stars(x) should print the following on the screen or browser:

	**** 
	****** 
	* 
	*** 
	***** 
	******* 
	*************************
	Part 2
	Modify the function above. Allow an array, that contains integers and strings, to be passed to the draw_stars() function.
	When a string is passed, instead of displaying *, display the first letter of the string according to the example below.

	For example:
	*/
	$x = array(4, "Tom", 1, "Michael", 5, 7, "Jimmy Smith");
	draw_stars($x);
	/*
	draw_stars($x) should print the following on the screen/browser:

	**** 
	ttt 
	* 
	mmmmmmm 
	***** 
	******* 
	jjjjjjjjjjj
	*/
?>