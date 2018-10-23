<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Band Profile - Fusa</title>
<link rel="stylesheet" type="text/css" href="../../../CSS/estilo_bandprofile.css" />
<script type="text/javascript" src="../../../JavaScript/jquery-1.7.2.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
        
		document.getElementById("player").innerHTML = ' <audio controls="controls"> <source src="#" type="audio/mpeg"> </audio>' ;
	
	
});

function play(v)
{
	
	var valor = v.split("+;+"); 
	document.getElementById("player").innerHTML = ' <audio controls="controls"> <source src="'+valor[0]+'" type="audio/mpeg"> </audio>' ;
;
	document.getElementById("musica_tocando").innerHTML = '<p>Tocando '+valor[1]+'</p>';
}
</script>

</head>

<body>

<div id="principal">

	<div id="barra">
    
    <a href="index.php"><div id="Fusa_home"></div></a>
                    
                    <div id="procurar_users">
                    <form method="post" name="procurar">
                    <input type="text" id="search_pessoas_input" /> <input type="submit" value="K" />
                    </form>
                    </div>
                    
                    
    
        <div id="infos_user">
        	<?php
				error_reporting(0);
				session_start();
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
			?>
        
        </div>
    
    
    </div>

<div id="conteudo">

    <div id="horizontal_1">
    <?php
				$idBanda = $_GET["id"];
				if ( $idBanda == "" )
				{
					echo '<script type="text/javascript"> alert("pagina nao encontrada"); </script>';
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
						echo '<script type="text/javascript"> alert("pagina nao encontrada"); </script>';
					}
					else
					{
							$conecta = mysql_connect("localhost","root","root");
							$banco = mysql_select_db("banco_tcc_fusa");	
	
		
							$sql = mysql_query("select us.nm_usuario,te.nm_estilo, fo.nm_destino_foto from  usuarios us inner join usuarios_estilos ue on (us.cd_usuario = ue.cd_usuario) inner join tipos_estilos te on (ue.cd_estilo = te.cd_estilo)
inner join fotos fo on (us.cd_usuario = fo.cd_usuario) where (fo.cd_situacao_perfil = 1) and (us.cd_usuario = ".$_GET["id"].");") or die;
	
							while($linha = mysql_fetch_array($sql))
							{
								$NmUsuarioBanda =  $linha[0];
								$NmEstiloBanda =  $linha[1];
								$NmDestinoFoto = $linha[2];
	 						}
	
	
							mysql_close($conecta);
							
					}
		
				} 
			?>
            <div id="info_esquerda">
            <?php
            	echo '<div id="name_band"><p class="p_name_big">'.$NmUsuarioBanda.'</p></div>';
            	echo '<div id="estilo_band"><p> Estilo: '.$NmEstiloBanda.'</p></div>';
            	echo '<div id="pertence_band"><p> Produtora: Aloha Niggas</p></div>';
            ?>
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
									$totalAmigos = '<a href="../../Solo/Profile/profile.php?id='.$AmigosID[$i].'" ><img src="../../Usuarios/'.$Amigos[$i].'" id="int1" width=" 40px" height=" 40px" /></a>';
								}
								else
								{
									$totalAmigos = '<a href="#" ><img id="int1" width=" 40px" height=" 40px" /></a>';
								}
					
								echo $totalAmigos;
							}
                
						    
           				?>
           

                    </div>     
                    
                    <input type="submit" value="Mais Integrantes" id="more_int" />
                   
                                
            </div>
            <div id="info_direita">
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. </p> 
            
            </div>    
    </div>
    
        <div id="horizontal_2">
         <?php
					//echo $NmDestinoFoto;
					//echo '<img src="../../Usuarios/'.$NmDestinoFoto.'" width="1000px" height="265px" id="foto_perfil_Banda"/>';
         ?>
        		<div id="player_band">
                	<div id="musicas">
        			<?php 
			    		$conecta = mysql_connect("localhost","root","root");
						$banco = mysql_select_db("banco_tcc_fusa");	
						$sql = mysql_query("SELECT nm_destino_musica,nm_musica, te.nm_estilo FROM musicas mu
inner join tipos_estilos te on (mu.cd_estilo = te.cd_estilo)  where (cd_usuario = ".$_GET["id"].");") or die;
	
						while($linha = mysql_fetch_array($sql))
						{
							$NmDestinoMusica = $linha[0];	
							$NmMusica = $linha[1];				
							$NmEstiloMusica = $linha[2];			
							echo '<a href="#" onclick="play(this.name)"  name="'.$NmDestinoMusica.'+;+'.$NmMusica.'"> '.$NmMusica.' </a> </br>';
						}
						mysql_close($conecta);
            		?>
                     <div id="player">
                    </div>
                    
                	<div id="musica_tocando">
                	</div>
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
					
            				echo '	<div id="VBOX"></div>
                   		    <a href="../usuario_videos/bandvideos.php?id='.$_GET["id"].'"><div id="videos_band"><p class="p_link"> Vídeos </p> <p class="p_number_v">'.$qtVideosBanda.'</p></div></a>
                    
                        	<div id="PBOX"></div>
                        	<a href="#"><div id="pics_band"><p class="p_link"> Fotos </p>	<p class="p_number_f">'.$qtFotosBanda.'</p></div></a>
                        
                            <div id="LBOX"></div>    
                            <a href="../lyrics/bandlyrics.php?id='.$_GET["id"].'"><div id="lyrics_band"><p class="p_link_middle"> Lyrics </p>	<p class="p_number_l">'.$qtLyricsBanda.'</p></div></a>
                            
                            <div id="RBOX"></div>        
                            <a href="../referencias/bandreferencias.php?id='.$_GET["id"].'"><div id="references_band"><p class="p_link_2"> Referências </p> <p class="p_number_r">'.$qtReferenciasBanda.'</p></div></a>
                                
                            <div id="ABOX"></div>            
                            <a href="#"><div id="agend_band"><p class="p_link_2"> Agenda </p>	<p class="p_number_a">'.$qtAgendaBanda.'</p></div></a>';
					?>
            
            </div>

</div>

<div id="rodape">
<div id="caixa_rodape">            
<a href="#" class="c_rodape">Sobre a Fusa</a>
<a href="#" class="c_rodape">Produtores</a>
<a href="#" class="c_rodape">Contato</a>
</div>             
</div>

</div>
</body>
</html>