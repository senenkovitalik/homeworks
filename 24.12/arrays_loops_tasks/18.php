<?php
$arr = ['Monday', 
		'Tuesday', 
		'Wednesday', 
		'Thursday', 
		'Friday', 
		'Saturday', 
		'Sunday'];

foreach ($arr as $key => $value) {
	if ($key == 5 or $key == 6) {
		echo "<b>$value</b>" . PHP_EOL;
	} else {
		echo $value . PHP_EOL;
	}
}