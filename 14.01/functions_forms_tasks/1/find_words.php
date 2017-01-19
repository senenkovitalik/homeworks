<?php
$f_area = $_REQUEST['first_area'];
$s_area = $_REQUEST['second_area'];

$words = getCommonWords($f_area, $s_area);

foreach ($words as $value) {
	echo "$value ";
}

function getCommonWords($a, $b) {
	// заміняємо символ нового рядка на пробіл
	$a = str_replace("\n", " ", $a);
	// розбиваємо текст на слова
	$pieces_a = explode(" ", $a);

	$b = str_replace("\n", " ", $b);
	$pieces_b = explode(" ", $b);

	// шукаємо спільні елементи
	$result = array_intersect($pieces_a, $pieces_b);
	// якщо масив містить пустий рядок, то видаляємо його
	$bug = array_search("", $result, true);
	unset($result[$bug]);

	return $result;
}