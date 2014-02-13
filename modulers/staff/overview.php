<title>Overview Page</title>

<div id="overflow">
	<?php
		function autoTables($heads, $data, $url){
			echo "<tr>";
			foreach ($heads as $value){
				if ($value == "userID" ){}
				elseif ($value == "courseID"){}				
				elseif ($value == "username"){
					echo "<th>Number</th>";
				}
				else{
					echo "<th>" . ucfirst($value) . "</th>";
				}
			}
			echo "</tr>";
			
			foreach($data as $datab){
			echo "<tr>";
				foreach($datab as $key =>$val){
					if ($key == "userID" ){}
					elseif ($key == "courseID"){}
					else{
						echo "<td><a href='index.php?page=studentinfo&area=staff&userid=" . $datab->userID . "&courseid=" . $datab->courseID . "'>" . $val . "</a></td>";
					}
				}
			echo "</tr>";
			}
		}	
		
		$courses = $db->get_results("SELECT * FROM courses");
		
		foreach ($courses as $courses){
				
				echo $courses->name;
				echo "<table border = '1'>";
				echo "<tr>";
				echo "<th colspan='5'>";
				echo "Student";
				echo "</th>";
				echo "<th colspan='20'>";
				echo "Unit Results";
				echo "</th>";
				echo "</tr>";
				
				$select_clause = "course" . $courses->courseID . "results.userID, 
					course" . $courses->courseID . "results.courseID,
					login.username, 
					users.firstname, 
					users.lastname, 
					users.status, 
					users.class,";			
				$courseUnits = explode(",", $courses->units);
				for($i = 0; $i < count($courseUnits); $i++){
					$select_clause .= "unit" . $courseUnits[$i]. ",";
				}
				$select_clause .= "result";
		
				$from_clause = "course" . $courses->courseID . "results, login, users";			
				$where_clause = "course" . $courses->courseID . "results.courseID = $courses->courseID 
				AND course" . $courses->courseID . "results.userID = login.userID
				AND course" . $courses->courseID . "results.userID = users.userID";
				
				$courseResults = $db->get_results("SELECT $select_clause FROM $from_clause WHERE $where_clause"); 
				foreach($db->get_col_info("name") as $name){
					$resultheads[] = $name;
				}
				
				echo autoTables($resultheads, $courseResults, $url);

				unset($resultheads);

				echo "</table>";
				echo "<br />";			
		}
	?>
</div>