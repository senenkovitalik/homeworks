<!DOCTYPE html>
<html>
<head>
	<title>Comments</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div id="container">
<h1>Тут ви можете залишити свої коментарі</h1>

<div id="comments">
	<?php
		// Завантажуємо історію коментарів з файлу
		$file = @fopen("comment.csv", "r");
		if ($file !== false) {
			while (($data = fgetcsv($file, 1000, ",")) !== false) {
				$arr[] = $data;	
			}
			for ($i=count($arr)-1; $i>=0; $i--) {
				echo "<div class=\"comnt\"><b>{$arr[$i][0]}</b><br>".
					"<b>{$arr[$i][1]}</b><br>".
					"<span>{$arr[$i][2]}</span><br>".
					"Posted at {$arr[$i][3]}</div>";
			}
		}

		// Завантажуємо заборонені слова
		$file = @fopen("swarewords.txt", "r");
		$words = fread($file, filesize("swarewords.txt"));
	?>
</div>

<!-- comment form -->
<div class="commentform">
	<table>
		<tr>
			<td>Ваше і'мя</td>
			<td><input type="text" id="name" name="name"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="email" id="email" name="email"></td>
		</tr>
	</table>
	<textarea id="textarea"></textarea>
	<br>
	<button type="button" onclick="sendComment()">Надіслати</button>
</div>

<!-- antiswarewords form -->
<div class="swarewordsform">
	Масив небажаних слів.<br>
	Додайте/видаліть слова з масиву.<br>
	Слова записуйте через пробіл.<br>
	<textarea id="swarewords"><?= $words ?></textarea><br>
	<button type="button" onclick="addSwarewords()">Надіслати</button>
</div>
</div>

<script type="text/javascript" src="script.js"></script>

</body>
</html>