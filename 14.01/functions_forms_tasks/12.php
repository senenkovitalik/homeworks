<?php
$text = 'А Васька слушает да ест. А воз и ныне там. А вы друзья как ни садитесь, все в музыканты не годитесь. А король-то — голый. А ларчик просто открывался. А там хоть трава не расти.';

echo reverseSentenceOrder($text);

function reverseSentenceOrder($text) {
	$arr = preg_split("/([.] |[.])/u", $text, -1, PREG_SPLIT_NO_EMPTY);
	$arr = array_reverse($arr);
	$out = "";
	foreach ($arr as $string) {
		$out .= $string . ". ";
	}
	return $out;
}