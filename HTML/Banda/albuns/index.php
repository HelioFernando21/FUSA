<?php
ob_start();
session_start();
error_reporting(0);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Fotos - Fusa</title>
<link rel="stylesheet" type="text/css" href="../../../CSS/estilo_bandfotos.css" />
<link rel="stylesheet" type="text/css" href="../../../JavaScript/lightbox2.51/lightbox/css/lightbox.css" />

<script type="text/javascript" src="../../../JavaScript/jquery-ui-1.9.0.custom (1)/jquery-ui-1.9.0.custom/js/jquery-1.8.2.js"></script>
<script type="text/javascript" src="../../../JavaScript/jquery.cycle.all.js"></script>
<script type="text/javascript" src="../../../JavaScript/lightbox2.51/lightbox/js/lightbox.js"></script>

<link rel="stylesheet" type="text/css" href="../../JavaScript/jquery.alerts.css" />
<script src="../../JavaScript/jquery.js" type="text/javascript"></script>
<script src="../../JavaScript/jquery.ui.draggable.js" type="text/javascript"></script>
<script src="../../JavaScript/jquery.alerts.js" type="text/javascript"></script>

<script src="../../../JavaScript/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="../../../JavaScript/jquery-ui.js" type="text/javascript"></script>

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
	
	if (confirm("Deseja excluir esse álbum?"))
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
<?php
		$usuarioVideo = $_GET["id"];
		if ( $usuarioVideo == "" )
		{
			echo '<script type="text/javascript"> window.location = "../../Erro/index.php"; </script>';
		}
		else
		{
			$conecta = mysql_connect("localhost","root","root");
			$banco = mysql_select_db("banco_tcc_fusa");
					
			
	
	
			$sql = mysql_query("SELECT fo.nm_destino_foto FROM usuarios us inner join fotos fo on (us.cd_usuario = fo.cd_usuario)
where (us.cd_usuario = ".$usuarioVideo.") and (us.cd_tipo_usuario = 2) and ( fo.cd_situacao_perfil = 1 );") or die;
			$FotoUsuarioVideo = "";
			while($linha = mysql_fetch_array($sql))
			{
				$FotoUsuarioVideo =  $linha[0];
			}
					
			mysql_close($conecta);
			
			if ( $FotoUsuarioVideo == "" )
			{
				echo '<script type="text/javascript"> window.location = "../../Erro/index.php"; </script>';
			}

		}
    ?>

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
 
            <input type="text" id="search_pessoas_input" placeholder="Procurar Usuários" /> <input type="submit" onclick="procurar_amigos()" value="" id="go_search" />
    
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

                <div id="banner">
                <?php
echo '<a href="../profile/bandprofile.php?id='.$_GET["id"].'"><img width="1000px" height="265px" src="../../Usuarios/'.$FotoUsuarioVideo.'" /></a>';				?>
                <div id="menu">
                	<?php
					
						echo '
                            <a href="../usuario_videos/index.php?id='.$_GET["id"].'"><div id="bt1"> <p class="p_link_esq"> Vídeos </p> </div></a>
                            <a href="../albuns/index.php?id='.$_GET["id"].'""><div id="bt2"> <p class="p_link"> Fotos </p> </div></a>
                            <a href="../lyrics/index.php?id='.$_GET["id"].'"><div id="bt3"> <p class="p_link"> Lyrics</p> </div></a>
                            <a href="../referencias/index.php?id='.$_GET["id"].'"><div id="bt4"> <p class="p_link_ref"> Referências</p> </div></a>
                            <a href="../agendas/index.php?id='.$_GET["id"].'"><div id="bt5"> <p class="p_link_dir"> Agenda</p> </div></a>';
					?>
                </div>
                </div>
  	       

        
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
			
            <div id="rodape5">

            <a href="../../Rodape/sobreafusa.php" class="float5"><p class="space5">Sobre a Fusa -</p></a>  
            <a href="../../Rodape/produtores.php" class="float5"><p class="color5">Produtores -</p></a>
            <a href="../../Rodape/contato.php" class="float5"><p class="color5">Contato</p></a>
            
            </div> 


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
		
									$conecta = mysql_pconnect("localhost","root","root");
									$banco = mysql_select_db("banco_tcc_fusa");
$sql = mysql_query("Select cd_foto,nm_destino_foto from fotos where (cd_usuario = ".$galeria.") and (cd_album = ".$album[$z].");") or die;
			
			 date("Y-m-d");
			
			 if ($_SESSION["codigo"] == $galeria)
			{
		echo '
		<form method="post" enctype="multipart/form-data" action="#" id="form'.$album[$z].'">
		<span class="file-wrapper">
  		<input type="file" name="photo'.$album[$z].'" id="photo'.$album[$z].'" />
  		<span class="button"></span></span>
		<input type="submit" class="envia"  id="carregar'.$album[$z].'" value="" />';
		
	$photo = "photo".$album[$z];
								 $imagem = $_FILES[$photo]["type"] ;
								 if ($imagem != "")
								 {
									 
						 		 	
									$conecta = mysql_pconnect("localhost","root","root");
									$banco = mysql_select_db("banco_tcc_fusa");
									$sql = mysql_query("SELECT max(cd_foto)+1,(SELECT count(*) FROM fotos where (cd_album = ".$album[$z].") and (cd_situacao_perfil = 2)),(SELECT nm_destino_foto FROM fotos where (cd_album = ".$album[$z].") and (cd_situacao_perfil = 2)) FROM fotos ;") or die;
	
									while($linha = mysql_fetch_array($sql))
									{
										$maximo = $linha[0];
										$cd_situacao = $linha[1];
										$Destino_foto_2 = $linha[2];
									}
									
									 if ($cd_situacao == 1)
									 {
										 $sql = mysql_query("UPDATE fotos SET cd_situacao_perfil = 0  where (cd_album = ".$album[$z].") and (cd_situacao_perfil = 2) ;") or die;
									 }
									 else
									 {
										  
										  
										  @move_uploaded_file($_FILES[$photo]["tmp_name"],"../../Usuarios/".$_GET["id"]."/HTML/albuns/".$album[$z]."/{$_FILES["$photo"]["name"]}");
						 		
										  rename("../../Usuarios/".$_GET["id"]."/HTML/albuns/".$album[$z]."/".$_FILES[$photo]["name"],"../../Usuarios/".$_GET["id"]."/HTML/albuns/".$album[$z]."/".$maximo.".jpg");
											
										  $sql = mysql_query("insert into fotos values (".$maximo.",'".$_GET["id"]."/HTML/albuns/".$album[$z]."/".$maximo.".jpg','fotos',".$_GET["id"].",".$album[$z].",0,date(now()));") or die;
										
										echo '<script type="text/javascript"> $(document).ready(function() {
			
				window.location = window.location;
			
		
			}); </script>';
									 }
									 
								 }
								 
								 
   
		echo '
		
		</form>
		
		<div id="segura_fecha_album"><div id="distancia" onclick="excluir_album(this.name)" name="'.$album[$z].'">.</div></div>';
			}             
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
				$qt_fotos++;
			echo '<a href="../../Usuarios/'.$linha[1].'" rel="lightbox[grupo'.$g.']" > <img id="foto'.$linha[0].'" name="foto'.$linha[0].'" src="../../Usuarios/'.$linha[1].'" class="img" /></a></div>';
			}
			else
			{
				$qt_fotos++;
			echo '<a href="../../Usuarios/'.$linha[1].'" rel="lightbox[grupo'.$g.']" > <img id="foto'.$linha[0].'" name="foto'.$linha[0].'" src="../../Usuarios/'.$linha[1].'" class="img" /></a>';
			}
			
		
		}
		
			echo '
			</div></div>
			<div id="btn_esquerda'.$bd.'" class="btn_direcaoesq"></div>
			
			<div id="btn_direita'.$bd.'" class="btn_direcaodire"></div>
			
			</div>';
			
			
			
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
					
			});
			
			$("#btn_esquerda'.$bd.'").click(function(){
				 
			    if(limite'.$w.' > 128.5){
				limite'.$w.' -= 128.5;
			     $("#listas'.$listas.'").css("margin-left", "+=128px");	
			      
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
</body>
</html>
