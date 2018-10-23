<?php
ob_start();
session_start();
?>
<?php
	error_reporting(0);

	$conecta = mysql_connect("localhost","root","root");
	$banco = mysql_select_db("banco_tcc_fusa");	
	
	
      //echo $_SESSION["codigo"];          
	$sql = mysql_query("delete FROM contatos where (cd_remetente_contato = ".$_GET["e"].") and ( cd_receptor_contato = ".$_SESSION["codigo"]." ) ;") or die;
	
	$sql = mysql_query("delete FROM contatos where (cd_remetente_contato = ".$_SESSION["codigo"].") and ( cd_receptor_contato = ".$_GET["e"]." ) ;") or die;
					
	mysql_close($conecta);
	
	echo '
	<script type="text/javascript">
		$(document).ready(function() {
			window.location = "profile.php?id='.$_GET["e"].'";
		});
	
	</script>
	
	';
?>