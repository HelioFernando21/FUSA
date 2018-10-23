<?php
ob_start();
session_start();
error_reporting(0);
?>

<script type="text/javascript" src="../../JavaScript/jquery-1.7.2.min.js"></script>
<?php

		$conecta = mysql_connect("localhost","root","root");
		$banco = mysql_select_db("banco_tcc_fusa");

		$CdProposta = $_GET["e"];
		
		$sql = mysql_query("update propostas set cd_situacao_proposta = 1 where (cd_proposta = ".$CdProposta.");") or die;
		
		mysql_close($conecta);
		echo
		"<script type=\"text/javascript\">
		


	$(\"#conteudo_troca2\").load('proposta.php?id='+".$_SESSION["codigo"].");	
	$(\"#numbers\").load('numeros.php');
	
	
		</script>";
		
	
?>