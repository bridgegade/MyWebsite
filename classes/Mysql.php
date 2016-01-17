<?php
require_once 'includes/constants.php';
class Mysql {
	private $conn;
	
	function __construct() {
		$this->conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME) or 
					  die('There was a problem connecting to the database.');
	}
	function get_Password($email){
		$query = "SELECT password FROM members WHERE email = ?";
		if($stmt = $this->conn->prepare($query)){
			$stmt->bind_param('s', $email);
			$stmt->execute();
			$stmt->bind_result($password);
			if($stmt->fetch()){
				
				$stmt->close();
				return $password;
			}
		}
	}
	function verify_Username_and_Pass($un, $pwd) {
				
		$query = "SELECT *
				FROM members
				WHERE username = ? AND password = ?
				LIMIT 1";
				
		if($stmt = $this->conn->prepare($query)) {
			$stmt->bind_param('ss', $un, $pwd);
			$stmt->execute();

			if($stmt->fetch()) {
				$_SESSION['un'] =  $un;
				$stmt->close();
				return true;
			}
		}
		
	}
	function check_Valid_Email($email){
		$query = "SELECT *
				FROM members
				WHERE email = ? 
				LIMIT 1";
				
		if($stmt = $this->conn->prepare($query)) {
			$stmt->bind_param('s', $email);
			$stmt->execute();
			
			if($stmt->fetch()) {
				$stmt->close();
				
				return true;
			}
		}
	}
	function add_User_and_Pass($fn,$ln,$email,$un,$pwd){
		
		$result;
		if($this->check_Valid_Email($email)){
			$result = "Email already taken. ";
		}
			
		$query = "SELECT *
				FROM members
				WHERE username = ? 
				LIMIT 1";
		if($stmt = $this->conn->prepare($query)) {
			$stmt->bind_param('s', $un);
			$stmt->execute();
			
			if($stmt->fetch()) {
				$stmt->close();
				if(!empty($result)){
					$result = "Username and email already taken.";
				}
				else{
					$result = "Username already taken.";
				}
			}
		}
		if(!empty($result)){
			return $result;
		}
		
		$query = "INSERT INTO members (firstName, lastName, email, username, password) VALUES (?,?,?,?, ?)";
		if($stmt = $this->conn->prepare($query)){
			$stmt->bind_param('sssss',$fn,$ln,$email, $un, $pwd);
			$stmt->execute();
			$stmt->close();
			return "Sign up for ".$un." successful. ";
			
				
				
			
		}
	
		
	}
	
}
?>