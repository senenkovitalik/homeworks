<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Task 27</title>
</head>
<body>

<?php
$row = 5;
$cols = 7;
$colors = ['red', 'yellow', 'blue', 'grey', 'maroon', 'brown', 'green'];
srand(floor(time()));
$output = "<table>";

for ($i = 0; $i < $row; $i++) {			// rows
	$output .= "<tr>";
	for ($j = 0; $j < $cols; $j++) {	// columns
		$color = $colors[rand(0, 6)];
		$number = rand();
		$output .= "<td style=\"background-color: $color\">$number</td>";
	}
	$output .= "</tr>";
}

$output .= "</table>";
echo $output;
?>

</body>
</html>