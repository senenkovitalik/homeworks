<?php
getFilesByName("C://Users", "user");

function getFilesByName($dir, $name) {
	if (is_dir($dir)) {
		$listFiles = scandir($dir);
		foreach ($listFiles as $value) {
			$condition = preg_match("/\w?".$name."\w?/i", $value);
			if ($condition) {
			 	echo $value . PHP_EOL;
			} 
		}
	} else {
		echo "$dir is not a directory!!!" . PHP_EOL;
	}
}