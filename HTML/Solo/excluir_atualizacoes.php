<?php
ob_start();
session_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
error_reporting(0);
		$texto2  = explode(';;e;;', $_GET["e"]);
		$situacaoExcluir = $texto2[0];
 		$cdAtualizacao = $texto2[1];
		
		
	
	
		$conecta = mysql_connect("localhost","root","root");
		$banco = mysql_select_db("banco_tcc_fusa");
	
		
		if ($situacaoExcluir == 0)
		{
			$sql = mysql_query("delete from atualizacoes where cd_usuario = ".$cdAtualizacao.";") or die;
		}
		else
		{
			if ($situacaoExcluir == 1)
			{
				$sql = mysql_query("delete from atualizacoes where cd_atualizacao = ".$cdAtualizacao.";") or die;
			}
		}
		
		mysql_close($conecta);

	
?>

<script type="text/javascript">

$(document).ready(function() {
	$('#carregando').hide();
//alert('oi recados');
	
	});
	
	</script>