<title>Statistics Page</title>
<?php
	include "includes/stats.php";
	if (isset($_GET['yearid'])){
		$session->sanitize($_GET, array( 'yearid'=>'str'));
		$yearid = $_GET['yearid'];
		
		$year = $db->get_results("SELECT * FROM years WHERE yearID = '$yearid'");
		
		foreach ($year as $years){
			$firstyear = $years->firstyear;
			$secondyear = $years->secondyear;
		}
			
		$course1 = $db->get_var("SELECT courseID FROM courses WHERE yearID = '$yearid' AND year = '$firstyear'");
		$course2 = $db->get_var("SELECT courseID FROM courses WHERE yearID = '$yearid' AND year = '$secondyear'");
		
		$select_clause1 = "users.status, course" . $course1 . "results.result";
		$select_clause2 = "users.status, course" . $course2 . "results.result";
		$from_clause1 = "users,course" . $course1 . "results";
		$from_clause2 = "users,course" . $course2 . "results";
		$where_clause1 = "users.courseid = '$course1' 
						 AND course" . $course1 . "results.courseid = '$course1'
						 AND course" . $course1 . "results.userID = users.userID ";
		$where_clause2 = "users.courseid = '$course2' 
						 AND course" . $course2 . "results.courseid = '$course2'
						 AND course" . $course2 . "results.userID = users.userID";
		
		$stat1 = $db->get_results("SELECT $select_clause1 FROM $from_clause1 WHERE $where_clause1");	
		$stat2 = $db->get_results("SELECT $select_clause2 FROM $from_clause2 WHERE $where_clause2");
	}
?>

<div id="overflow">
	<div id="subsidiaryStats">
		<p>Subsidiary Diploma</p>
		<div id="statBox" >
			Retention Breakdown
			<?php  $stats->retention($stat1); ?>
		</div>
		<div id="statBox" >
			Achievement Breakdown
			<?php $stats->achievement($stat1); ?>
		</div>
		<div id="statBox" >
			Success Breakdown
			<?php $stats->success(); ?>
		</div>
	</div>

	<div id="extendedStats">
		<p>Extended Diploma</p>
		<div id="statBox" >
			Retention Breakdown
			<?php $stats->retention($stat2); ?>
		</div >
		<div id="statBox" >
			Achievement Breakdown
			<?php $stats->achievement($stat2); ?>
		</div>
		<div id="statBox" >
			Success Breakdown
			<?php $stats->success(); ?>
		</div>
	</div>
</div>
