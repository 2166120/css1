<?php
	header('Content-type: text/css');
	function random_color()
    {
        $letters = array('a','b','c','d','e','f','0','1','2','3','4','5','6','7','8','9');
        $color = '#';  //this is what we'll return!
        for($i = 0; $i < 6; $i++) 
        {
            $x = floor(rand(0, count($letters) - 1));
			$color = $color . $letters[$x]; 
        }
		return $color;
    }
?>
h1 { color: <?= random_color() ?>; }
p  { color: <?= random_color() ?>; }
