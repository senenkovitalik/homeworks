<?php
$text = $_POST["textarea"];

echo uniqueWordsCount($text);

function uniqueWordsCount($text) {
	$arr = explode(" ", $text);
	$uniqueWords = 0;
	foreach ($arr as $word) {
		preg_match_all("/".$word."/u", $text, $matches);
		if (count($matches[0]) === 1) {
			$uniqueWords++;
		}
	}

	return $uniqueWords;
}