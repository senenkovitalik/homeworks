<?php
$age = 26;
if($age >= 0 or $age <= 17) {
	echo "Vam shche rano pracuvaty" . PHP_EOL;
} elseif($age >= 26 or $age <= 59) {
	echo "Vam shche pracuvaty i pracuvaty" . PHP_EOL;
} elseif ($age > 59) {
	echo "Vam pora na pensiu" . PHP_EOL;
}
