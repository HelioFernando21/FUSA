<?php
ob_start();
session_start();
?>
<script type="text/javascript" src="jquery-1.7.2.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
//	$("#carregando").Hide();
//alert("passou aqui 1");
	
	});
</script>
<div>

<?php
error_reporting(0);
	$conecta = mysql_connect("localhost","root","root");
	$banco = mysql_select_db("banco_tcc_fusa");
	
	$i = 0;
	
	
	
	$video = $_GET["id"];
	
	
	$sql = mysql_query("SELECT cv.cd_remetente_video, us.nm_usuario, cv.ds_comentario_video,
cv.nm_horario_video, cv.dt_comentario_video, fo.nm_destino_foto, cv.cd_comentario_video, us.cd_tipo_usuario
FROM comentarios_videos cv inner join usuarios us
on cv.cd_remetente_video = us.cd_usuario
inner join fotos fo on us.cd_usuario = fo.cd_usuario
where (cv.cd_video = ".$video.") and (fo.cd_situacao_perfil = 1) order by  cv.cd_comentario_video DESC ;") or die;
	
	while($linha = mysql_fetch_array($sql))
	{
		$dados[$i] =  $linha[0].';;e;;'.$linha[1].';;e;;'.$linha[2].';;e;;'.$linha[3].';;e;;'.$linha[4].';;e;;'.$linha[5].';;e;;'.$linha[6].';;e;;'.$linha[7];
		$i ++;
 	}
	
	
	mysql_close($conecta);
	

	for ($inicio = 0;$inicio < $i;$inicio++)
	{
		
		$dividido = "";
		$dividido = explode(';;e;;',$dados[$inicio]);
		
		$conecta = mysql_connect("localhost","root","root");
		$banco = mysql_select_db("banco_tcc_fusa");
		
		if ($_SESSION["codigo"] == "")
		{
			$codigo = 0;
		}
		else
		{
			$codigo = $_SESSION["codigo"];
		}
		
		$sql = mysql_query("SELECT count(*) FROM comentarios_videos cv
inner join videos vi on (cv.cd_video = vi.cd_video)
where ((cv.cd_remetente_video = ".$codigo.") and (cv.cd_video = ".$video.") and (cv.cd_comentario_video = ".$dividido[6]."))
or ((vi.cd_usuario = ".$codigo.") and (cv.cd_comentario_video = ".$dividido[6].") )  ;") or die;
	
		while($linha = mysql_fetch_array($sql))
		{
				$qtSituacao =  $linha[0];
		
	 	}
	mysql_close($conecta);
		
		
		echo 	utf8_encode(
		'<div id="comentario">');
		if ( $dividido[7] == 1 )
		{
			 echo utf8_encode('
			
			<a href="../Profile/profile.php?id='.$dividido[0].'">
			
			<div  style="background-image:url(../../Usuarios/'.$dividido[5].');background-size:28px;" id="c1"> 
			</div>
			
			</a>');
			
			echo  utf8_encode('
			 <div id="c2">');
			echo utf8_encode('<a href="../Profile/profile.php?id='.$dividido[0].'"><p class="nome_user">'.$dividido[1].'</p></a>');
		}
		else
		{
			if ($dividido[7] == 2)
			{
				echo utf8_encode('
			
				<a href="../../Banda/Profile/bandprofile.php?id='.$dividido[0].'">
				<div  style="background-image:url(../../Usuarios/'.$dividido[5].');background-size:40px;" id="c1"> 
				</div>
				</a>');
				echo  utf8_encode('
			 <div id="c2">');
				echo utf8_encode('<a href="../../Banda/Profile/bandprofile.php?id='.$dividido[0].'"><p class="nome_user">'.$dividido[1].'</p></a>');			
			}
			else
			{
				if ($dividido[7] == 3)
				{
					echo utf8_encode('
				
					<a href="#">
					<div  style="background-image:url(../../Usuarios/'.$dividido[5].');background-size:28px;" id="c1"> 
					</div>
					</a>');
					echo  utf8_encode('
				 <div id="c2">');
					echo utf8_encode('<a href="#"><p class="nome_user">'.$dividido[1].'</p></a>');			
				}
				else
				{
					if ($dividido[7] == 4)
					{
						echo utf8_encode('
					
						<a href="#">
						<div  style="background-image:url(../../Usuarios/'.$dividido[5].');background-size:28px;" id="c1"> 
						</div>
						</a>');
						echo  utf8_encode('
					 <div id="c2">');
						echo utf8_encode('<a href="#"><p class="nome_user">'.$dividido[1].'</p></a>');			
					}
				}
			}
		}
			
			
			
			
			 
			 echo utf8_encode('
                    <p>'.$dividido[2].'</p>
                    </div>');
			
			//echo utf8_encode('
			//<p>Horario: '.$dividido[3].'</p>
			//<p>Data: '.$dividido[4].'</p>
			if( $qtSituacao == 1 )
			{
				echo '<a name="'.$dividido[6].'" href="#" onclick="antes_excluir_Recado(this.name)"><div id="c3"></div></a> ';
			}
			
		echo utf8_encode(' </div>');
	}

	
?>
</div>
<script type="text/javascript">

$(document).ready(function() {
	$('#carregando').hide();
//alert('oi recados');
	
	});
	
	</script>

