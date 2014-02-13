<?php
include "session.php";

Class Process {
	function Process(){
		/* User submitted login form */
		if (isset($_POST['subLogin'])){
			$this->procLogin();
		}
		elseif (isset($_POST['subReg'])){
			$this->procReg();
		}
		else{
			header("Location: ../index.php");
		}		
	}
	
	function procLogin(){
		global $session;
		$session->sanitize($_POST, array('user'=>'int','pwd'=>'str'));
		$retVal = $session->Login($_POST['user'], $_POST['pwd']);
		if ($retVal == 0){
			header("Location: ../index.php?page=home");
		}
		elseif($retVal == 1){
			header("Location: ../index.php?page=login&error=1");
		}
		else{
			header("Location: ../index.php?page=login&error=2");
		}
	}
	
	function procReg(){
		global $session, $database;
		//$session->sanitize($_POST, array('user'=>'int','pwd'=>'str','fname'=>'str','lname'=>'str'));
		$pwd = hash('sha1', $_POST['pwd']);
		$database->regUser($_POST['user'], $pwd, $_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['class'], $_POST['status'], $_POST['course']);
	}
}

$process = new Process;
?>