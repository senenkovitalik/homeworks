<?php
$text = "а васька слушает да ест. а воз и ныне там. а вы друзья как ни садитесь, все в музыканты не годитесь. а король-то — голый. а ларчик просто открывался.а там хоть трава не расти.";

echo capitalizeFirstWord($text);

function capitalizeFirstWord($text) {
	$text = preg_replace_callback("/([.].*?\w|^\s*\w)/u", 
		function($matches) {
			return mb_strtoupper($matches[0]);
		},
		$text);

	return $text;
}