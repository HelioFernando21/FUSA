<?php
error_reporting(0);
ob_start();
session_start();

?>


<script src="../../JavaScript/jquery-1.7.2.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../../CSS/scroller.css" />

<style>

#foto_usuario {
	width:40px;
	height:40px;
	float:left;
}

#nome_usuario {
	font-family:Arial, Helvetica, sans-serif;
	color:#2da6e9;
	font-size:18px;
	margin-left:5px;
}

#Estado {
	text-align:left;
	min-width:100px;
	max-width:500px;
	margin-left:55px;
	color:#FFF;
	font-size:12px;
	font-family:Verdana, Geneva, sans-serif;
}


</style>

<?php

	
	$valor = explode(';;e;;',$_GET["id"]);
	$conecta = mysql_connect("localhost","root","root");
	$banco = mysql_select_db("banco_tcc_fusa");
	
	$codigo = "";
	
	$codigo = "SELECT us.cd_usuario,us.nm_usuario,us.nm_estado,nm_cidade , us.cd_tipo_usuario, fo.nm_destino_foto FROM usuarios us
inner join fotos fo on (us.cd_usuario = fo.cd_usuario)
inner join usuarios_instrumentos ui on (us.cd_usuario = ui.cd_usuario)
inner join tipos_instrumentos ti on (ui.cd_instrumento = ti.cd_instrumento)
inner join usuarios_estilos ue on (us.cd_usuario = ue.cd_usuario)
inner join tipos_estilos te on (ue.cd_estilo = te.cd_estilo)
where (fo.cd_situacao_perfil = 1) "; 

	
	if ($valor[0] != 'Todos')
	{
		$codigo .= " and (ue.cd_estilo = ".$valor[0].")";
	}
	
	
	if ($valor[1] != '---- TODOS ----')
	{
		$codigo .= " and (us.nm_estado = '".$valor[1]."')";
	}
	
	if ($valor[2] != '---- TODAS ----')
	{
		$codigo .= " and (us.nm_cidade = '".$valor[2]."')";
	}
	
	if ($valor[3] != 'Todos')
	{
		$codigo .= " and (ui.cd_instrumento = ".$valor[3].")";
	}
	
	$codigo .= ";";
	
	
	
	$sql = mysql_query($codigo) or die;
	
	while($linha = mysql_fetch_array($sql))
	{
			$encontrado = $linha[0];
		echo '<div id="usuario">';
		
			echo '<a href="/Fusa/Html/Solo/Profile/profile.php?id='.$linha[0].'"><div  style="background-image:url(../Usuarios/'.$linha[5].'); background-size:40px;" id="foto_usuario" /></a>';
			echo '<a href="/Fusa/Html/Solo/Profile/profile.php?id='.$linha[0].'" id="nome_usuario" >'.$linha[1].'</a>';
			
		
			echo '<p id="Estado">'.$linha[2].' - '.$linha[3].'</p>';
			
		echo '</div>';
	}
	
	mysql_close($conecta);
	
	if ($encontrado == "")
	{
		echo '<p id="resultado_nulo">Nenhum artista encontrado com essas características</p>';
	}
?>