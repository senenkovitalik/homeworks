<?php
$day = 10;

switch ($day) {
	case 1:
	case 2:
	case 3:
	case 4:
	case 5:
		echo "Tce robochiy den" . PHP_EOL;
		break;
	case 6:
	case 7:
		echo "Tce vihidniy" . PHP_EOL;
		break;
	default:
		echo "Nevidomiy den" . PHP_EOL;
		break;
}