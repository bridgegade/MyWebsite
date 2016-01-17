<?php
require 'Mysql.php';
class Membership {
	
	function validate_user($un, $pwd) {
		$mysql = New Mysql();
		if(empty($un)||empty($pwd)){
			return "Please fill in all fields.";
		}
		$ensure_credentials = $mysql->verify_Username_and_Pass($un, $pwd);
		
		if($ensure_credentials) {
			
			header("location: index.php");
			
		} 
		
		else return "Please enter a correct username and password. ";
			
	} 	
	function add_User($fn,$ln,$email,$un,$pwd){
		$mysql = New Mysql();
		if(empty($fn)||empty($ln)||empty($email)||empty($un)||empty($pwd)){
			return "Please fill in all fields.";
		}
		

		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			return "Invalid email.";
		}
		$result = $mysql->add_User_and_Pass($fn,$ln,$email,$un,$pwd);
		
			
				return $result;
			 
	}
	function send_password_to_email($email){
		$mysql = New Mysql();
		if($mysql->check_Valid_Email($email)){
			$pwd = (string)$mysql->get_Password($email);
			if(mail($email, "TheGallery: password recovery.", "Your current password is: ".$mysql->get_Password($email))){
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