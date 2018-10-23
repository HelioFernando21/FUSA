<?php
ob_start();
session_start();
?>
<?php
	error_reporting(0);
	session_start();
	date_default_timezone_set("Brazil/East");
	$conecta = mysql_connect("localhost","root","root");
	$banco = mysql_select_db("banco_tcc_fusa");	
	
	
      //echo $_SESSION["codigo"];          
	$sql = mysql_query("insert into contatos values(null,".$_SESSION["codigo"].",".$_GET["e"].",2,'".date("Y-m-d")."','".date("H:i")."','".$_GET["id"]."');") or die;
					
	mysql_close($conecta);
	echo '
	<script type="text/javascript">
		$(document).ready(function() {
			window.location = "profile.php?id='.$_GET["e"].'";
		});
	
	</script>
	
	';
?>