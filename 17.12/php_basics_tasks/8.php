<?php
$age = "HEllo";
if($age >= 0 and $age <= 17) {
	echo "Vam shche rano pracuvaty" . PHP_EOL;
} elseif($age >= 26 and $age <= 59) {
	echo "Vam shche pracuvaty i pracuvaty" . PHP_EOL;
} elseif ($age > 59) {
	echo "Vam pora na pensiu" . PHP_EOL;
} elseif($age < 0 or !is_int($age)) {
	echo "Nevidomiy format" . PHP_EOL;
}
