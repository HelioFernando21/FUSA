<?php
ob_start();
session_start();
?>
<?php
	error_reporting(0);
	session_start();
	$conecta = mysql_connect("localhost","root","root");
	$banco = mysql_select_db("banco_tcc_fusa");	
	

	$sql = mysql_query("delete FROM contatos where (cd_remetente_contato = ".$_SESSION["codigo"].") and ( cd_receptor_contato = ".$_GET["e"]." ) ;") or die;
	
	$sql = mysql_query("delete FROM usuarios_bandas where (cd_usuario = ".$_GET["e"].") and (cd_banda = ".$_SESSION["codigo"].") ;") or die;
	
	
			$sql = mysql_query("delete from atualizacoes where (cd_tipo_atualizacao = 5) and (cd_remetente_atualizacao  = ".$_GET["e"].") and (cd_link = ".$_SESSION["codigo"].");") or die;
			
	mysql_close($conecta);
	
	echo '
	<script type="text/javascript">
		$(document).ready(function() {
			window.location = "profile.php?id='.$_GET["e"].'";
		});
	
	</script>
	
	';
?>