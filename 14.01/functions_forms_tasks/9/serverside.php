<?php
$text = $_POST["textarea"];
echo reverseString($text);

function reverseString($str) {
    preg_match_all('/./us', $str, $ar);
    return join('',array_reverse($ar[0]));
}