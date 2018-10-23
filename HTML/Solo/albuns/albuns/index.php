<?php
ob_start();
session_start();
error_reporting(0);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Fotos</title>



<link rel="stylesheet" type="text/css" href="../../../CSS/estilo_fotos.css" />
<link rel="stylesheet" type="text/css" href="../../../JavaScript/lightbox2.51/lightbox/css/lightbox.css" />

<script type="text/javascript" src="../../../JavaScript/jquery-ui-1.9.0.custom (1)/jquery-ui-1.9.0.custom/js/jquery-1.8.2.js"></script>
<script type="text/javascript" src="../../../JavaScript/jquery.cycle.all.js"></script>
<script type="text/javascript" src="../../../JavaScript/lightbox2.51/lightbox/js/lightbox.js"></script>

<script src="../../../JavaScript/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="../../../JavaScript/jquery-ui.js" type="text/javascript"></script>
<script src="../../../JavaScript/slimScroll.js" type="text/javascript"></script>

<script type="text/javascript">

function excluir_foto(valor)
{
	
	if (confirm("Deseja excluir essa foto?"))
	{

		$(document).ready(function() {
			
				$("#banco").load("excluir_foto.php?e="+valor);
		
			});
		 	
	}
	
}
//excluir_album
function excluir_album(valor)
{
	
	if (confirm("Deseja excluir esse album?"))
	{

		$(document).ready(function() {
			
				$("#banco").load("excluir_album.php?e="+valor);
		
			});
		 	
	}
	
}



</script>

</head>
<body>
<div id="banco">
</div>
<div id="principal">

	<div id="barra">  
    <?php
	if ($_SESSION["codigo"] == "")
	{
		echo  '<a href="index.php?id='.$_GET["id"].'"><div id="Fusa_home"></div></a>';
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
				echo  '<a href="../../Visitante/index.php"><div id="Fusa_home"></div></a>';
			}
		}
	}
	?>
                            
            <div id="procurar_users">
            <form method="post" name="procurar">
            <input type="text" id="search_pessoas_input" /> <input type="submit" value="K" />
            </form>
            </div>
        
            <div id="infos_user">
            		<?php
					$galeria = $_GET["id"];
$_SESSION["galeria"] = $galeria;
					if ($_SESSION["codigo"] == "")
					{
						echo ' <div id="texto_auxiliar">
                					<p>Faça seu login ou <a href="#">cadastre-se!</a></p>
              				  </div>';
					} 
			
				?>
           
                    <div id="logar">
							<?php
							
							if ($_GET["id"] == "")
							{
								echo '<script type="text/javascript"> alert("pagina nao encontrada"); </script>';
							}
							else
							{
										$conecta = mysql_pconnect("localhost","root","root");
										$banco = mysql_select_db("banco_tcc_fusa");
											
										
										
										
												
										$sql = mysql_query("SELECT fo.nm_destino_foto FROM usuarios us inner join fotos fo on (us.cd_usuario = fo.cd_usuario) where ( us.cd_usuario = ".$_GET["id"]." ) and ( fo.cd_situacao_perfil = 1 ) and ( us.cd_tipo_usuario = 1 );") or die;
											
										while($linha = mysql_fetch_array($sql))
										{
											$destinoFotoPerfil = $linha[0];											
										}
										
										mysql_close();
										
										if ($destinoFotoPerfil == "")
										{
											echo '<script type="text/javascript"> alert("pagina nao encontrada"); </script>';
										}
									
							}
							
							
							
							
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
			<a href="profile.php">
            
            	<?php echo '<img id="foto_user" src="../../Usuarios/'.$destinoFotoPerfil.'" />';    ?>
            </a>
            	<p class="p_amigos">Amigos</p>
            	<div id="amigos_user">
                
<?php
			  
				for ($indiceI = 1;$indiceI < 10; $indiceI++)
				{
					$Amigos[$indice] = '';
					$AmigosID[$indice] = '';
					$NmAmigos[$indice] = '';
				}
				
				
				
           
				
            	echo '';
            	echo '';
				$conecta = mysql_connect("localhost","root","root");
				$banco = mysql_select_db("banco_tcc_fusa");	
                
				$sql = mysql_query("SELECT co.cd_remetente_contato, fo.nm_destino_foto, us.nm_usuario FROM contatos co inner join fotos fo on ( co.cd_remetente_contato = fo.cd_usuario ) inner join usuarios us on (co.cd_remetente_contato = us.cd_usuario) where (cd_receptor_contato = ".$_GET["id"]." ) and ( cd_situacao_contato = 1 ) and (fo.cd_situacao_perfil = 1) ;") or die;
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
					$totalAmigos = '';
					
					
           			
					if ($Amigos[$i] != '')
					{
						
						$totalAmigos = '<a href="../Profile/profile.php?id='.$AmigosID[$i].'" ><img src="/FUSA/HTML/Usuarios/'.$Amigos[$i].'" id="amigo'.$i.'" width=" 40px" height=" 40px" /></a>';
					}
					else
					{
						$totalAmigos = '<a href="#" ><img id="amigo'.$i.'" width=" 40px" height=" 40px" /></a>';
					}
					
					echo $totalAmigos;
				}
                
                echo '';
				mysql_close($conecta);
				   
				
			?>
                
                
                
                
                
                </div>
			</div>

<div id="coluna2">
<div id="menu">

<?php
        echo '<a href="../usuario_videos/index.php?id='.$galeria.'"><div id="bt1"> <p class="p_link_esq"> Vídeos </p> </div></a>
        <a href="../albuns/index.php?id='.$galeria.'"><div id="bt2"> <p class="p_link"> Fotos </p> </div></a>
        <a href="../lyrics/index.php?id='.$galeria.'"><div id="bt3"> <p class="p_link"> Lyrics</p> </div></a>
        <a href="../referencias/index.php?id='.$galeria.'"><div id="bt4"> <p class="p_link_ref"> Referências</p> </div></a>
        <a href="../agendas/index.php?id='.$galeria.'"><div id="bt5"> <p class="p_link_dir"> Agenda</p> </div></a>';
		
		?>
</div>

<div id="segura_albuns">
        
        	<div id="caixa_uploud_foto">
            
    		
            
            <?php
					if ( $_SESSION["codigo"] == $_GET["id"] )
					{
						echo '<input type="submit" value="Criar álbum" id="bt_uploud_foto"/>';
					}
            ?>
            
   
            
            </div>     
        <div id="dad"> 
        	<div id="albuns">
<?php 
error_reporting(0);
session_start();


date_default_timezone_set("Brazil/East");
$conecta = mysql_pconnect("localhost","root","root");
$banco = mysql_select_db("banco_tcc_fusa");
	
	$y = 0;
	$g = 0;
	$bd = 0;
	$sgbtn= 0;
	$qt_fotos = 0;
	$listas = 0;
	$w = 0;

		
	$sql = mysql_query("Select cd_album from fotos where (cd_usuario = ".$galeria.") ;") or die;
	
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
		
$sql = mysql_query("Select cd_foto,nm_destino_foto from fotos where (cd_usuario = ".$galeria.") and (cd_album = ".$album[$z].");") or die;
			
			 date("Y-m-d");
			echo '<div id="segura'.$sgbtn.'" class="segura_btn">
			<div id="album'.$album[$z].'" class="album">
		<div id="listas'.$listas.'" class="org_listas">';
		
		
		while($linha = mysql_fetch_array($sql)){	
			
			
			
			
			if ($_SESSION["codigo"] == $galeria)
			{
				echo '<div id="segura_fecha">';
				echo '<div id="deletar_foto" 
				class="deletar_foto" >
				<a class="x"
				onclick="excluir_foto(this.name)"
				name="'.$linha[0].';'.$album[$z].';'.$linha[1].'"  >		
				x
				</a>
				</div>';
			}
			$qt_fotos++;
			echo '<a href="../../Usuarios/'.$linha[1].'" rel="lightbox[grupo'.$g.']" > <img id="foto'.$linha[0].'" name="foto'.$linha[0].'" src="../../Usuarios/'.$linha[1].'" class="img" /></a></div>';
		
		}
		
			echo '
			</div></div>
			<div id="btn_esquerda'.$bd.'" class="btn_direcaoesq"></div>
			
			<div id="btn_direita'.$bd.'" class="btn_direcaodire"></div>
			
			</div>';
			
			if ($_SESSION["codigo"] == $galeria)
			{
		echo '
		<form method="post" enctype="multipart/form-data" action="#" id="form'.$album[$z].'">
		<span class="file-wrapper">
  		<input type="file" name="photo'.$album[$z].'" id="photo'.$album[$z].'" />
  		<span class="button">Adcione uma Foto</span>
		<input type="submit"  id="carregar'.$album[$z].'" value="Enviar'.$album[$z].'"/>';
		
	
						 		 @move_uploaded_file($_FILES["photo".$album[$z]]["tmp_name"],"{$_FILES["arquivo1.$album[$z]"]["name"]}");
   
		echo '
		</span>
		</form>
		
		<div id="segura_fecha_album"><div id="distancia" onclick="excluir_album(this.name)" name="'.$album[$z].'">Excluir Album</div></div>';
			}
			
			$qt_fotos = $qt_fotos * 128.5;
			
			
	echo'<script type="text/javascript">
        		var limite'.$w.' = 128.5;
		$(document).ready(function(){
			
			$("#listas'.$listas.'").css("width","'.$qt_fotos.'");
			
			$(".album").animate({width:"645px"},1500);
			
			
			
			$("#btn_direita'.$bd.'").click(function(){
				
			   if(limite'.$w.' < '.$qt_fotos.' ){
				  
				limite'.$w.' += 128.5;
			     $("#listas'.$listas.'").css("margin-left", "-=128px");	
			  		}
					else{
					
					alert("não ha mais fotos");	
						
						}
			});
			
			$("#btn_esquerda'.$bd.'").click(function(){
				 
			    if(limite'.$w.' > 128.5){
				limite'.$w.' -= 128.5;
			     $("#listas'.$listas.'").css("margin-left", "+=128px");	
			      
			       }else{
					
					alert("começo do album");	
						
						}
			
			});			
        		});

    	</script>';
			$qt_fotos = 0;
			$w++;
			$z++;
			$g++;
			$bd++;
			$sgbtn++;
			$listas++;

	}
	
	while($z < $y && $listas != 0);
	
?>
           
           
           
           </div>
        </div>
</div>

</div>
</div>
</div>

<div id="rodape">
<a href="#" class="c_rodape">Sobre a Fusa</a>
<a href="#" class="c_rodape">Produtores</a>
<a href="#" class="c_rodape">Contato</a>            
</div>





</body>
</html>