<?php
ob_start();
session_start();
error_reporting(0);
?>
<script type="text/javascript" src="../../../JavaScript/jquery-1.7.2.min.js"></script>
<?php

$conecta = mysql_connect("localhost","root","root");
	$banco = mysql_select_db("banco_tcc_fusa");	
	
	
    
	$sql = mysql_query("delete from propostas where (cd_usuario = ".$_GET["id"].") and (cd_produtor = ".$_SESSION["codigo"].");") or die;
					
	mysql_close($conecta);
?>