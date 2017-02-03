<?php
$data = json_decode($_REQUEST["q"]);
$type = $data->type;

switch ($type) {
	case 'comment':
		saveComment($data);
		break;
	
	case 'swareword':
		saveSwarewords($data);
		break;
}

function saveComment($data) {
	$name 		= $data->name;
	$email 		= $data->email;
	$comment 	= $data->comment;
	$date 		= $data->date;

	$swarewordsArr = loadSwarewords();

	$result = false;
	// проходимося по всім забороненим словам
	foreach ($swarewordsArr as $value) {
		$result = strpos($comment, $value);
		if ($result == true) { break; }
	}

	if (!$result) {
		// All is OK
		$file = fopen("comment.csv", "a");
		$list = [$name, $email, $comment, $date];
		echo fputcsv($file, $list);
	} else {
		// there are some bad words
		echo false;
	}
}

function saveSwarewords($data) {
	$words = $data->words;
	$words = preg_replace("/\s{2,}/", " ", $words);
	
	$file = fopen("swarewords.txt", "w");
	echo fprintf($file, $words);
}

function loadSwarewords() {
	$file = fopen("swarewords.txt", "r");
	$words = fread($file, filesize("swarewords.txt"));
	$arr = explode(" ", $words);
	return $arr;
}