<?php
ob_start();
session_start();
error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Profile - Fusa</title>
<link rel="stylesheet" type="text/css" href="../../../CSS/estilo_profile.css" />
<link rel="stylesheet" type="text/css" href="../../../CSS/estilo_colors.css" />
<script type="text/javascript" src="../../../JavaScript/jquery-1.7.2.min.js"></script>

<link rel="stylesheet" type="text/css" href="../../../JavaScript/jquery.alerts.css" />
<script src="../../../JavaScript/jquery.js" type="text/javascript"></script>
<script src="../../../JavaScript/jquery.ui.draggable.js" type="text/javascript"></script>
<script src="../../../JavaScript/jquery.alerts.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function() {
	
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
	
	$(document).ready(function() {
       
		document.getElementById("player_musica").innerHTML = ' <audio controls="controls"> <source src="#" type="audio/mpeg"> </audio>' ;
		
	    $("#procurar_amigos_2").click(function(event) {		
		
			  
			var valor = document.getElementById("search_pessoas_input").value;  
			if ( valor == "")
			{
				
				jAlert("Digite um nome");
			}
			else
			{
				var texto =  valor.replace(" ","+");
				window.location = "../amigos/procurar_amigos.php?id=" + texto;			
			}  
    });	
});

function play(v)
{
	var valor = v.split("+;+"); 
	document.getElementById("player_musica").innerHTML = ' <audio controls="controls"> <source src="'+valor[0]+'" type="audio/mpeg"> </audio>' ;
;
	document.getElementById("musica_tocando").innerHTML = '<p>Tocando '+valor[1]+'</p>';
}

function verificar_contato(v)
{
	
	var valor = v.split(";");
	
	if ("+" == valor[0])
	{
		if (confirm("Deseja adicionar esse contato?"))
		{
			adicionar_contato(valor[1]+";"+valor[2]);
		
			//carregar_contato(valor[0]+";");
		}
	}
	else
	{
		if ("-" == valor[0])
		{
			if (confirm("Deseja excluir esse contato?"))
			{
				excluir_contato(valor[1]+";"+valor[2]);
				
				//carregar_contato(valor[0]+";"+valor[2]);
			}
		}
	}
}

function adicionar_contato(valor)
{
	var v = valor.split(";");


	
	if (v[1] == "s")
	{
		$(document).ready(function() {
	

		$("#adicionar_contato_div").load("adicionar_contato.php?e="+v[0]);
		
		});
	}
	else
	{
		if (v[1] == "b")
		{
			
			
			$(document).ready(function() {
	

				$("#adicionar_contato_div").load("adicionar_contato_banda.php?e="+v[0]);
			
			});
		}
	}
	
	
	
	
	

}

function excluir_contato(valor)
{
	var v = valor.split(";");
	
	if (v[1] == "s")
	{
		
		
		
		$(document).ready(function() {
	

		$("#adicionar_contato_div").load("excluir_contato.php?e="+v[0]);
		
		});
	}
	else
	{
		if (v[1] == "b")
		{

			$(document).ready(function() {
	

				$("#adicionar_contato_div").load("excluir_contato_banda.php?e="+v[0]);
			
			});
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

function enviar_convite_banda(valor)
{
	var texto = document.getElementById("jumpMenu1").value;

	if ( texto != "valor" )
	{
		$(document).ready(function() {
			
	
			
			$("#add_user_div").load("adicionar_contato_banda.php?e="+valor+"&&id="+texto);
			$("#adicionar_integrante").fadeOut();
			carregar_contato("+");
	
		});
	}
}

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

function procurar_amigos()
{
	var valor = document.getElementById("search_pessoas_input").value;
	
	if (valor != "")
	{
		window.location = "../amigos/procurar_amigos.php?id="+valor;
	
	}
}

function adicionar_banda_integrante()
{

	

			$("#adicionar_integrante").fadeIn();
			
	
}
$(document).ready(function(){
	
	$("#fecha_integra").click(function(){

	$("#adicionar_integrante").fadeOut();
	});

	
		
	$("#fecha_adiciona_produtor").click(function(){

	$("#adcionar_produtor").fadeOut();
	});


	});
	
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
</script>
</head>

<body>
	
<div id="adicionar_contato_div">
</div>
<div id="principal">
<?php
	error_reporting(0);
	session_start();
	
	$profileID = $_GET["id"];
	
	if ($profileID == "")
	{
		echo '<script type="text/javascript"> window.location = "../../Erro/index.php"; </script>';
	}
	else
	{
		$conecta = mysql_connect("localhost","root","root");
		$banco = mysql_select_db("banco_tcc_fusa");	
	
		
		$sql = mysql_query("SELECT count(*),(SELECT us.nm_usuario FROM usuarios us 
 inner join fotos fo on (us.cd_usuario = fo.cd_usuario) where (fo.cd_situacao_perfil = 1)
  and ( fo.cd_usuario = ".$profileID." )),(SELECT fo.nm_destino_foto FROM usuarios us
 inner join fotos fo on (us.cd_usuario = fo.cd_usuario) where (fo.cd_situacao_perfil = 1)
  and ( fo.cd_usuario = ".$profileID." )),(SELECT nm_destino_print FROM videos where cd_usuario = ".$profileID." order by cd_video DESC limit 1),(SELECT nm_destino_foto FROM fotos where (cd_situacao_perfil = 0) and (cd_usuario = ".$profileID.") order by dt_foto DESC limit 0,1),(SELECT nm_destino_referencia FROM referencias where cd_usuario = ".$profileID." order by cd_referencia Desc limit 0,1) FROM usuarios where (cd_usuario = ".$profileID.") and
  ( cd_tipo_usuario = 1 );") or die;
	
		while($linha = mysql_fetch_array($sql))
		{
			$ProfileSolo =  $linha[0];
			$fotoPerfil2 =  $linha[2];
			$NomePerfil2 = $linha[1];
			$DestinoVideo = $linha[3];
			$DestinoFotoAlbum = $linha[4];
			$DestinoReferencia = $linha[5];
	 	}
		
		
	
	
	mysql_close($conecta);
		if ($ProfileSolo == 0)
		{
			echo '<script type="text/javascript"> window.location = "../../Erro/index.php"; </script>';
		}
	
		//$_SESSION["contato_add"] = $_GET["id"];
	}
?>

<div id="adcionar_produtor">
<div id="fecha_adiciona_produtor"><p>x</p></div>
    <div id="conteudo_produtor">
    <textarea name="txtTexto" id="txtTexto" cols="35" rows="7"></textarea>
    <?php
    	echo '<input type="button" value="Enviar" id="Enviar_msg" onclick="enviar_convite_produtor(this.name)" name="'.$_GET["id"].'"/>';
	?>
    </div>
</div>



	<div id="adicionar_integrante">
    <div id="fecha_integra"><p>x</p></div>
    <div id="conteudo_integrante">
				 <p class="p_E">Escolha o instrumento: <select name="jumpMenu" id="jumpMenu1" >
                
                			<?php
							
									$conecta = mysql_connect("localhost","root","root");
									$banco = mysql_select_db("banco_tcc_fusa");

	
									
									$sql = mysql_query("SELECT ti.cd_instrumento,ti.nm_instrumento FROM usuarios us  inner join usuarios_instrumentos ui on (us.cd_usuario = ui.cd_usuario)  inner join tipos_instrumentos ti on (ui.cd_instrumento = ti.cd_instrumento)  where us.cd_usuario = ".$_GET["id"].";") or die;
									
									echo '<option  value="valor">---- Selecione ----</option>';
									
									while($linha = mysql_fetch_array($sql))
									{
										echo '<option  value="'.$linha[0].';;e;;'.$linha[1].'">'.$linha[1].'</option>';
									}
									
									mysql_close($conecta);
	
                            ?>
                            
                           
                  </select>
                  <?php
				  
                  	echo '<input type="button" value="Adicionar" id="adicionar_integras" onclick="enviar_convite_banda(this.name)" name="'.$_GET["id"].'" />';
				  ?>
                </p>
                </div>
	</div>
    
    
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
                  
                    <input type="text" id="search_pessoas_input" placeholder="Procurar Usuários"  /> <input type="submit" onclick="procurar_amigos()" value="" id="go_search" />
                 
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

			<div id="inside">
			
                <?php
				for ($indiceI = 1;$indiceI < 10; $indiceI++)
				{
					$Amigos[$indice] = '';
					$AmigosID[$indice] = '';
					$NmAmigos[$indice] = '';
				}
				
				
				
            	echo '		<a href="../Profile/profile.php?id='.$_GET["id"].'"><img id="foto_user" src="/FUSA/HTML/Usuarios/'.$fotoPerfil2.'" width=" 180px" height=" 410px"/></a>';
				
            	echo '<p class="p_amigos">Amigos</p>';
            	echo '<div id="amigos_user">';
				$conecta = mysql_connect("localhost","root","root");
				$banco = mysql_select_db("banco_tcc_fusa");	
                
				$sql = mysql_query("SELECT co.cd_remetente_contato, fo.nm_destino_foto, us.nm_usuario FROM contatos co inner join fotos fo on ( co.cd_remetente_contato = fo.cd_usuario ) inner join usuarios us on (co.cd_remetente_contato = us.cd_usuario) where (cd_receptor_contato = ".$profileID." ) and ( cd_situacao_contato = 1 ) and (fo.cd_situacao_perfil = 1) ;") or die;
	$indice = 0;
				//$concatenar_amigos = "";
				while($linha = mysql_fetch_array($sql))
				{
					$indice++;
					$Amigos[$indice] =  $linha[1];
					$AmigosID[$indice] = $linha[0];
					$NmAmigos[$indice] = $linha[2];
					//$concatenar_amigos .= $linha[0].";;e;;".$linha[1];
	 			}
				
				//$_SESSION["concatenar_amigos"] = $concatenar_amigos;
				//$_SESSION["indice_concatenar_amigos"] = $indice;
				$totalAmigos = '';
				for ( $i=1;$i<9;$i++)
				{
				
           			
					if ($Amigos[$i] != '')
					{
					
						echo '<a href="../Profile/profile.php?id='.$AmigosID[$i].'" >
								<div id="amigo'.$i.'" style="background-image:url(/FUSA/HTML/Usuarios/'.$Amigos[$i].'); " >
								</div>
							</a>';
					}
					else
					{
						echo'<a href="#" ><div id="amigo'.$i.'"></div></a>';
						
					}
					
			
				}
                
                echo '</div>';
				mysql_close($conecta);
			?>
	
			</div>
<div id="infos_user2">
            
		<div id="coluna1">
                <?php 
							echo utf8_encode( $NomePerfil2);
							
							$conecta = mysql_connect("localhost","root","root");
				$banco = mysql_select_db("banco_tcc_fusa");	
                
				$sql = mysql_query("SELECT ti.nm_instrumento FROM usuarios_instrumentos ut inner join tipos_instrumentos ti
on (ut.cd_instrumento = ti.cd_instrumento)  where cd_usuario = ".$_GET["id"].";") or die;

				echo '<div id="job_user"><p>';
				while($linha = mysql_fetch_array($sql))
				{
					echo '- '.$linha[0].'</br>';					
	 			}
				echo '</p></div>';
				
				  
				$sql = mysql_query("SELECT us.nm_usuario,us.cd_usuario FROM usuarios_bandas ub inner join usuarios us
on (ub.cd_banda = us.cd_usuario) where ub.cd_usuario = ".$_GET["id"].";") or die;
				
				echo '  <p class="estatic3"> Banda: </p><div id="banda_user"><p>';
				while($linha = mysql_fetch_array($sql))
				{
					echo '<a href="../../Banda/Profile/bandprofile.php?id='.$linha[1].'">'.$linha[0].'</a>';					
	 			}
				echo ' </p></div>';
				
						?> 
                
             
                <?php
					$sql = mysql_query("SELECT us.nm_usuario FROM propostas pr inner join usuarios us on (pr.cd_produtor = us.cd_usuario)  where (pr.cd_usuario = ".$_GET["id"].")  and (pr.cd_situacao_proposta = 1) ;") or die;
					while($linha = mysql_fetch_array($sql))
					{
						echo '	<p class="estatic3"> Produtora:</p><div id="gravadora_user"><p>'.$linha[0].'</p></div>';					
	 				}
                	
				?>
        </div>                  
        
        <div id="coluna2" >
        	<div id="add_user_div"> 
        	</div>
        </div>
        
        <div id="coluna3">                  
        		<div id="descri_user">
                <p>Lançou seu primeiro álbum em seu país de origem e sempre trouxe referências dos anos 80 em suas músicas, seus principais hits tem a essencia do pop e da música alternativa. Já esteve envolvido em projetos musicais anteriores, incluindo contribuições para musica Rollo Armstrong da banda Faithless. Vencedor do Studio8 International Music Awards na categoria de melhor cantor estreante.  </p>                                    
                </div>
       </div>     
</div>

<div id="caixas_refresh">
<?php
		     $conecta = mysql_connect("localhost","root","root");
		$banco = mysql_select_db("banco_tcc_fusa");	
			 $sql = mysql_query("SELECT count(*),
(SELECT count(*) FROM fotos where (cd_usuario = ".$_GET["id"].") and
 (cd_situacao_perfil = 0)),
(SELECT count(*) FROM recados re where cd_receptor_recado = ".$_GET["id"]."),
(SELECT count(*) FROM referencias where cd_usuario = ".$_GET["id"]."),
(SELECT count(*) FROM agendas where cd_usuario = ".$_GET["id"].")
 FROM videos where cd_usuario = ".$_GET["id"].";") or die;
	
				while($linha = mysql_fetch_array($sql))
				{
					$QtVideos = $linha[0];	
					$QtFotos = $linha[1];				
					$QtLyrics = $linha[2];			
					$QtReferencias = $linha[3];				
					$QtAgendas = $linha[4];
				}
				
				
				mysql_close($conecta);
				
		?>

	<div id="vertical_1">
 
    <?php 
			if ($DestinoVideo == "")
			{
				echo '<div id="VBOX" class="shadow videos_user_imagem" ></div>';
			}
			else
			{
				echo '<div id="VBOX" class="shadow videos_user_imagem" ><img src="'.$DestinoVideo.'" width="171px" height="114px" style="
				border-top-right-radius:15px;	
				border-bottom-right-radius:15px;
				border-bottom-left-radius:15px;
				-moz-border-radius:15px; "/></div>';
			}
			echo '<a href="../usuario_videos/index.php?id='.$_GET["id"].'"><div id="videos_user" class="shadow"><p class="p_link2"> Vídeos </p> <div id="p_number_v">'.  $QtVideos .'</div> </div></a>'; 
	?>
   	 	

    <?php
			
					echo ' <div id="LBOX" class="shadow lyrics_user_imagem"><img src="../../../Design/padrão.jpg"  width="144px" height="92px" style="border-top-right-radius:15px;	
	border-bottom-right-radius:15px;
	border-bottom-left-radius:15px;
	-moz-border-radius:15px; " ></div>';
				
			?>
    	<?php echo '<a href="../lyrics/index.php?id='.$_GET["id"].'"><div id="lyrics_user" class="shadow"> <p class="p_link2"> Lyrics </p>	<div id="p_number_l"> '  .$QtLyrics.' </div>  </div></a>'; ?>
                
	
	</div>
           
		<div id="vertical_2">
		<div id="player_user" class="shadow2">
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
								echo utf8_encode('<div id="musica"><p><a href="#" onclick="play(this.name)"  name="'.$NmDestinoMusica.'+;+'.$NmMusica.'"> '.$NmMusica.' </a></p> </div>');
							echo '</div>';
							$i = 0;
						}
					}		
					
				}
				mysql_close($conecta);
            ?>
            </div>
            
            <div id="player_musica">
           
            	
            </div>
            
        </div>
         
         
        
          <?php
			
					echo ' <div id="ABOX" class="shadow agend_user_imagem"><img src="../../../Design/padrão.jpg"  width="180px" height="118px" style="

	

	border-top-right-radius:15px;	
	border-bottom-right-radius:15px;
	border-bottom-left-radius:15px;
	-moz-border-radius:15px;" ></div>';
				
			?>
                
    	<?php echo '<a href="../agendas/index.php?id='.$_GET["id"].'"><div id="agend_user" class="shadow"><p class="p_link2"> Agenda </p>	<div id="p_number_a"> '. $QtAgendas .'</div></div> </a>'; ?>
     
		</div>
        
				<div id="vertical_3">
                  <?php echo '<a href="../albuns/index.php?id='.$_GET["id"].'"><div id="pics_user" class="shadow"> <p class="p_link2"> Fotos </p>	<div id="p_number_f">'. $QtFotos .'</div>  </div></a>';?>
                <?php
					if ($DestinoFotoAlbum == "")
					{
						echo '<div id="PBOX" class="shadow pics_user_imagem"></div>';
					}
					else
					{
						echo '<div id="PBOX" class="shadow pics_user_imagem"><img src="../../Usuarios/'.$DestinoFotoAlbum.'"  width="171px" height="114px" style="
	border-top-right-radius:15px;	
	border-bottom-right-radius:15px;
	border-bottom-left-radius:15px;
	-moz-border-radius:15px;" ></div>';
					}
                ?>
                
                <?php
					if($DestinoReferencia == "")
					{
						echo '<div id="RBOX" class="shadow references_user_imagem"></div>';
					}
					else
					{
						echo '<div id="RBOX" class="shadow references_user_imagem"><img src="'.$DestinoReferencia.'" width="144px" height="92px" style="border-top-right-radius:15px;	
	border-bottom-right-radius:15px;
	border-bottom-left-radius:15px;
	-moz-border-radius:15px;" ></div>';
					}
                ?>
   				<?php echo '<a href="../referencias/index.php?id='.$_GET["id"].'"> <div id="references_user" class="shadow"><p class="p_link2"> Referências </p> <div id="p_number_r">'.  $QtReferencias .'</div> </div> </a>'; ?>
                    
             
                </div>
                
                    <div id="mostrar_amigos">
    	
    	<?php
			for ($i = 1; $i < $indice+1; $i++ )
			{
				echo utf8_encode('<div id="amigo_div">');
					echo utf8_encode('<a href="../Profile/profile.php?id='.$AmigosID[$i].'">');
						echo utf8_encode('<img src="/FUSA/HTML/Usuarios/'.$Amigos[$i].'" width="40px" height="40px" />'); 
					echo utf8_encode('</a>');
					echo utf8_encode('<a href="../Profile/profile.php?id='.$AmigosID[$i].'">');
						echo utf8_encode($NmAmigos[$i]); 
					echo utf8_encode('</a>');
				echo utf8_encode('</div>');
			}
        ?>
    </div>
 
</div>
</div>
</div>
<div id="rodape">

<a href="../../Rodape/sobreafusa.php" class="float"><p class="space">Sobre a Fusa -</p></a>  
<a href="../../Rodape/produtores.php" class="float"><p class="color">Produtores -</p></a>
<a href="../../Rodape/contato.php" class="float"><p class="color">Contato</p></a>

</div>
<div id="banco" >
</div>


  <div id="pretona"></div>
  <script type="text/javascript">
  $(document).ready(function(){
	  $(".p_amigos").click(function(){
		  $("#mostrar_amigos").show("slow");
		  $("#pretona").fadeIn("slow");
		  });
	  $("#pretona").click(function(){
		  $("#mostrar_amigos").hide("slow");
		   $("#pretona").fadeOut("slow");
		  
		  });
	  });
  </script>
</body>
</html>