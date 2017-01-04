<?php
$arr = [4, 2, 5, 19, 13, 0, 10];

$isTwo = false;
$isThree = false;
$isFour = false;

foreach ($arr as $value) {
	if ($value == 2) {
		$isTwo = true;
	}
	if ($value == 3) {
		$isThree = true;
	}
	if ($value == 4) {
		$isFour = true;
	}
}

if ($isTwo) {
	echo '$e = 2 Yest' . PHP_EOL;
} else {
	echo '$e = 2 Nema' . PHP_EOL;
}

if ($isThree) {
	echo '$e = 3 Yest' . PHP_EOL;
} else {
	echo '$e = 3 Nema' . PHP_EOL;
}

if ($isFour) {
	echo '$e = 4 Yest' . PHP_EOL;
} else {
	echo '$e = 4 Nema' . PHP_EOL;
}