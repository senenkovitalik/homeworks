<!DOCTYPE html>
<html>
<head>
	<title>6</title>
	<meta charset="utf-8">
</head>
<body>

<?php
$target_dir = "gallery/";
$files = $_FILES["photos"];
$files = reArrayFiles($files);
loadImages($files, $target_dir);
printTable($target_dir);

function reArrayFiles(&$files) {

    $file_ary = array();
    $file_count = count($files['name']);
    $file_keys = array_keys($files);

    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $files[$key][$i];
        }
    }

    return $file_ary;
}

function loadImages($files, $directory) {
	$target_dir = $directory;

	foreach ($files as $file) {
		$target_file = $target_dir . basename($file["name"]);
		$uploadOk = 1;

		if (isset($_POST["submit"])) {

			// if something wrong - skip this file
			if ($file["error"] == 1) { continue; }

			// Check if image file is a actual image or fake image
			$check = getimagesize($file["tmp_name"]);
			if ($check !== false) {
		        // echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File " . $file["name"] . " is not an image.<br>";
		        $uploadOk = 0;
		    }

		    // Check if file already exists
			if (file_exists($target_file)) {
				echo "Sorry, file " . $file["name"] . " already exists.<br>";
				$uploadOk = 0;
			}

			// Check file size
			if ($file["size"] > 1.5*1000000) {
			    echo "Sorry, your file " . $file["name"] . " is too large.<br>";
			    $uploadOk = 0;
			}

			// Allow certain file formats
			$imageFileType = pathinfo("$target_file", PATHINFO_EXTENSION);
			if ($imageFileType != "jpg" && 
				$imageFileType != "png" && 
				$imageFileType != "jpeg" && 
				$imageFileType != "gif") 
			{
				echo "Sorry, only JPG, JPEG, PNG, GIF files are allowed.<br>";
				$uploadOk = 0;
			}
		}

		if ($uploadOk != 0) {
			if (!move_uploaded_file($file["tmp_name"], $target_file)) {
				echo "Some problems with " . $file["name"] . "<br>";
			} 
		}
	}
}

function printTable($dir) {

	$output = "<table>";

	$photos = scandir($dir);
	$photos = array_diff($photos, array(".", ".."));

	$i = 0;

	foreach ($photos as $value) {
		if ($i == 0) { $output .= "<tr>"; }

		$path = $dir . $value;
		$output .= "<td><img src=\"$path\" width=\"400\" height=\"300\"></td>";

		if ($i == 2) {
			$output .= "</tr>";
			$i = 0;
		} else {
			$i++;
		}
	}

	$output .= "</table>";
	echo $output;
}
?>

<a href="" id="backLink">Back</a>
<script type="text/javascript">
	document.getElementById("backLink").href = document.referrer;
</script>

</body>
</html>