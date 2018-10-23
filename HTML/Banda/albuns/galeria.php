<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
<link rel="stylesheet" type="text/css" href="../../../../Fusa_Anna/CSS/estilo_fotos.css" media="screen"/>
<link rel="stylesheet" type="text/css" href="../../../JavaScript/lightbox2.51/lightbox/css/lightbox.css" />

<script type="text/javascript" src="../../../JavaScript/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="../../../JavaScript/jquery.cycle.all.js"></script>
<script type="text/javascript" src="../../../JavaScript/lightbox2.51/lightbox/js/lightbox.js"></script>
</head>
<body>
<!--<div id="formulario_galeria">


<form method="get" action="add_album.php" >
Nome do Album:<input type="text" name="nome_album" />
<input type="submit" name="criar" id="btn_criar" value="criar" /><br />
	
Nome da foto:<input type="text" name="nome_foto" />
<input type="submit" name="adicionar_foto" value="Adicionar Foto"/>
</form> 
</div>
<span id="titulo_album1">Primeiro album</span>-->

<?php 
error_reporting(0);
session_start();

$galeria = $_GET["id"];
$_SESSION["galeria"] = $galeria;
date_default_timezone_set("Brazil/East");
$conecta = mysql_pconnect("localhost","root","root");
$banco = mysql_select_db("banco_tcc_fusa");
	
	$y = 0;
	$g = 0;
	$bd = 0;
	$sgbtn= 0;


		
	$sql = mysql_query("Select cd_album from fotos where (cd_usuario = ".$galeria.") and ( cd_situacao_perfil = 0 );") or die;
	
	while($linha = mysql_fetch_array($sql))
	{
		if($y==0)
		{
			$album[$y] =  $linha[0];
			$copia =  $linha[0];
			$y++;
			
		}	
		else
		{
			if($copia != $linha[0])
			{
				$album[$y] =  $linha[0];
				$copia =  $linha[0];
				$y++;
				
				
				
			}
		
 	    }
	}
	
	$z = 0;
	do {
$sql = mysql_query("Select cd_foto,nm_destino_foto from fotos where (cd_usuario = ".$galeria.") and ( cd_situacao_perfil = 0 ) and (cd_album = ".$album[$z].");") or die;		
			date("Y-m-d");
			echo '<div class="album" id="album'.$album[$z].'">';
			$i = 0;
			$listas = 1;
			while($linha = mysql_fetch_array($sql))
			{	
				if( $i == 0 )
				{
					
					$texto = "foto".$linha[0];
					
					echo '<div id="lista'.$listas.'" class="org_listas">';
					echo '<a href="../../Usuarios/'.$linha[1].'" rel="lightbox[agrupar'.$g.']"  onclick="clicar_foto()"> <img id="foto'.$linha[0].'" src="../../Usuarios/'.$linha[1].'" class="img" /></a>';
					
					$i++;	
				}
				else
				{
					if ($i == 4)
					{
						$texto = "foto".$linha[0];
						echo '<a href="../../Usuarios/'.$linha[1].'" rel="lightbox[agrupar'.$g.']" onclick="clicar_foto()"> <img id="foto'.$linha[0].'" src="../../Usuarios/'.$linha[1].'" class="img" /></a>';
						echo '</div>';
						$listas++;
						$i = 0;
					}
					else
					{
						$texto = "foto".$linha[0];
						echo '<a href="../../Usuarios/'.$linha[1].'" rel="lightbox[agrupar'.$g.']"  onclick="clicar_foto()" > <img id="foto'.$linha[0].'" src="../../Usuarios/'.$linha[1].'" class="img" /></a>';
						$i ++;
					}
				}
				
 	   
			}
			
			echo '  </div>
			</div>
			<div id="segura'.$sgbtn.'" class="segura_btn">
			<div id="btn_esquerda'.$bd.'" class="btn_direcaoesq"></div>
			<div id="btn_direita'.$bd.'" class="btn_direcaodire"></div>
			</div>';



		
			echo '<script type="text/javascript">
			$(document).ready(function(){
				$("#album'.$album[$z].'").cycle({
		
					fx:"scrollHorz",
					timeout:0,
					prev:"#btn_esquerda'.$bd.'",
					next:"#btn_direita'.$bd.'"
						
				});
			
			
				});
	
				</script>';
	
			
			
			$z++;
			$g++;
			$bd++;
			$sgbtn++;
	}
	while($z < $y);

?>










</body>
</html>