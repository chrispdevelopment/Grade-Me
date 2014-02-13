<title>Units Page</title>
<?php
	function autoTables($heads, $data){
		echo "<table border = '1'>";
		echo "<tr>";
		foreach ($heads as $value){
			if ($value == "unitID"){
				echo "<th>Unit No.</th>";
			}
			else{
				echo "<th>" . ucfirst($value) . "</th>";
			}
		}
		echo "</tr>";
		foreach($data as $datab){
			echo "<tr>";
				foreach($datab as $key =>$val){
					echo "<td><a href='index.php?page=unitinfo&area=staff&unitid=" . $datab->unitID . "'>" . $val . "</a></td>";
				}
			echo "</tr>";
		}
		echo "</table>";
	}

	$unit = $db->get_results("SELECT unitID, name, description, unitspec FROM units");
	foreach($db->get_col_info("name") as $name){
		$unitsheads[] = $name;
	}
	
	autoTables($unitsheads, $unit);

?>