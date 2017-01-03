<?php
srand(floor(time()));
$min = getrandmax();
$max = 0;

for ($i=0; $i < 20; $i++) { 
	$element = rand(0, 100);
	$arr[] = $element;

	if ($element >= $max) {
		$max = $element;
		$maxIndex = $i;
	} elseif ($element < $min) {
		$min = $element;
		$minIndex = $i;
	}
}

echo "Bulo min = $min:$minIndex, max = $max:$maxIndex" . PHP_EOL;
$arr[$minIndex] = $max;
$arr[$maxIndex] = $min;
echo "Stalo min = $min:$maxIndex, max = $max:$minIndex" . PHP_EOL;