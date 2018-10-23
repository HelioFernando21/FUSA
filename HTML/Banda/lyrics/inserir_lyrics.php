<?php
ob_start();
session_start();
?>
<script type="text/javascript" src="jquery-1.7.2.min.js"></script>    

<?php
	error_reporting(0);
	date_default_timezone_set("Brazil/East");
	$conecta = mysql_connect("localhost","root","root");
	$banco = mysql_select_db("banco_tcc_fusa");
	
	
	
	
	

	

	$q= $_GET["q"];
	$lyrics =  $_GET["id"];
	$atualizacao_lyrics =  $_GET["id"];
	
	$sql = mysql_query("SELECT max(cd_recado)+1 FROM recados ;") or die;
			
	while($linha = mysql_fetch_array($sql))
	{
		$Maior = $linha[0];
	}
	
	if ($Maior == "")
	{
		$Maior = 1;
	}
	
	$sql = mysql_query("insert into recados values(".$Maior.",'".$q."','".date("Y-m-d")."',".$_SESSION["codigo"].",".$lyrics.",'".date("H:i")."');") or die;
	
	if ($lyrics != $_SESSION["codigo"])
	{
			$sql = mysql_query("insert into atualizacoes values('Há;;e;;novo(s) lyrics ;;e;;/Fusa/HTML/Banda/lyrics/index.php?id=',".$atualizacao_lyrics.",0,null,2,".$lyrics.",1,".$_SESSION["codigo"].",".$Maior.");") or die;					
	}
	mysql_close($conecta);
	
	echo
	'<script type="text/javascript">
			
			$(document).ready(function() {


			carregar_lyrics();
		});
	</script>';

?>