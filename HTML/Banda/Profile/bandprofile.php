<?php
ob_start();
session_start();
error_reporting(0);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Band Profile - Fusa</title>
<link rel="stylesheet" type="text/css" href="../../../CSS/estilo_bandprofile.css" />
<link rel="stylesheet" type="text/css" href="../../../CSS/estilo_colors.css" />
<script type="text/javascript" src="../../../JavaScript/jquery-1.7.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="../../../JavaScript/jquery.alerts.css" />
<script src="../../../JavaScript/jquery.js" type="text/javascript"></script>
<script src="../../../JavaScript/jquery.ui.draggable.js" type="text/javascript"></script>
<script src="../../../JavaScript/jquery.alerts.js" type="text/javascript"></script>

<script type="text/javascript">
	$(document).ready(function() {
        
		document.getElementById("player").innerHTML = ' <audio controls="controls"> <source src="#" type="audio/mpeg"> </audio>' ;
	
	texto = window.location;
		v = texto.toString();
		valor = v.split("=");
	
		$("#add_user_div").load("situacao_contato.php?id="+valor[1]);
		
		$(".shadow").mouseover(function(){

		var id = $(this).attr("id");
				console.log(id);
		$("."+id+"_imagem").css({"opacity":"1.0","filter":"alpha(opacity=100)"});
		$(this).mouseleave(function(){
				$("."+id+"_imagem").css({"opacity":"0.7","filter":"alpha(opacity=70)"});
				console.log("saida");
		});
		});
		
});

function play(v)
{
	
	var valor = v.split("+;+"); 
	document.getElementById("player").innerHTML = ' <audio controls="controls"> <source src="'+valor[0]+'" type="audio/mpeg"> </audio>' ;
;
	document.getElementById("musica_tocando").innerHTML = '<p>Tocando '+valor[1]+'</p>';
}


function procurar_amigos()
{
	var valor = document.getElementById("search_pessoas_input").value;
	
	if (valor != "")
	{
		window.location = "../amigos/procurar_amigos.php?id="+valor;
	
	}
}

	function mostrar_div_produtor()
	{
		$("#adcionar_produtor").fadeIn();
	}
	
	function enviar_convite_produtor(valor)
	{
		var texto = document.getElementById("txtTexto").value;
	
		if ( texto != "" )
		{
			while (texto.indexOf("\n") != -1)
			{
				texto = texto.replace("\n","</br>");
				
			}
			
			while (texto.indexOf(" ") != -1)
			{
				texto = texto.replace(" ","+");
				
			}
			$(document).ready(function() {
				
		
				$("#banco").load("adicionar_produtor.php?id="+valor+"&&e="+texto);
				$("#adcionar_produtor").fadeOut();
				carregar_contato("+");
		
			});
		}
	}
	
	$(document).ready(function(){
	
	$("#fecha_integra").click(function(){

	$("#adicionar_integrante").fadeOut();
	});	
		
	$("#fecha_adiciona_produtor").click(function(){

	$("#adcionar_produtor").fadeOut();
	});

	});
	
	function carregar_contato(v)
{
	valor = v.split(";");
	if (valor[0] == "+" )
	{
		jAlert("Convite enviado com sucesso");
		$(document).ready(function() {
			texto = window.location;
			v = texto.toString();
			valor = v.split("=");
			
			window.location = window.location;
		
			
			$("#add_user_div").load("situacao_contato.php?id="+valor[1]);
			
		});
		
	}
	else
	{
		if (valor[0] == "-")
		{
			if ( valor[1] == "b" )
			{
				jAlert("Integrante excluido com sucesso");
			}
			else
			{
				if ( valor[1] == "s" )
				{
					jAlert("Contato excluido com sucesso");
				}
				else
				{
					if ( valor[1] == "p")
					{
						jAlert("Proposta excluida com sucesso");
					}
				}
			}
			
			$(document).ready(function() {
		texto = window.location;
		v = texto.toString();
		valor = v.split("=");
		
		
	});
	
			window.location = window.location;
			
			
		}
	}
}

function excluir_contato_produtor(valor)
{
	$(document).ready(function() {
			
	
			if (confirm("Deseja mesmo excluir sua proposta?"))
			{
				$("#banco").load("excluir_contato_produtor.php?id="+valor);
				
				carregar_contato("-;p");
				$("#add_user_div").load("situacao_contato.php?id="+valor[1]);
			}
	
		});
	
}
</script>

</head>

<body>

<div id="principal">

	<div id="barra">
    
        <?php
	if ($_SESSION["codigo"] == "")
	{
		echo  '<a href="/fusa/html/pagina_inicial/index.php"><div id="Fusa_home"></div></a>';
	}
	else
	{
		if ($_SESSION["tipo"] == 1)
		{
		 	echo  '<a href="../index.php"><div id="Fusa_home"></div></a>';
		}
		else
		{
			if ($_SESSION["tipo"] == 2)
			{
				echo  '<a href="../../Banda/index.php"><div id="Fusa_home"></div></a>';
			}
			else
			{
				if ($_SESSION["tipo"] == 3)
				{
					echo  '<a href="../../Visitante/index.php"><div id="Fusa_home"></div></a>';
				}
				else
				{
					if ($_SESSION["tipo"] == 4)
					{
						echo  '<a href="../../Produtor/ranque/index.php"><div id="Fusa_home"></div></a>';
					}
				}
			}
		}
	}
	?>
                    
                    <div id="procurar_users">
     
                    <input type="text" id="search_pessoas_input" placeholder="Procurar Usuários"/> <input type="submit" onclick="procurar_amigos()" value="" id="go_search" />
                
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

    <div id="horizontal_1">
    <?php
				$idBanda = $_GET["id"];
				if ( $idBanda == "" )
				{
					echo '<script type="text/javascript"> window.location = "../../Erro/index.php"; </script>';
				}
				else
				{
				//	if($_SESSION["codigo"] == "")
				//	{
				//		$codigo
				//	}
				//	else
				//	{
					//}
					
					$conecta = mysql_connect("localhost","root","root");
					$banco = mysql_select_db("banco_tcc_fusa");	
	
		
					$sql = mysql_query("SELECT count(*) FROM usuarios where (cd_usuario = ".$_GET["id"].") and (cd_tipo_usuario = 2);") or die;
	
					while($linha = mysql_fetch_array($sql))
					{
							$qtProfileID = $linha[0];
	 				}
	
	
					mysql_close($conecta);
					
					
					if ($qtProfileID == 0)
					{
						echo '<script type="text/javascript"> window.location = "../../Erro/index.php"; </script>';
					}
					else
					{
							$conecta = mysql_connect("localhost","root","root");
							$banco = mysql_select_db("banco_tcc_fusa");	
	
							$CdProdutor  = $_SESSION["codigo"];
							if ($CdProdutor == "")
							{
								$CdProdutor = 0;
							}
							$sql = mysql_query("select us.nm_usuario,te.nm_estilo, fo.nm_destino_foto,(SELECT nm_destino_print FROM videos where cd_usuario = ".$_GET["id"]." order by cd_video DESC limit 1),(SELECT nm_destino_foto FROM fotos where (cd_usuario = ".$_GET["id"].") and (cd_situacao_perfil = 0) order by dt_foto DESC limit 0,1 ), (SELECT nm_destino_referencia FROM referencias where (cd_usuario = ".$_GET["id"].") order by cd_referencia DESC limit 0,1),(SELECT us.nm_usuario FROM propostas pr inner join usuarios us on (pr.cd_produtor = us.cd_usuario)  where (pr.cd_usuario = ".$_GET["id"].")   and (pr.cd_situacao_proposta = 1) ) from  usuarios us inner join usuarios_estilos ue on (us.cd_usuario = ue.cd_usuario) inner join tipos_estilos te on (ue.cd_estilo = te.cd_estilo)
inner join fotos fo on (us.cd_usuario = fo.cd_usuario) where (fo.cd_situacao_perfil = 1) and (us.cd_usuario = ".$_GET["id"].");") or die;
	
							while($linha = mysql_fetch_array($sql))
							{
								$NmUsuarioBanda =  $linha[0];
								$NmEstiloBanda =  $linha[1];
								$NmDestinoFoto = $linha[2];
								$DestinoVideo = $linha[3];
								$DestinoFotoAlbum = $linha[4];
								$DestinoReferencia = $linha[5];
								$NmCompletoProdutor = $linha[6];
	 						}
	
	
							mysql_close($conecta);
							
					}
		
				} 
			?>
            <div id="info_esquerda">
            <?php
            	echo '<div id="name_band"><p class="p_name_big">'.$NmUsuarioBanda.'</p></div>';
            	echo '<div id="estilo_band"><p> Estilo: '.$NmEstiloBanda.'</p></div>';
            	echo '<div id="pertence_band"><p> Produtora: '.$NmCompletoProdutor.'</p></div>';
            ?>
            </div>
            
            <div id="adcionar_produtor">
            <div id="fecha_adiciona_produtor"><p>x</p></div>
                <div id="conteudo_produtor">
                <style>
				#txtTexto{
					width:250px;
					height:50px;
				}
				</style>
                <textarea name="txtTexto" id="txtTexto" placeholder="Digite sua mensagem e envie uma solicitação"></textarea>
                <?php
                    echo '<input type="button" value="Enviar" class="Enviar_" onclick="enviar_convite_produtor(this.name)" name="'.$_GET["id"].'"/>';
                ?>
                </div>
            </div>
            
            <div id="add_user_div">
            </div>
            
            <div id="info_meio">
            
            <p class="p_integrantes">Integrantes</p>	
                    <div id="integrantes_band">
                    
                  <?php
							$conecta = mysql_connect("localhost","root","root");
							$banco = mysql_select_db("banco_tcc_fusa");	
                
							$sql = mysql_query("SELECT us.cd_usuario, fo.nm_destino_foto FROM usuarios_bandas ub
inner join usuarios us on (ub.cd_usuario = us.cd_usuario)
inner join fotos fo on (us.cd_usuario = fo.cd_usuario)
where (ub.cd_banda = ".$_GET["id"].") and ( fo.cd_situacao_perfil = 1 ) limit 8;") or die;
							$indice = 0;
							while($linha = mysql_fetch_array($sql))
							{
								$indice++;
								$Amigos[$indice] =  $linha[1];
								$AmigosID[$indice] = $linha[0];
	 						}
				
				
							$totalAmigos = '';
							for ( $i=1;$i<9;$i++)
							{
								$totalAmigos = '';
           			
								if ($Amigos[$i] != '')
								{
									$totalAmigos = '<a href="../../Solo/Profile/profile.php?id='.$AmigosID[$i].'" >
									
									<div  id="int'.$i.'" style="background-image:url(../../Usuarios/'.$Amigos[$i].');">
									</div>
									</a>';
								}
								else
								{
									$totalAmigos = '<a href="#" ><img id="int'.$i.'"  /></a>';
								}
					
								echo $totalAmigos;
							}
                
						    
           				?>
           

                    </div>     
                    
                    <input type="submit" value="Mais Integrantes" id="more_int" />
                   
                                
            </div>
            <div id="info_direita">
            <p>No início da carreira a banda começou a fazer shows em sua cidade de origem, depois disso a internet teve um papel importamte com ela foi possível a divulgação de seu principal hit que após alguns anos tornou a banda mundialmente conhecida consagrou-se ao fechar com uma produtora mundial que os levou para diversos países da América Latina. A banda também ganhou diversos Grammy's.</p> 
            
            </div>    
    </div>
    
        <div id="horizontal_2">
         <?php
					//echo $NmDestinoFoto;
					echo '<img src="../../Usuarios/'.$NmDestinoFoto.'" width="1000px" height="265px" id="foto_perfil_Banda"/>';
         ?>
        		<div id="player_band" class="shadow2">
                <div id="p_font"> <p class="p_font">PLAYLIST</p> </div>
                	<div id="playlist">
        			<?php 
			    		$conecta = mysql_connect("localhost","root","root");
						$banco = mysql_select_db("banco_tcc_fusa");	
						$sql = mysql_query("SELECT nm_destino_musica,nm_musica, te.nm_estilo FROM musicas mu
inner join tipos_estilos te on (mu.cd_estilo = te.cd_estilo)  where (cd_usuario = ".$_GET["id"].");") or die;
						$i = 0;
	
						while($linha = mysql_fetch_array($sql))
						{
							$NmDestinoMusica = $linha[0];	
							$NmMusica = $linha[1];				
							$NmEstiloMusica = $linha[2];			
									
							if ($i == 0)
							{
								echo '<div id="music1">
										<div id="playing"></div>';
										echo '<div id="musica"><p><a href="#" onclick="play(this.name)"  name="'.$NmDestinoMusica.'+;+'.$NmMusica.'"> '.$NmMusica.' </a></p> </div>';
									echo '</div>';
								$i = 1;
							}
							else
							{
								if ($i == 1)
								{
									echo '<div id="music2">
										<div id="playing"></div>';
										echo '<div id="musica"><p><a href="#" onclick="play(this.name)"  name="'.$NmDestinoMusica.'+;+'.$NmMusica.'"> '.$NmMusica.' </a></p> </div>';
									echo '</div>';
									$i = 0;
								}
							}		
						}
						mysql_close($conecta);
            		?>
                     
                    
                	
                    </div>
                    <div id="player">
                    </div>
                </div>
        </div>
        
            <div id="horizontal_3">
            
             <?php
					 		$conecta = mysql_connect("localhost","root","root");
							$banco = mysql_select_db("banco_tcc_fusa");	
	
		
							$sql = mysql_query("select count(*), (select count(*) from fotos where (cd_usuario = ".$_GET["id"].") and (cd_situacao_perfil = 0)),(select count(*) from recados where cd_receptor_recado = ".$_GET["id"]."),(select count(*) from referencias where cd_usuario = ".$_GET["id"]."),(select count(*) from agendas where cd_usuario = ".$_GET["id"].")  from videos where cd_usuario = ".$_GET["id"]." ;") or die;
	
							while($linha = mysql_fetch_array($sql))
							{
								$qtVideosBanda =  $linha[0];
								$qtFotosBanda =  $linha[1];
								$qtLyricsBanda = $linha[2];
								$qtReferenciasBanda = $linha[3];
								$qtAgendaBanda = $linha[4];
	 						}
	
	
							mysql_close($conecta);
							if ($DestinoVideo == "")
							{
								echo '<div id="VBOX" class="shadow videos_band_imagem" ></div>';
							}
							else
							{
								echo '<div id="VBOX" class="shadow videos_band_imagem"><img src="'.$DestinoVideo.'" width="160px" height="112px" style="
								border-top-right-radius:15px;	
								border-bottom-right-radius:15px;
								border-bottom-left-radius:15px;
								-moz-border-radius:15px; "/></div>';
							}
							
            				echo '	
                   		    <a href="../usuario_videos/index.php?id='.$_GET["id"].'"><div id="videos_band" class="shadow"><p class="p_link_2"> Vídeos </p> <div id="p_number_v">'.$qtVideosBanda.'</div></div></a>';
                    		
							
							
							if ($DestinoFotoAlbum == "")
							{
								echo '<div id="PBOX" class="shadow pics_band_imagem"></div>';
							}
							else
							{
								echo '<div id="PBOX" class="shadow pics_band_imagem"><img src="../../Usuarios/'.$DestinoFotoAlbum.'" width="160px" height="112px" 														style="border-top-right-radius:15px;	
								border-bottom-right-radius:15px;
								border-bottom-left-radius:15px;
								-moz-border-radius:15px;"></div>';
							}							
							
							
							echo '
                        	
                        	<a href="#"><div id="pics_band" class="shadow"><p class="p_link_2"> Fotos </p>	<div id="p_number_f">'.$qtFotosBanda.'</div></div></a>
                        
						<div id="LBOX" class="shadow lyrics_band_imagem"><img src="../../../Design/padrão.jpg" width="171px" height="112px" 														style="border-top-right-radius:15px;	
	border-bottom-right-radius:15px;
	border-bottom-left-radius:15px;
	-moz-border-radius:15px; "></div>
								
								
                              
                            <a href="../lyrics/index.php?id='.$_GET["id"].'"><div id="lyrics_band" class="shadow"><p class="p_link_middle"> Lyrics </p>	<div id="p_number_l">'.$qtLyricsBanda.'</div></div></a>';
                            
							
							
							if ($DestinoReferencia == "")
							{
								echo '<div id="RBOX" class="shadow references_band_imagem"></div>';
							}
							else
							{
								echo '<div id="RBOX" class="shadow references_band_imagem"><img src="'.$DestinoReferencia.'" width="160px" height="112px" style="border-top-right-radius:15px;	
								border-bottom-right-radius:15px;
								border-bottom-left-radius:15px;
								-moz-border-radius:15px;" ></div>';
							}
							
							echo '
                            
                            <a href="../referencias/index.php?id='.$_GET["id"].'"><div id="references_band" class="shadow"><p class="p_link_2"> Referências </p> <div id="p_number_r">'.$qtReferenciasBanda.'</div></div></a>
                                
                            
							<div id="ABOX" class="shadow agend_band_imagem"><img src="../../../Design/padrão.jpg" width="160px" height="112px" 														style="border-top-right-radius:15px;	
	border-bottom-right-radius:15px;
	border-bottom-left-radius:15px;
	-moz-border-radius:15px; "></div>
	
	           
                            <a href="../agendas/index.php?id='.$_GET["id"].'"><div id="agend_band" class="shadow"><p class="p_link_2"> Agenda </p>	<div id="p_number_a">'.$qtAgendaBanda.'</div></div></a>';
					?>
            
            </div>

</div>
<div id="banco">
</div>
</div>
<div id="rodape">

<a href="../../Rodape/sobreafusa.php" class="float"><p class="space">Sobre a Fusa -</p></a>  
<a href="../../Rodape/produtores.php" class="float"><p class="color">Produtores -</p></a>
<a href="../../Rodape/contato.php" class="float"><p class="color">Contato</p></a>

</div>
</body>
</html>