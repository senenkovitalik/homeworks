<?php
$length = $_REQUEST["length"] + 1;

$file = fopen("text.txt", "rb");
$text = fread($file, filesize("text.txt"));
fclose($file);

$text = mb_convert_encoding($text, "UTF-8", "Windows-1251");
$text = preg_replace("/\b\w{".$length.",}/u", "", $text);

$file = fopen("text.txt", "wb");
fwrite($file, $text);
fclose($file);