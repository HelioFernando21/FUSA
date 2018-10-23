<?php
ob_start();
session_start();
error_reporting(0);
?>

<script type="text/javascript" src="../../../JavaScript/jquery-1.7.2.min.js"></script>

<?php

$conecta = mysql_connect("localhost","root","root");
	$banco = mysql_select_db("banco_tcc_fusa");	
	
	
    
	$sql = mysql_query("insert into propostas values(null,".$_SESSION["codigo"].",null,'".$_GET["e"]."',".$_GET["id"].",2,0);") or die;
					
	mysql_close($conecta);
?>