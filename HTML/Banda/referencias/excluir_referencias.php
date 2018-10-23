<?php
ob_start();
session_start();
?>

<?php
	error_reporting(0);
	$excluir  = $_GET["e"];
	
	
	$conecta = mysql_connect("localhost","root","root");
	$banco = mysql_select_db("banco_tcc_fusa");
	
	$sql = mysql_query("SELECT nm_destino_referencia FROM referencias where cd_referencia = ".$excluir.";") or die;
	while($linha = mysql_fetch_array($sql))
	{
		$destino =  $linha[0];
		
 	}
	unlink($destino);
	
	$sql = mysql_query("delete from referencias where cd_referencia = ".$excluir.";") or die;
	
	
	
	mysql_close($conecta);
	
	
?>