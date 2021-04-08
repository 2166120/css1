$(document).ready(function(){
<?php
	$a = floor(rand(0, 99));
	$b = floor(rand(0, 9));
?>
	alert("<?= $a." x ".$b." = ".($a*$b) ?>");
});