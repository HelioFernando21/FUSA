<?php
ob_start();
session_start();
?>
<script type="text/javascript" src="jquery-1.7.2.min.js"></script>    
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
	error_reporting(0);
	date_default_timezone_set("Brazil/East");
	$conecta = mysql_connect("localhost","root","root");
	$banco = mysql_select_db("banco_tcc_fusa");
	
	
	$valor = $_GET["valor"];
	$v = explode(";;e;;;;e;;",$valor);
	
	$video = $v[0];
	$atualizacao = $v[1];
	
	

	
	session_start();
	$q=$_GET["q"];
	
	$sql = mysql_query("SELECT max(cd_comentario_video)+1, (select nm_video from videos where cd_video = ".$video.") FROM comentarios_videos;") or die;
			
	while($linha = mysql_fetch_array($sql))
	{
		$Maior = $linha[0];
		$NmVideo = $linha[1];
	}
	
	if ($Maior == "")
	{
		$Maior = 1;
	}
	
	
	$sql = mysql_query("insert into comentarios_videos values(".$Maior.",".$video.",".$_SESSION['codigo'].",'".date("Y-m-d")."','".$q."','".date("H:i")."');") or die;
	
	if ($atualizacao != $_SESSION["codigo"])
	{
			//$sql = mysql_query("SELECT count(*) FROM atualizacoes where (cd_usuario = ".$atualizacao.") and (cd_link = ".$video.") and (cd_remetente_atualizacao = ".$_SESSION["codigo"].") and (cd_diverso = ".$Maior.");") or die;
			
			$sql = mysql_query("insert into atualizacoes values('Há;;e;;novo(s) comentario(s) sobre seu video ".$NmVideo.";;e;;/Fusa/HTML/Solo/videos/index.php?id=',".$atualizacao.",0,null,1,".$video.",1,".$_SESSION["codigo"].",".$Maior.");") or die;
			
							
			
	}
	mysql_close($conecta);
	
	echo 
	'<script type="text/javascript">
		$(document).ready(function() {
		carregar();
	});
	</script>';
	
	

?>