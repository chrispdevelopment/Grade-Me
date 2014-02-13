<title>Grade Me - User Info</title>
<?php
	$userid = mysql_real_escape_string($_GET['userid']);
	$courseid = mysql_real_escape_string($_GET['courseid']);

	$users = $db->get_results("SELECT firstname,lastname,status,class,email FROM users WHERE userid=$userid");
	foreach($db->get_col_info("name") as $name){
		$userheads[] = $name;
	}
	$course = $db->get_results("SELECT name, units FROM courses WHERE courseid=$courseid");
	foreach($db->get_col_info("name") as $name){
		$courseheads[] = $name;
	}

	echo "Student Details";
	$session->autoTables($userheads, $users);
	echo "<br />";
	echo "Course Details";
	$session->autoTables($courseheads, $course);
	echo "<br />";

	$units = $db->get_results("SELECT * FROM units WHERE courseid=$courseid");
	if ($units == FALSE){
		echo "No results for this student";
	}
	else{
		foreach ($units as $value){
			$select_clause = "units.name";
			$i=1;
			while($i<=$value->passes){
				$select_clause .= ",unit" . $value->unitID . ".P" . $i;
				$i++;
			}
			$i=1;
			while($i<=$value->merits){
				$select_clause .= ",unit" . $value->unitID . ".M" . $i;
				$i++;
			}
			$i=1;
			while($i<=$value->distinctions){
				$select_clause .= ",unit" . $value->unitID . ".D" . $i;
				$i++;
			}
			$select_clause .= ",unit" . $value->unitID . ".result";
			$from_clause = "units,unit" . $value->unitID;
			$where_clause = "courseid=$courseid 
							AND unit" . $value->unitID . ".userid=$userid 
							AND unit" . $value->unitID . ".unitid=units.unitID";
		
			$results = $db->get_results("SELECT $select_clause FROM $from_clause WHERE $where_clause");
			foreach($db->get_col_info("name") as $name){
				$resultheads[] = $name;
			}
			
			if ($results == FALSE){
				unset($resultheads);
			}
			else{		
			echo "Unit " . $value->unitID;
			$session->autoTables($resultheads, $results);
			echo "<br />";
			unset($resultheads);
			}
		}
	}
?>


