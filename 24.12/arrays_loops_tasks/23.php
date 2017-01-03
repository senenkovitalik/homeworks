<?php
$str = $argv[1];
$sum = 0;
for ($i = 0; $i < strlen($str); $i++) {
	$sum += (int)$str[$i];
}
echo $sum . PHP_EOL;