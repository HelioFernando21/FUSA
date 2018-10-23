<?php
ob_start();
session_start();
?>
<?php
error_reporting(0);
		$texto2  = explode(';;e;;', $_GET["e"]);
		$excluir = $texto2[0];
 		$atualizacao_lyrics = $texto2[1];
		$lyrics = $texto2[1];
		
	
	
		$conecta = mysql_connect("localhost","root","root");
		$banco = mysql_select_db("banco_tcc_fusa");
	
	
		$sql = mysql_query("delete from recados where cd_recado = ".$excluir.";") or die;
		
		if ($lyrics != $_SESSION["codigo"])
		{
			$sql = mysql_query("delete from atualizacoes where (cd_tipo_atualizacao = 1) and (cd_diverso = ".$excluir.");") or die;

		}
		mysql_close($conecta);

		echo
		'<script type="text/javascript">
				
				$(document).ready(function() {
	
	
				carregar_lyrics();
			});
		</script>';
?>