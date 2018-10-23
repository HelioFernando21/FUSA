<?php
ob_start();
session_start();
error_reporting(0);
?>
<script type="text/javascript" src="../../JavaScript/jquery-1.7.2.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	$cd_situacao = explode(';;e;;',$_GET["id"]);
	$conecta = mysql_connect("localhost","root","root");
	$banco = mysql_select_db("banco_tcc_fusa");
		
	
		
		$qtUsuario = 0;
		
		$sql = mysql_query("UPDATE atualizacoes SET cd_situacao_atualizacao = 1 where (cd_tipo_atualizacao = ".$cd_situacao[1].") and (cd_usuario = ".$_SESSION["codigo"].") ;") or die;			
		
		mysql_close($conecta);
		
		echo '<script type="text/javascript"> window.location = "'.$cd_situacao[0].'";  </script>'
		
	
	
?>

