<?php
$text = $_REQUEST['words'];

$arr = getTopThree($text);

echo "Топ 3 слов:<br>";
echo "1) {$arr[0][0]} {$arr[0][1]}<br>";
echo "2) {$arr[1][0]} {$arr[1][1]}<br>";
echo "3) {$arr[2][0]} {$arr[2][1]}";

function getTopThree($a) {
	$area = preg_replace("/([,]|[.])/", "", $a);
	$area = preg_replace("/\n/", " ", $a);
	$area = preg_replace("/\s{2,}/", " ", $a);
	$words = preg_split("/\s/", $a, -1, PREG_SPLIT_NO_EMPTY);

	$first = 1;
	$second = 1;
	$third = 1;
	foreach ($words as $index => $val) {
		$length = strlen($val);
		if ($length > $first) {
			$first = $length;
			$f_index = $index;
		} elseif ($length > $second) {
			$second = $length;
			$s_index = $index;
		} elseif ($length > $third) {
			$third = $length;
			$t_index = $index;
		}
	}

	$arr = array(
		[$words[$f_index], $first],
		[$words[$s_index], $second],
		[$words[$t_index], $third]
	);

	return $arr;
}