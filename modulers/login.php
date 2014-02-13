<?php
	$logout = isset($_GET['status']);
	$error = isset($_GET['error']);

if ($error == 1){
	$errorResult = "The Username/Password wasn't recognized";
}
else{
	$errorResult = "";
}

if ($logout == "logout"){
	$session->logout();
}
?>

<div id="login">
	<form name="input" action="includes/process.php" method="POST">
		<?php echo $errorResult; ?><br />
		Username: <input type="text" name="user" /><br />
		Password: <input type="password" name="pwd" /><br />
		<input type="hidden" name="subLogin" value="1" />
		<input type="submit" value="Submit"/>
	</form> 
</div>