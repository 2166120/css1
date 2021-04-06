<?php
	echo "<h1 style = 'font-weight: bold; font-style: italic; text-decoration: underline;'>Starting the program</h1>";
	$heads = 0;
	$tails = 0;
	$head_or_tail = rand(0, 1);
	for($attempt = 1; $attempt < 5001; $attempt++){
		if($head_or_tail == 0){
			$heads++;
			echo "<h2 style = 'font-style: italic;'>Attempt #{$attempt}: Throwing a coin... It's a head! ... Got {$heads} head(s) so for and {$tails} tail(s) so far</h2>";
		} else{
			$tails++;
			echo "<h2 style = 'font-style: italic;'>Attempt #{$attempt}: Throwing a coin... It's a tail! ... Got {$heads} head(s) so for and {$tails} tail(s) so far</h2>";
		}
		$head_or_tail = rand(0, 1);
	}
	echo "<h1 style='font-weight: bold; font-style: italic; text-decoration: underline;'>Ending the program - thank you!</h1>";
?>
