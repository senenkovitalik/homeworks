<?php
$arr = ['January', 
		'February', 
		'March', 
		'April', 
		'May', 
		'June', 
		'July',
		'August',
		'September',
		'October',
		'November',
		'December'];

$curMonth = date("n") - 1;

foreach ($arr as $key => $value) {
	if ($key == $curMonth) {
		$month = $value;
		echo "<b>$month</b>" . PHP_EOL;
	} else {
		echo $value . PHP_EOL;
	}	
}