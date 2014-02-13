<?php
class Stats{
	var $retentionTotal;
	var $achievementTotal;
	var $successTotal;
	
	function retention ($data){
		$start = 0;
		$active = 0;
		$withdrawn = 0;	
		if (isset($data)){
			foreach ($data as $data){
				$start = $start + 1;
				if ($data->status == "Active"){
					$active = $active + 1;
				}
				elseif ($data->status == "Withdrawn"){
					$withdrawn = $withdrawn + 1;
				}
			}
		}
		
		if ($active == 0 or $start == 0){
			$this->retentionTotal = 0;
		}
		else{
			$this->retentionTotal = 100 * $active/$start;
		}

		echo "<table border = '1'>";
		echo "<tr>";
		echo "<td>Start</td>";
		echo "<td>" . $start . "</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>Withdrawn</td>";
		echo "<td>" . $withdrawn . "</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>Active</td>";
		echo "<td>" . $active . "</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>Retained</td>";
		echo "<td>" . $this->retentionTotal . "%</td>";
		echo "</tr>";
		echo "</table>";	
	}

	function achievement ($data){
		$active = 0;
		$passes = 0;
		if (isset($data)){
			foreach ($data as $data){
				if ($data->status == "Active"){
					$active = $active + 1;
				}
				if ($data->result == "Pass"){
					$passes = $passes + 1;
				}
			}
		}
		
		if ($active == 0){
			$this->achievementTotal = 0;
		}
		elseif ($active == 1 and $passes == 2){
			$this->achievementTotal = 50;
		}
		else{
			$this->achievementTotal = 100 * $passes/$active;		
		}

		echo "<table border = '1'>";
		echo "<tr>";
		echo "<td>Active</td>";
		echo "<td>" . $active . "</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>Passes</td>";
		echo "<td>" . $passes . "</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td></td>";
		echo "<td></td>";
		echo "</tr>";		
		echo "<tr>";
		echo "<td>Achievement</td>";
		echo "<td>" . $this->achievementTotal . "%</td>";
		echo "</tr>";
		echo "</table>";	
	}

	function success(){
		$this->sucess = ($this->retentionTotal * $this->achievementTotal)/100;

		echo "<table border = '1'>";
		echo "<tr>";
		echo "<td>Retention</td>";
		echo "<td>" . $this->retentionTotal . "%</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>Achievement</td>";
		echo "<td>" . $this->achievementTotal . "%</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td></td>";
		echo "<td></td>";
		echo "</tr>";		
		echo "<tr>";
		echo "<td>Success</td>";
		echo "<td>" . $this->sucess . "%</td>";
		echo "</tr>";
		echo "</table>";		
	}
}

$stats = new Stats;
?>