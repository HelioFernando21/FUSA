<?php
ob_start();
session_start();
?>
<?php
error_reporting(0);
	date_default_timezone_set("Brazil/East");
	$conecta = mysql_connect("localhost","root","root");
	$banco = mysql_select_db("banco_tcc_fusa");
	
	
	
	
	

	
	session_start();
	
		
	$sql = mysql_query("SELECT count(*),cd_situacao_atualizacao, qt_atualizacao+1 FROM atualizacoes where (cd_usuario = ".$_SESSION["atualizacao_comentario_video"].") and (cd_tipo_atualizacao = 1) and (cd_link = ".$_SESSION["video"].");") or die;
	
	while($linha = mysql_fetch_array($sql))
	{
		$qtAtualizacao =  $linha[0];
		$cdSituacaoAtualizacao = $linha[1];	
		$qtUsuariosAtualizacao = $linha[2];
 	}
					
	if ( $qtAtualizacao == 0 )
	{
		$sql = mysql_query("insert into atualizacoes values('Há Novos comentarios sobre seu video;;e;;/Fusa/HTML/Solo/videos/index.php?id=',".$_SESSION["atualizacao_comentario_video"].",0,null,1,".$_SESSION["video"].",1);") or die;
	}
	else
	{
		if ($cdSituacaoAtualizacao == 1)
		{
			$sql = mysql_query("UPDATE atualizacoes SET cd_situacao_atualizacao = 0,qt_atualizacao = 1  where (cd_usuario = ".$_SESSION["atualizacao_comentario_video"].") and (cd_tipo_atualizacao = 1) and (cd_link = ".$_SESSION["video"].") ;") or die;
		}
		else
		{
			$sql = mysql_query("UPDATE atualizacoes SET cd_situacao_atualizacao = 0,qt_atualizacao = ".$qtUsuariosAtualizacao."  where (cd_usuario = ".$_SESSION["atualizacao_comentario_video"].") and (cd_tipo_atualizacao = 1) and (cd_link = ".$_SESSION["video"].") ;") or die;
		}
	}
	mysql_close($conecta);
?>
