<?php
$i = 1;
while ($i <= 5) {
	$j = 1;
	while ($j <= $i*2) {
		echo "x";
		$j++;
	}
	echo PHP_EOL;
	$i++;
}