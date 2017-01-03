<?php
$myDigit = 5;
$myNumber = 442158755745;

$strDigit = (string)$myDigit;
$strNumber = (string)$myNumber;

$count = 0;

for ($i = 0; $i < strlen($strNumber); $i++) {
	if ($strNumber[$i] == $myDigit) {
		$count++;
	}
}

echo $count . PHP_EOL;