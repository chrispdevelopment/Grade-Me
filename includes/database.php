<?php
include("dbFunctions.php");

Class Database{
	function confirmUserName($username){
		global $db;
		
		if($username == null){
			$username = "Empty";
			if ($db->get_var("SELECT username FROM login WHERE username = '$username'") == $username){
				return 0;
			}
			else{
				return 2;
			}			
		}
	}

	function confirmUserPass($username, $password){
		global $db;
		
		$result = $db->get_var("SELECT password FROM login WHERE username = '$username'");

		/* Validate that password is correct */
		if($password == $result){
			return 0; //Password confirmed
		}
		else{
			return 2; //Indicates password failure
		}
	}
	
	function getUserInfo($username){
		global $db;
		
		$result = $db->get_row("SELECT * FROM login WHERE username = '$username'",0, ARRAY_A);
		
		return $result;
	}
	
	function confirmUserID($username, $userid){
		global $db;
		$userRetVal = $this->confirmUserName($username);
		if ($userRetVal == 2){
			return 1; //Username failure
		}
		
		$idRetVal = $db->get_var("SELECT userID FROM login WHERE userID = '$userid'");
		if ($userid == $idRetVal){
			return 0; //Username & Password Correct
		}
		else{
			return 2; //ID failure
		}		
	}
	
	function regUser($user, $pwd, $fname, $lname, $email, $class, $status, $course){
		global $db;
		$db->query("INSERT INTO users (firstname, lastname, email, class, status, courseID) 
					VALUES ('$fname', '$lname', '$email', '$class', '$status', '$course')");
		
		$userID = $db->get_var("SELECT userID FROM users WHERE email = '$email'");
		
		$db->query("INSERT INTO login (username, password, userID) VALUES ('$user', '$pwd', '$userID')");
	}
	
	function logUpdate($username){
		global $db;
		$date = date("d-m-y h:i:s");
		$db->query("UPDATE login SET timeLog = '$date' WHERE username = '$username'");
	}
	
	function dbRetrieve($select, $from){
		global $db;
		return $db->get_results("SELECT $select FROM $from");
	}
	
	function dbRetrieveWhere($select, $from, $where){
		global $db;
		return $db->get_results("SELECT $select FROM $from WHERE $where");	
	}
}

$database = new Database;
?>