<?php 
$directory = "userImages/";
$fileDirectory = $directory . basename($_FILES["fileToUpload"]["name"]);
$uploadCheck = 1;
$imageFileType = pathinfo($fileDirectory,PATHINFO_EXTENSION);
//checks if image
if(isset($_POST["submit"])){
	$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	if($check !== false){
		echo "File is an image - " . $check["mime"] . ".";
		$uploadCheck = 1; 
	}
	else{
		echo "File is not an image.";
		$uploadOk = 0;
	}
}
?>