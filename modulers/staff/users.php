<title>Grade Me - Users</title>
<?php

$users = $database->dbRetrieve("*", "users");

echo "<table border = '1'>";
echo "<tr>";
echo "<td>First Name</td>";
echo "<td>Last Name</td>";
echo "<td>Status</td>";
echo "<td>Class</td>";
echo "<td>Email</td>";
echo "</tr>";
 
foreach($users as $user){

	echo "<tr>";
	echo "<td><a href='index.php?page=info&userid=" . $user->userID . "&courseid=" . $user->courseID . "'>" . $user->firstname . "</a></td>";
	echo "<td>" . $user->lastname . "</td>";
	echo "<td>" . $user->status . "</td>";
	echo "<td>" . $user->class . "</td>";
	echo "<td>" . $user->email . "</td>";
	echo "</tr>";

}

echo "</table>";

?>
