<?php
$a = 34;
$b = 0;
$operator = 'hello';
$result = 0;

switch($operator) {
	case '+':
		$result = $a + $b;
		break;
	case '-':
		$result = $a - $b;
		break;
	case '*':
		$result = $a * $b;
		break;
	case '/':
		if ($b == 0) {
			$error = "Warning!!! Division by zero.";
			break;
		}
		$result = $a / $b;
		break;
	default:
		$error = "Warning!!! Incorrect operation.";
}

if (!isset($error)) {
	echo $a ." ". $operator ." ". $b ." = ". $result . PHP_EOL;
} else {
	echo $error . PHP_EOL;
}