<?php
ob_start();
session_start();
error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Resultados - Fusa</title>
<link rel="stylesheet" type="text/css" href="../../CSS/estilo_video_resultado.css" />
<link rel="stylesheet" type="text/css" href="../../CSS/estilo_colors.css" />
<script src="../../JavaScript/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="../../JavaScript/jquery-ui.js" type="text/javascript"></script>

<script>
function Procurar_Videos()
	{
		var valor = document.getElementById("search_video").value;
		if (valor !=  "")
		{
			
				window.location = "../Procurar/videos.php?id="+valor;
			
		
		}
	}
	
			function procurar_amigos()
{
	var valor = document.getElementById("search_pessoas_input").value;
	
	if (valor != "")
	{
		window.location = "../solo/amigos/procurar_amigos.php?id="+valor;
	
	}
}
</script>

</head>
<body>

<div id="principal">

	<div id="barra">  
    <?php
		
	
		if ($_SESSION["tipo"] == 1)
		{
		 	echo  '<a href="../Solo/index.php"><div id="Fusa_home"></div></a>';
		}
		else
		{
			if ($_SESSION["tipo"] == 2)
			{
				echo  '<a href="../Banda/index.php"><div id="Fusa_home"></div></a>';
			}
			else
			{
				if ($_SESSION["tipo"] == 3)
				{
					echo  '<a href="../Visitante/index.php"><div id="Fusa_home"></div></a>';
				}
				else
				{
					if ($_SESSION["tipo"] == 4)
					{
						echo  '<a href="../Produtor/ranque/index.php"><div id="Fusa_home"></div></a>';
					}
				}
			}
		}
	
	?>
    
                            
            <div id="procurar_users">

            <input type="text" id="search_pessoas_input" placeholder="Procurar Usuários" /> <input type="submit" value="" onclick="procurar_amigos()" id="go_search" />

            </div>
        
            <div id="infos_user">
            
                    
                    	<?php
					if ($_SESSION["codigo"] == "")
					{
						echo ' <div id="texto_auxiliar">
                					<p class="p_frase">Faça seu login ou <a href="#">cadastre-se!</a></p>
              				  </div>';
					} 
			
				?>
           
                    <div id="logar">
            	<?php
	error_reporting(0);
		$texto = $_SERVER['REQUEST_URI'];
		
			  
			  $i=1;
			  $diretorio = "";
			  do
			  {
				  if($texto[$i] == "/")
				  {
							  
					  $diretorio = $diretorio."../";
				  }
				  
				  $i++;
			  }
			  while(strlen($_SERVER['REQUEST_URI']) > $i+1);
			  
			  
			  
			  include($diretorio."FUSA/HTML/Pagina_Inicial/acesso.php");
			  //echo 'oi msm';
	?>
            </div>
    </div>
    </div>

<div id="conteudo">
	<div id="coluna1">
			<?php
            	echo '<a href="../solo/Profile/profile.php?id='.$_SESSION["codigo"].'"><img id="foto_user" src="../Usuarios/'.$_SESSION["foto_perfil"].'" /> </a>';
            ?>
            
            
            <div id="procurar_MV">                
                <div id="linha_video"> <div id="icone_video"></div>  
                <div id="input_video">
                <form method="post" onSubmit="Procurar_Videos()">
                <input type="text" id="search_video" placeholder="Procurar Vídeos"/>
                <input type="button" onClick="Procurar_Videos()" id="btn_video">
                </form>                
                </div> 
                </div>
            </div>
    </div>        
<div id="coluna2">
<div id="videos">
            
            
<?php
		$ProcuraVideo = $_GET["id"];
		
		if ($ProcuraVideo == "")
		{
			echo '<script type="text/javascript"> window.location = "../Erro/index.php"; </script>';
		}
		else
		{
									$conecta = mysql_connect("localhost","root","root");
									$banco = mysql_select_db("banco_tcc_fusa");

	
									
									$sql = mysql_query("SELECT vi.cd_video, vi.nm_video, vi.dt_video, vi.nm_horario_video, vi.nm_destino_print, us.nm_usuario, fo.nm_destino_foto, us.cd_tipo_usuario, us.cd_usuario  FROM videos vi inner join usuarios us on (vi.cd_usuario = us.cd_usuario) inner join fotos fo on (us.cd_usuario = fo.cd_usuario) where ((vi.nm_video like '%".$ProcuraVideo."%') or (vi.nm_video like '%".$ProcuraVideo."')  or (vi.nm_video like '".$ProcuraVideo."%') or (vi.nm_video = '".$ProcuraVideo."')) and (fo.cd_situacao_perfil = 1) order by vi.dt_Video Desc,
  vi.nm_horario_video Desc ;") or die;
									
				
									while($linha = mysql_fetch_array($sql))
									{
										echo '<div id="video" class="alinhado">';
										
										if  ( $linha[7] == 1 )
										{
											echo '<div id="title_video"> 
														<a href="../Solo/Videos/index.php?id='.$linha[0].'" id="nome_video"><p>'.$linha[1].'</p></a>  
													</div>';
													$print = explode("../../",$linha[4]);
											echo '<div id="imagem">
													<img src="../'.$print[1].'" width="238px" height=138px" id="imagem_video"/>
												  </div>
													<a href="../Solo/Videos/index.php?id='.$linha[0].'" id="nome_video"><div id="btn_play"></div></a>
													</div>';
										}
										else
										{
											if ($linha[7] == 2)
											{
												echo '<div id="title_video"> 
														<a href="../Banda/Videos/index.php?id='.$linha[0].'" id="nome_video"><p>'.$linha[1].'</p></a> 
													</div>';
													$print = explode("../../",$linha[4]);
											echo '<div id="imagem">
													<img src="../'.$print[1].'" width="238px" height=138px" id="imagem_video"/>
												  </div>
													<a href="../Banda/Videos/index.php?id='.$linha[0].'" id="nome_video"><div id="btn_play"></div></a>
													</div>';
											}
										}
										
									}
									
									mysql_close($conecta);
		}
?>

</div>

</div>
</div>
</div>
<div id="rodape0">

<a href="../Rodape/sobreafusa.php" class="float0"><p class="space0">Sobre a Fusa -</p></a>  
<a href="../Rodape/produtores.php" class="float0"><p class="color0">Produtores -</p></a>
<a href="../Rodape/contato.php" class="float0"><p class="color0">Contato</p></a>

</div>

</body>
</html>
