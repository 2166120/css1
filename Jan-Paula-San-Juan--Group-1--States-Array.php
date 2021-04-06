<?php
	/*
	You have an array, called $states, which has the following information:

	$states = array('CA', 'WA', 'VA', 'UT', 'AZ');
	Display a drop-down menu in HTML (using select tag and option tag) that displays the different states. Create this drop-down menu using for loops.
	Create another identical drop-down menu but, this time, use foreach statement.

	Once you're done with the above exercise, insert three new states in the array $states: 'NJ', 'NY', 'DE'. Display a new drop-down menu with the eight unique states.

	Your output should have three drop-down menus.
	*/
	$states = array('CA', 'WA', 'VA', 'UT', 'AZ');
	echo "<select id='states' name='states'>";
	for($i = 0; $i < count($states); $i++){
        echo "<option value='{$states[$i]}'>{$states[$i]}</option>";
	}
    echo "</select>";
	echo "<select id='states' name='states'>";
	foreach($states as $state){
		echo "<option value='{$state}'>{$state}</option>";
	}
	echo "</select>";
	$states[] = 'NJ';
	$states[] = 'NY';
	$states[] = 'DE';
	echo "<select id='states' name='states'>";
	foreach($states as $state){
		echo "<option value='{$state}'>{$state}</option>";
	}
	echo "</select>";
?>