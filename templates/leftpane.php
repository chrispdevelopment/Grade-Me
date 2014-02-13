<div id="leftPaneContent">
	<div id="leftPaneContentText">
		<?php
			if ($session->logged_in == True){
				if (isset($_GET["area"])){
					$area = $_GET["area"];
					switch ($area){
						case "student":
							$userid = $session->userid;
							$courseid = $db->get_var("SELECT courseID FROM users WHERE userID = '$userid'");
							echo "<p> Student Menu </p>";
							echo "<a href='index.php?page=studentinfo&area=student&userid=" . $userid . "&courseid=" . $courseid . "'>My Details</a><br />";
							echo "My Courses <br />";
							echo "My UCAS <br />";
							break;
						
						case "staff":
							echo "<p> Staff Menu </p>";
							echo "<a href='index.php?page=overview&area=staff'>Overview</a><br />";
							echo "Statistics<br />";
							$year = $db->get_results("SELECT * FROM years");
							foreach ($year as $years){
								echo "- <a href='index.php?page=statistics&area=staff&yearid=" . $years->yearID . "'>" . $years->year . "</a><br />";
							}
							echo "Progression <br />";
							echo "UCAS <br />";
							echo "<a href='index.php?page=units&area=staff'>Units </a><br />";
							break;
						
						case "admin":
							echo "<p> Admin Menu </p>";
							echo "Site Configuration <br />";
							echo "- Manage Years <br />";
							echo "- Manage Database <br />";
							echo "Course Managment <br />";
							echo "- Manage Courses <br />";
							echo "- Manage Units <br />";
							echo "User Managment <br />";
							echo "- Manage Users <br />";
							echo "- Manage Groups <br />";
							echo "- Manage Tutors <br />";
							break;
					}
				}
				else{
					echo "";
				}
			}
		?>
	</div>
	<div id="leftPaneContentBottom"></div>
</div>