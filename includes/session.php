<?php
include "database.php";

Class Session{
   var $username;     //Username given on sign-up
   var $userid;       //ID value for user signed in
   var $userlevel;    //The level to which the user pertains
   var $time;         //Time user was last active (page loaded)
   var $logged_in;    //True if user is logged in, false otherwise
   var $userinfo = array();  //The array holding all user info

	function Session(){
		$this->time = time();
		$this->startSession();
	}

	function startSession(){
		session_start();
		$this->logged_in = $this->checkLogin();
	}
	
	function Login($user, $pwd){
		global $database;
		
		$this->sanitize($_POST, array('user'=>'int','pwd'=>'str'));
		$pwd = hash('sha1', $pwd);
		$nameRetval = $database->confirmUserName($user);
		if ($nameRetval == 0){
			$passRetval = $database->confirmUserPass($user, $pwd);
			if ($passRetval == 0){
				$database->logUpdate($user);
				$this->userinfo = $database->getUserInfo($user);
      		$this->username  = $_SESSION['username'] = $this->userinfo['username'];
      		$this->userid    = $_SESSION['userid']   = $this->userinfo['userID'];
      		$this->userlevel = $_SESSION['userlevel'] = $this->userinfo['accesslev'];				
				return 0;
			}
			else{
				return 2;
			}
		}
		else{
			return 1;
		}
	}
	
	function checkLogin(){
		global $database;
		/* Username and userid have been set and not guest */
		if(isset($_SESSION['username']) && isset($_SESSION['userid'])){
			/* Confirm that username and userid are valid */
			if($database->confirmUserID($_SESSION['username'], $_SESSION['userid']) != 0){
				/* Variables are incorrect, user not logged in */
				unset($_SESSION['username']);
				unset($_SESSION['userid']);
				return false;
			}

			/* User is logged in, set class variables */
			$this->userinfo  = $database->getUserInfo($_SESSION['username']);
			$this->username  = $this->userinfo['username'];
			$this->userid    = $this->userinfo['userID'];
			$this->userlevel = $this->userinfo['accesslev'];
			return true;
		}
		/* User not logged in */
		else{
			return false;
		}		
	}
	
	function logout(){
      /* Unset PHP session variables */
      unset($_SESSION['username']);
      unset($_SESSION['userid']);

      /* Reflect fact that user has logged out */
      $this->logged_in = false;		
	}
	
	function editAccount(){
		
	}	
	
	function sanitizeOne($var, $type){       
        switch ( $type ){
            case 'int': // integer
                $var = mysql_real_escape_string((int)$var);
            break;

            case 'str': // trim string
                $var = mysql_real_escape_string(trim($var));
            break;

            case 'nohtml': // trim string, no HTML allowed
                $var = mysql_real_escape_string(htmlentities(trim($var), ENT_QUOTES));
            break;

            case 'plain': // trim string, no HTML allowed, plain text
				$var = mysql_real_escape_string(htmlentities(trim($var), ENT_NOQUOTES));
            break;

			case 'upper_word': // trim string, upper case words
				$var = ucwords(strtolower(trim($var)));
            break;

            case 'ucfirst': // trim string, upper case first word
                $var = ucfirst(strtolower(trim($var)));
            break;

            case 'lower': // trim string, lower case words
                $var = strtolower(trim($var));
            break;

            case 'urle': // trim string, url encoded
                $var = urlencode(trim($var));
            break;

            case 'trim_urle': // trim string, url decoded
                $var = urldecode(trim($var));
            break;

            case 'telephone': // True/False for a telephone number
                $size = strlen($var) ;
				for ($x=0;$x<$size;$x++){
					if (!((ctype_digit($var[$x]) || ($var[$x]=='+') || ($var[$x]=='*') || ($var[$x]=='p')))){
						return false;
					}
				}
				return true;
				break;
                      
            case 'pin': // True/False for a PIN
                if ((strlen($var) != 13) || (ctype_digit($var)!=true)){
                    return false;
				}
                return true;
                break;

            case 'id_card': // True/False for an ID CARD
                if ((ctype_alpha(substr($var, 0, 2)) != true) || (ctype_digit(substr($var, 2, 6)) != true) || (strlen($var) != 8)){
                    return false;
                }
                return true;
                break;

            case 'sql': // True/False if the given string is SQL injection safe
                return mysql_real_escape_string($var);
                break;
        }       
        return $var;
	}
	
	//Example: sanitize($_GET, array( 'id'=>'int', 'name' => 'str') );
	function sanitize(&$data, $whatToKeep){
        $data = array_intersect_key($data, $whatToKeep); 

        foreach ($data as $key => $value){
            $data[$key] = $this->sanitizeOne($data[$key], $whatToKeep[$key]);
        }
	}
	
	function autoTables($heads, $data){
		echo "<table border = '1'>";
		echo "<tr>";
		foreach ($heads as $value){
			echo "<th>" . ucfirst($value) . "</th>";
		}
		echo "</tr>";
		foreach($data as $datab){
		echo "<tr>";
			foreach($datab as $key =>$val){
				echo "<td>" . $val . "</td>";
			}
		echo "</tr>";
		}
		echo "</table>";
	}	
}

$session = new Session;
?>