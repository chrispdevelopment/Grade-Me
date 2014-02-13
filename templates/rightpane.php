<div id="contentTitle">
	<div id="contentTitleText">
		<?php
			if ($session->logged_in == True){
				if (isset($_GET["page"])){
					$page = ucfirst($_GET["page"]) . " Page";
				}
				else{
					$page = "Home Page";
				}
			}
			else{
				$page = "Login Page";
			}
			echo $page;
		?>
	</div>
</div>
<div id="contentText">
	<div id="contentTextInner">
		<?php
			if ($session->logged_in == True){
				if (isset($_GET["page"]) && (isset($_GET["area"]))){
					$page = $_GET["page"];
					$area = $_GET["area"];
					
					$url = "/modulers/" . $area . "/" . $page . ".php";
					include($url);
				}
				elseif (isset($_GET["page"]) && (!isset($_GET["area"]))){
					$page = $_GET["page"];
									
					$url = "/modulers/" . $page . ".php";
					include($url);			
				}
				else{
					include("/modulers/home.php");
				}
			}
			else{
				include("/modulers/login.php");
			}
		?>
	</div>
</div>
<div id="contentBottom"></div>