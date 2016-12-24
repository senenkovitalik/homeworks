<?php
$s = 340;	//кілометри
$t = 3;
$speed_one = $s/$t;	//km/h
$speed_two = $speed_one*1000/3600;	//m/s

echo "Car speed: " . round($speed_one, 1, PHP_ROUND_HALF_UP) . " km/h" . PHP_EOL;
echo "Car speed: " . round($speed_two, 1, PHP_ROUND_HALF_UP) . " m/s" . PHP_EOL;