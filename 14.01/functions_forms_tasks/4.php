<?php
getFiles(getcwd());

function getFiles($dir) {
	if (is_dir($dir)) {
		$listFiles = scandir($dir); 
		foreach ($listFiles as $value) {
			echo $value . PHP_EOL;
		}
	} else {
		echo "$dir is not a directory!!!" . PHP_EOL;
	}
}