<?php
	if (isset($_POST['submit'])) {
		
		$file =$_FILES['image'];

		$fileName = $file['name'];
		echo "<pre>";
		print_r($file);


		foreach ($fileName as $key => $value) {
			
			echo ("<br> ".$value."</br>");
		}
	}


?>




<!DOCTYPE html>
<html>
<head>
	<title>multiple image</title>
</head>
<body>
<form method="POST" enctype="multipart/form-data">
	<input type="file" multiple name="image[]">

	<button type="submit" name="submit">submit</button>
</form>
</body>
</html>