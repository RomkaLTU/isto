<!DOCTYPE html>
<html>
<body>

<form action="" method="post" enctype="multipart/form-data">
	<input type="file" name="fileToUpload" id="fileToUpload">
	<input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>

<?php
if ($_POST) {
	$target_dir = "app/uploads/wpallimport/files/";
	$target_file = $target_dir . 'Isto.xlsx';
	$fileTYpe = strtolower(pathinfo($target_dir . basename($_FILES["fileToUpload"]["name"]),PATHINFO_EXTENSION));

	if($fileTYpe !== "xlsx") {
		echo "Netinkamas failo formatas!";
	}

	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		echo "Failas patalpintas.";
	} else {
		echo "Sorry, there was an error uploading your file.";
	}
}
?>
