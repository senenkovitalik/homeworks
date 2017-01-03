<?php
$arr = ['Sunday',
		'Monday', 
		'Tuesday', 
		'Wednesday', 
		'Thursday', 
		'Friday', 
		'Saturday'];

$curDay = date("w");

foreach ($arr as $key => $value) {
	if ($key == $curDay) {
		$day = $value;
		echo "<i>$day</i>" . PHP_EOL;
	} else {
		echo $value . PHP_EOL;
	}
}