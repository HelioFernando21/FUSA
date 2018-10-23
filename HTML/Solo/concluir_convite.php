<?php
error_reporting(0);
ob_start();
session_start();
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="text/javascript" src="../../JavaScript/jquery-1.7.2.min.js"></script>

<?php
	error_reporting(0);
	date_default_timezone_set("Brazil/East");
	$concluirConvite = $_GET["e"];
	if ($concluirConvite == "")
	{
		echo '<script type="text/javascript"> alert("pagina nao encontrada"); </script>';
	}
	else
	{
		$valor = explode(';;e;;',$concluirConvite);
		if ($valor[0] == 0)
		{
				$conecta = mysql_connect("localhost","root","root");
				$banco = mysql_select_db("banco_tcc_fusa");
			
				
				
				$sql = mysql_query("update contatos set cd_situacao_contato = 1 where (cd_receptor_contato = ".$_SESSION["codigo"].") and (cd_remetente_contato = ".$valor[2].") and (cd_situacao_contato = 0) ;") or die;
				
				$sql = mysql_query("delete from contatos where (cd_receptor_contato = ".$valor[2].") and (cd_remetente_contato = ".$_SESSION["codigo"].");") or die;
				
				$sql = mysql_query("SELECT max(cd_contato)+1, (select nm_usuario from usuarios where cd_usuario = ".$_SESSION["codigo"].") FROM contatos ;") or die;
			
				while($linha = mysql_fetch_array($sql))
				{
					$Maior = $linha[0];
					$NmRemetente = $linha[1];
				}
				
				if ($Maior == "")
				{
					$Maior = 1;
				}
				
				$sql = mysql_query("insert into contatos values(".$Maior.",".$_SESSION["codigo"].",".$valor[2].",1,'".date("Y-m-d")."','".date("H:i")."',null);") or die;
				
				
				
				$sql = mysql_query("insert into atualizacoes values(';;e;;".$NmRemetente." aceitou seu convite;;e;;/Fusa/HTML/Solo/profile/profile.php?id=',".$valor[2].",0,null,5,".$_SESSION["codigo"].",1,".$valor[2].",".$Maior.");") or die;
							
				
								
			
				mysql_close($conecta);	
				
				echo "<script type='text/javascript'>


	$(\"#conteudo_troca4\").load('convite.php?id=".$_SESSION["codigo"]."');	
	$(\"#numbers\").load('numeros.php');

	

	
	</script>";
		}
		else
		{
				$conecta = mysql_connect("localhost","root","root");
				$banco = mysql_select_db("banco_tcc_fusa");
			
				
				
				$sql = mysql_query("update contatos set cd_situacao_contato = 3 where (cd_receptor_contato = ".$_SESSION["codigo"].") and (cd_remetente_contato = ".$valor[2].") and (cd_situacao_contato = 2) ;") or die;
				
				$sql = mysql_query("insert into usuarios_bandas values(".$valor[4].",".$valor[2].",".$valor[3].");") or die;
				
				
				$sql = mysql_query("select nm_usuario from usuarios where cd_usuario = ".$_SESSION["codigo"].";") or die;
			
				while($linha = mysql_fetch_array($sql))
				{
				
					$NmRemetente = $linha[0];
				}
			
				$sql = mysql_query("delete from atualizacoes where (cd_usuario = ".$valor[2].") and (cd_tipo_atualizacao = 5) and (cd_link = ".$_SESSION["codigo"].");") or die;
				$sql = mysql_query("insert into atualizacoes values(';;e;;".$NmRemetente." aceitou seu convite;;e;;/Fusa/HTML/solo/profile/profile.php?id=',".$valor[2].",0,null,5,".$_SESSION["codigo"].",1,".$valor[2].",".$valor[1].");") or die;
							
				
								
			
				mysql_close($conecta);	
				echo "<script type=\"text/javascript\">

	$(\"#conteudo_troca3\").load('convite_banda.php?id=".$_SESSION["codigo"]."');	
	$(\"#numbers\").load('numeros.php');

	
	
	
	</script>";
				
		}
	}
	
	
?>

