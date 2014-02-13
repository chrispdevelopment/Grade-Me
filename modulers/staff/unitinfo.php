<title>Unit Info Page</title>
<div id="overflow">
<?php
	if (isset($_GET['unitid'])){
		$session->sanitize($_GET, array('unitid'=>'str'));
		$unitid = $_GET['unitid'];
		
		//$unitGrade = $db->get_results("SELECT * FROM unit" . $unitid);
		$unit = $db->get_row("SELECT * FROM units WHERE unitID='$unitid'");
		
		$select_clause = "login.username, users.firstname, users.lastname";
		for ($i=1; $i<=$unit->passes; $i++){
			$select_clause .= ",unit" . $unitid . ".P" . $i;
		}
		for ($i=1; $i<=$unit->merits; $i++){
			$select_clause .= ",unit" . $unitid . ".M" . $i;
		}			
		for ($i=1; $i<=$unit->distinctions; $i++){
			$select_clause .= ",unit" . $unitid . ".D" . $i;
		}
		$select_clause .= ",unit" . $unitid . ".result";
		$from_clause = "users, login, unit" . $unitid;
		$where_clause = "unit" . $unitid . ".unitID = $unitid
						AND login.userID = users.userID
						AND unit" . $unitid . ".userID = users.userID";
	
		$results = $db->get_results("SELECT $select_clause FROM $from_clause WHERE $where_clause");
		foreach($db->get_col_info("name") as $name){
			$resultheads[] = $name;
		}
		
		echo "Unit " . $unitid;
		$session->autoTables($resultheads, $results);
		echo "<br />";
		unset($resultheads);			
	}
?>
</div>