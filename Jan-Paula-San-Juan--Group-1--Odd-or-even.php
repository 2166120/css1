<?php
	$odd_or_even = "odd";
	for($i = 1; $i < 2001; $i += 2) {
		if($i % 2 == 0) {
			$odd_or_even = "even";
		}
		else {
			$odd_or_even = "odd";
		}
		echo "Number is " . $i . ". This is an " . $odd_or_even . " number.";
	}
?>