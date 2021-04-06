<?php
	//Part 1: Create a function called 'multiply()' that reads each value in an array (e.g. $A = array(2, 4, 10, 16)) and returns a new array where each value has been multiplied by 5.
	$A = array(2,4,10,16);
	/*Put part 2 within a comment,then erase this line to run part 1
	function multiply($arr)
	{
	  //...
	  for($i = 0; $i < count($arr); $i++)
	  {
		  $arr[$i] *= 5;
	  }
	  return $arr;
	}
	$B = multiply($A);
	var_dump($B); 
	/* expected output:
	array (size=4)
	  0 => int 10
	  1 => int 20
	  2 => int 50
	  3 => int 80
	*/
	/*
		Part 2: Modify this function so that you can pass an additional argument to this function. The function should multiply each value in the array by this additional argument
		(call this additional argument 'factor' inside the function). For example say $A = array(2,4,10,16). When you say...
	*/
	function multiply($arr, $factor)
	{
	  //...
	  for($i = 0; $i < count($arr); $i++)
	  {
		  $arr[$i] *= $factor;
	  }
	  return $arr;
	}
	$B = multiply($A, 2);  
	var_dump($B);
	//this should dump B which contains [4, 8, 20, 32 ].
?>
