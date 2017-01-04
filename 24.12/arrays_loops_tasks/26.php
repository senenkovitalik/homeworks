<?php
$evenProduct = 1;
srand(floor(time()));

for ($i = 0; $i < 100; $i++) {
	$element = rand(1, 100);
	$arr[] = $element;

	if ($i % 2 == 0) {
		$evenProduct *= $element;
	} else {
		echo $element . PHP_EOL;
	}
}