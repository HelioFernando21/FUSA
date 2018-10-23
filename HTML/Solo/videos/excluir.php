<?php
ob_start();
session_start();
?>
<?php
error_reporting(0);

		
		$valor = explode(";;e;;",$_GET["e"]);
		$excluir  = $valor[0];
		$video = $valor[1];
		$usuario = $valor[2];
 
		session_start();
	
	
		$conecta = mysql_connect("localhost","root","root");
		$banco = mysql_select_db("banco_tcc_fusa");
	
		$sql = mysql_query("delete from comentarios_videos where cd_comentario_video = ".$excluir.";") or die;
		
		
		if ($usuario != $_SESSION["codigo"])
		{
			$sql = mysql_query("delete from atualizacoes where (cd_tipo_atualizacao = 1) and (cd_diverso = ".$excluir.");") or die;
		}
		mysql_close($conecta);
		
		
		echo 
		'<script type="text/javascript">
			$(document).ready(function() {
			carregar();
		});
		</script>';


	
?>

