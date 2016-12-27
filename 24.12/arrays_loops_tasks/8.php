<?php
$arr = [1, 2, 3, 4, 5, 6, 7, 8, 9];
$string1 = '';

foreach ($arr as $value) {
	$string1 .= $value;
}

$string2 = '';
$i = 0;
while ($i < count($arr)) {
	$string2 .= $arr[$i];
	$i++;
}

$string3 = '';
for ($i=0; $i < count($arr); $i++) { 
	$string3 .= $arr[$i];
}