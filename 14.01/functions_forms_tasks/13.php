<?php
$string = 'яблоко черешня вишня вишня черешня груша яблоко черешня вишня яблоко вишня вишня черешня груша яблоко черешня черешня вишня яблоко вишня вишня черешня вишня черешня груша яблоко черешня черешня вишня яблоко вишня вишня черешня черешня груша яблоко черешня вишня';

$arr = fruitCount($string);
foreach ($arr as $key => $value) {
	echo "$key - $value<br>";
}

function fruitCount($string) {
	$arr = explode(" ", $string);
	$arr = array_count_values($arr);
	arsort($arr);
	return $arr;
}