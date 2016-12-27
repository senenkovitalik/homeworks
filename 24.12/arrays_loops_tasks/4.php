<?php
$array = ['green' => 'zeleniy', 'red' => 'chervoniy', 'blue' => 'golubiy'];

foreach ($array as $key => $value) {
	echo $key . PHP_EOL;
}

foreach ($array as $value) {
	echo $value . PHP_EOL;
}