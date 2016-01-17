<?php
require 'Mysql.php';
class Membership {
	
	function validate_user($un, $pwd) {
		$Mysql = New Mysql();
		if(empty($un)||empty($pwd)){
			return "Please fill in all fields.";
		}
		$ensure_credentials = $Mysql->verify_Username_and_Pass($un, $pwd);
		
		if($ensure_credentials) {
			
			header("location: index.php");
			
		} 
		
		else return "Please enter a correct username and password. ";
			
	} 	
	function add_User($fn,$ln,$email,$un,$pwd){
		$Mysql = New Mysql();
		if(empty($fn)||empty($ln)||empty($email)||empty($un)||empty($pwd)){
			return "Please fill in all fields.";
		}
		

		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			return "Invalid email.";
		}
		$result = $Mysql->add_User_and_Pass($fn,$ln,$email,$un,$pwd);
		
			
				return $result;
			 
	}
	function send_password_to_email($email){
		$Mysql = New Mysql();
		if($Mysql->check_Valid_Email($email)){
			$pwd = (string)$Mysql->get_Password($email);
			if(mail($email, "TheGallery: password recovery.", "Your current password is: ".$Mysql->get_Password($email))){
				return "You have been emailed your current password.";
			}
			else{
				return "Unable to send password recovery email.";
			}
		}
		else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			return "Invalid email.";
		}
		else{
			return "This email is not registered.";
		}
	}
	function attach_Image($fileDirectory){
	
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
		$uploadCheck = 0;
		}
		//check if image already exisits
		if(file_exists($fileDirectory)){
		echo "Sorry, file already exists.";
		$uploadCheck = 0;
		}
	}
	//check
	if($uploadCheck ==0){
		echo "There was a problem uploading your file."
	}
	else {
    	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $fileDirectory)) {
    	$Mysql->attach_Image_To_Account($fileDirectory);
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    	} 
    	else {
        echo "Sorry, there was an error uploading your file.";
    	}
	}
		
	}
	function log_User_Out() {
		if(isset($_SESSION['un'])) {
			unset($_SESSION['un']);
			
			if(isset($_COOKIE[session_name()])) {
				setcookie(session_name(), '', time() - 1000);
				session_destroy();
			}
		}
	}
	function confirm_Member() {
		session_start();
		if(!isset($_SESSION['un'])) header("location: Login.php");
	}
	
}
?>