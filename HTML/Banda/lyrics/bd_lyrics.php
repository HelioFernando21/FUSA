<?php
ob_start();
session_start();
?>
		<script type="text/javascript" src="jquery-1.7.2.min.js"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
error_reporting(0);
	$conecta = mysql_connect("localhost","root","root");
	$banco = mysql_select_db("banco_tcc_fusa");
	
	
	$lyrics = $_GET["id"];
	
	$i = 0;
	
	$sql = mysql_query("SELECT re.cd_remetente_recado, us.nm_usuario, re.ds_recado, re.nm_horario_recado,
re.dt_recado, fo.nm_destino_foto,re.cd_recado,us.cd_tipo_usuario FROM recados re inner join usuarios us
on (re.cd_remetente_recado = us.cd_usuario)
inner join fotos fo on (re.cd_remetente_recado = fo.cd_usuario)
where (re.cd_receptor_recado = ".$lyrics.") and (fo.cd_situacao_perfil = 1)
order by  re.cd_recado DESC;") or die;
	
	while($linha = mysql_fetch_array($sql))
	{
		$dados[$i] =  $linha[0].';;e;;'.$linha[1].';;e;;'.$linha[2].';;e;;'.$linha[3].';;e;;'.$linha[4].';;e;;'.$linha[5].';;e;;'.$linha[6].';;e;;'.$linha[7];
		$i ++;
 	}
	
	mysql_close($conecta);
	
	if($_SESSION["codigo"] == "")
	{
		$codigo = 0;
	}
	else
	{
		$codigo = $_SESSION["codigo"];
	}
	
	echo '<div>';
	for ($inicio = 0;$inicio < $i;$inicio++)
	{
		$conecta = mysql_connect("localhost","root","root");
	$banco = mysql_select_db("banco_tcc_fusa");
	
		$dividido = "";
		$dividido = explode(';;e;;',$dados[$inicio]);
		
		$sql = mysql_query("SELECT count(*) FROM recados where (cd_remetente_recado = ".$codigo." ) and (cd_recado = ".$dividido[6].");") or die;
		
		while($linha = mysql_fetch_array($sql))
		{
				$qtSituacao =  $linha[0];
		
	 	}
		
		
		
		mysql_close($conecta);
	
		
		
		echo utf8_encode(	
		'<div id="Lyric_1">
		<div id="caixa2_lyric_1"> ');
		
		if ( $dividido[7] == 1 )
		{
			 echo utf8_encode('
			
			<a href="../../Solo/Profile/profile.php?id='.$dividido[0].'"> 
		
			<div  style="background-image:url(/Fusa/HTML/Usuarios/'.$dividido[5].');background-size:40px;" id="Foto_lyric_1"> 
			</div>
			</a>');
			
				if(( $qtSituacao == 1 ) || ( $codigo == $lyrics ))
			{
				echo '<a name="'.$dividido[6].';;e;;'.$_GET["id"].'" href="#" onclick="antes_excluir_lyrics(this.name)"><div id="bt_excluir_lyric"></div></a> ';
			}
			echo ' <div id="Corpo_lyric_1">';
			
			echo utf8_encode('
			<p class="nome_user"><a href="../../Solo/Profile/profile.php?id='.$dividido[0].'">'.$dividido[1].':</a></p>');
		}
		else
		{
			if ($dividido[7] == 2)
			{
				echo utf8_encode('
						
				<a href="../../Banda/Profile/bandprofile.php?id='.$dividido[0].'">
				<div  style="background-image:url(/Fusa/HTML/Usuarios/'.$dividido[5].');background-size:150px;" id="Foto_lyric_1"> 
				</div>
				</a>');
				
					if(( $qtSituacao == 1 ) || ( $codigo == $lyrics ))
					{
						echo '<a name="'.$dividido[6].';;e;;'.$_GET["id"].'" href="#" onclick="antes_excluir_lyrics(this.name)"><div id="bt_excluir_lyric"></div></a> ';
					}
				echo ' <div id="Corpo_lyric_1">';
				echo utf8_encode('
				<p class="nome_user"><a href="../../Banda/Profile/bandprofile.php?id='.$dividido[0].'">'.$dividido[1].':</a> </p>');			
			}
			else
			{
					if ($dividido[7] == 3)
						{
								echo utf8_encode('
						
								<a href="#">
								<div  style="background-image:url(/Fusa/HTML/Usuarios/'.$dividido[5].');background-size:40px;" id="Foto_lyric_1"> 
								</div>
								</a>');
								
									if(( $qtSituacao == 1 ) || ( $codigo == $lyrics ))
									{
										echo '<a name="'.$dividido[6].';;e;;'.$_GET["id"].'" href="#" onclick="antes_excluir_lyrics(this.name)"><div id="bt_excluir_lyric"></div></a> ';
									}
								echo ' <div id="Corpo_lyric_1">';
								echo utf8_encode('
								<p class="nome_user"><a href="#">'.$dividido[1].':</a> </p>');			
						}
						else
						{
							if ($dividido[7] == 4)
							{
									echo utf8_encode('
							
									<a href="#">
									<div  style="background-image:url(/Fusa/HTML/Usuarios/'.$dividido[5].');background-size:40px;" id="Foto_lyric_1"> 
									</div> 
									</a>');
									
										if(( $qtSituacao == 1 ) || ( $codigo == $lyrics ))
										{
											echo '<a name="'.$dividido[6].';;e;;'.$_GET["id"].'" href="#" onclick="antes_excluir_lyrics(this.name)"><div id="bt_excluir_lyric"></div></a> ';
										}
									echo ' <div id="Corpo_lyric_1">';
									echo utf8_encode('
									<p class="nome_user"><a href="#">'.$dividido[1].':</a> </p>');			
							}
						}
			}
		}
			
		
			
			$valor = explode("-",$dividido[4]);
			echo ' 
			<p class="p_lyric_corpo">'.$dividido[2].'</p> ';
			echo '<div id="info_de_envio">
			<p>às '.$dividido[3].'
			- '.$valor[2].'/'.$valor[1].'/'.$valor[0].'</p>
			</div></div>';
			
			
			
			echo '
			
		 </div><div id="Ponta_lyric_1"></div></div>';
	}
	echo '</div>';
	

?>

<script type="text/javascript">

$(document).ready(function() {
	$('#carregando').hide();
//alert('oi recados');
	
	});
	
	</script>
