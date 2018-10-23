<?php
ob_start();
session_start();
error_reporting(0);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Vídeos - Fusa</title>
<link rel="stylesheet" type="text/css" href="../../../CSS/estilo_videos.css" />
<link rel="stylesheet" type="text/css" href="../../../CSS/estilo_colors.css" />
<script src="../../../JavaScript/jquery-ui.js" type="text/javascript"></script>
<script src="../../../JavaScript/jquery-1.7.2.min.js" type="text/javascript"></script>

<link rel="stylesheet" type="text/css" href="../../../JavaScript/jquery.alerts.css" />
<script src="../../../JavaScript/jquery.js" type="text/javascript"></script>
<script src="../../../JavaScript/jquery.ui.draggable.js" type="text/javascript"></script>
<script src="../../../JavaScript/jquery.alerts.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function() {
$('#carregando').show();
	//alert(jsGet('id')+' oi' );
    	//buscar_referencia(jsGet('id'));
		texto = window.location;
		v = texto.toString();
		valor = v.split("=");
		
		
        $("#conteudo_print_videos").load('buscar_videos.php?id='+valor[1]);
		//alert("passou5");
		
	});
function carregar_videos()
{
	$(document).ready(function() {
			$('#carregando').show();
    	texto = window.location;
		v = texto.toString();
		valor = v.split("=");
        $("#conteudo_print_videos").load('buscar_videos.php?id='+valor[1]);
		
    
	});
}

function antes_excluir(v)
{
	if(confirm('Deseja excluir esse vídeo?'))
    {
		
		excluir_video(v);
		jAlert("Vídeo exluido com sucesso");
		carregar_videos();
	}
}
     
	 
	  function excluir_video(valor)
	  {       
              
                    

			if (window.XMLHttpRequest)
			{
				xmlhttp=new XMLHttpRequest();
			}
			else
			{
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}


			xmlhttp.onreadystatechange=function()
			{
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
					document.getElementById("excluir_videos").innerHTML=xmlhttp.responseText;
		
				}
			}

			xmlhttp.open("GET","excluir_videos.php?e="+valor,true);
			xmlhttp.send();
	
//	var intervalo = setInterval(reloadpagina,1000);
//function reloadpagina() {

//}
//clearInterval(intervalo);


                
			  
			  
			  
			  
	 }
	 
	 
	//$(document).ready(function() {
   // setTimeout("reloadPagina();",1000);
	//function reloadPagina()
	//{
   //     $("#referencias").load("buscar.php");
//	}
//});
function procurar_amigos()
{
	var valor = document.getElementById("search_pessoas_input").value;
	
	if (valor != "")
	{
		window.location = "../amigos/procurar_amigos.php?id="+valor;
	
	}
}

function Procurar_Video()
{
	$(document).ready(function() {
		$('#carregando').show();
    	var texto = window.location;
		var v = texto.toString();
		var valor = v.split("=");

		var Procura = document.getElementById("Procurar_Video").value; 
		while (Procura.indexOf(" ") != -1)
		{
			Procura = Procura.replace(" ","%20");
		}
        $("#conteudo_print_videos").load('buscar_videos.php?id='+valor[1]+'&texto='+Procura);
	});
}

$(document).ready(function() {
		$('#bt_uploud_video').click(function(){
        	$("#videos").load("upar_videos.php?id=3");
		});
});


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

            <input type="text" id="search_pessoas_input" placeholder="Procurar Usuários" /> <input type="submit" id="go_search" onclick="procurar_amigos()" value="" />
           
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
where (us.cd_usuario = ".$usuarioVideo.") and (us.cd_tipo_usuario = 1) and ( fo.cd_situacao_perfil = 1) ;") or die;
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


			<div id="coluna1">
			<?php 
				echo '<a href="../Profile/profile.php?id='.$usuarioVideo.'"><img id="foto_user" src="../../Usuarios/'.$FotoUsuarioVideo.'" ></a>';
			?>
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
					
						echo '<a href="../Profile/profile.php?id='.$AmigosID[$i].'" >
								<div id="amigo'.$i.'" style="background-image:url(/FUSA/HTML/Usuarios/'.$Amigos[$i].'); " >
								</div>
							</a>';
					}
					else
					{
						echo'<a href="#" ><div id="amigo'.$i.'"></div></a>';
						
					}
					
					echo $totalAmigos;
				}
                
                echo '';
				mysql_close($conecta);
				   
				
			?>
                
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

<div id="coluna2">
<div id="menu">
		<?php
       	echo '<a href="../usuario_videos/index.php?id='.$_GET["id"].'"><div id="bt1"> <p class="p_link_esq"> Vídeos </p> </div></a>
        <a href="../albuns/index.php?id='.$_GET["id"].'"><div id="bt2"> <p class="p_link"> Fotos </p> </div></a>
        <a href="../lyrics/index.php?id='.$_GET["id"].'"><div id="bt3"> <p class="p_link"> Lyrics</p> </div></a>
        <a href="../referencias/index.php?id='.$_GET["id"].'"><div id="bt4"> <p class="p_link_ref"> Referências</p> </div></a>
        <a href="../agendas/index.php?id='.$_GET["id"].'"><div id="bt5"> <p class="p_link_dir"> Agenda</p> </div></a>';
		?>
</div>

<div id="segura_conteudo">

			<div id="caixa_uploud_video">
           <?php
			 error_reporting(0);
			if ( $_SESSION["codigo"] == $_GET["id"] )
			{
				echo '<input type="button" id="bt_uploud_video" value="Adicionar Vídeo"/>';
			}
			
        ?>
    	
            </div>
            <input type="text" placeholder="Procurar Vídeos" id="Procurar_Video" onkeyup="Procurar_Video()" onkeydown="Procurar_Video()" onkeypress="Procurar_Video()" />
         
            <div id="videos">          	
				<div id="carregando"><img src="load.gif" /></div> 
				<div id="conteudo_print_videos"></div>                           
            </div>
       
			<div id="excluir_videos"></div>
      
</div>
</div>
</div>
</div>
<div id="rodape">

<a href="../../Rodape/sobreafusa.php" class="float"><p class="space">Sobre a Fusa -</p></a>  
<a href="../../Rodape/produtores.php" class="float"><p class="color">Produtores -</p></a>
<a href="../../Rodape/contato.php" class="float"><p class="color">Contato</p></a>

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