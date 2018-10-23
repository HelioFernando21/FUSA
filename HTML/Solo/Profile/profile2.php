<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Profile - Fusa</title>
<link rel="stylesheet" type="text/css" href="../../../CSS/estilo_profile.css" />
<script type="text/javascript" src="../../../JavaScript/jquery-1.7.2.min.js"></script>

<script type="text/javascript">





$(document).ready(function() {
		texto = window.location;
		v = texto.toString();
		valor = v.split("=");
		
		$("#add_user_div").load("situacao_contato.php?id="+valor[1]);

	});
	
	$(document).ready(function() {
       
		document.getElementById("player_musica").innerHTML = ' <audio controls="controls"> <source src="#" type="audio/mpeg"> </audio>' ;
		
	    $("#procurar_amigos_2").click(function(event) {		
		
			  
			var valor = document.getElementById("search_pessoas_input").value;  
			if ( valor == "")
			{
				
				alert("digite um nome");
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
			carregar_contato(valor[0]+";");
		}
	}
	else
	{
		if ("-" == valor[0])
		{
			if (confirm("Deseja excluir esse contato?"))
			{
				excluir_contato(valor[1]+";"+valor[2]);
				
				carregar_contato(valor[0]+";"+valor[2]);
			}
		}
	}
}

function adicionar_contato(valor)
{
	var v = valor.split(";");
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
			document.getElementById("adicionar_contato_div").innerHTML=xmlhttp.responseText;
		
		}
	}

	
	if (v[1] == "s")
	{
		//alert("excluir solo");
		xmlhttp.open("GET","adicionar_contato.php?e="+v[0],true);
		xmlhttp.send();
	}
	else
	{
		if (v[1] == "b")
		{
			//alert("adicionar banda");
			xmlhttp.open("GET","adicionar_contato_banda.php?e="+v[0],true);
			xmlhttp.send();
		}
	}
	
	

}

function excluir_contato(valor)
{
	var v = valor.split(";");
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
			document.getElementById("excluir_contato_div").innerHTML=xmlhttp.responseText;
		
		}
	}
	if (v[1] == "s")
	{
		
		xmlhttp.open("GET","excluir_contato.php?e="+v[0],true);
		xmlhttp.send();
	}
	else
	{
		if (v[1] == "b")
		{
			xmlhttp.open("GET","excluir_contato_banda.php?e="+v[0],true);
			xmlhttp.send();
		}
	}
	
	

}

function carregar_contato(v)
{
	valor = v.split(";");
	if (valor[0] == "+" )
	{
		alert("Convite enviado com sucesso");
	$(document).ready(function() {
		texto = window.location;
		v = texto.toString();
		valor = v.split("=");
		window.location = window.location;
	});
		
	}
	else
	{
		if (valor[0] == "-")
		{
			if ( valor[1] == "b" )
			{
				alert("Integrante excluido com sucesso");
			}
			else
			{
				if ( valor[1] == "s" )
				{
					alert("Contato excluido com sucesso");
				}
			}
			
			$(document).ready(function() {
		texto = window.location;
		v = texto.toString();
		valor = v.split("=");
		window.location = window.location;
	});
			
			
			
		}
	}
}
</script>
</head>

<body>


<div id="principal">
<?php
	error_reporting(0);
	session_start();
	
	$profileID = $_GET["id"];
	
	if ($profileID == '')
	{
		echo '<script type="text/javascript"> alert("pagina nao encontrada"); </script>';
	}
	else
	{
		$conecta = mysql_connect("localhost","root","root");
		$banco = mysql_select_db("banco_tcc_fusa");	
	
		
		$sql = mysql_query("SELECT count(*),(SELECT us.nm_usuario FROM usuarios us 
 inner join fotos fo on (us.cd_usuario = fo.cd_usuario) where (fo.cd_situacao_perfil = 1)
  and ( fo.cd_usuario = ".$profileID." )),(SELECT fo.nm_destino_foto FROM usuarios us
 inner join fotos fo on (us.cd_usuario = fo.cd_usuario) where (fo.cd_situacao_perfil = 1)
  and ( fo.cd_usuario = ".$profileID." ))  FROM usuarios where (cd_usuario = ".$profileID.") and
  ( cd_tipo_usuario = 1 );") or die;
	
		while($linha = mysql_fetch_array($sql))
		{
			$ProfileSolo =  $linha[0];
			$fotoPerfil2 =  $linha[2];
			$NomePerfil2 = $linha[1];
	 	}
		
		
	
	
	mysql_close($conecta);
		if ($ProfileSolo == 0)
		{
			echo '<script type="text/javascript"> alert("pagina nao encontrada"); </script>';
		}
	
		//$_SESSION["contato_add"] = $_GET["id"];
	}
?>

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

			<div id="inside">
			
                <?php
				for ($indiceI = 1;$indiceI < 10; $indiceI++)
				{
					$Amigos[$indice] = '';
					$AmigosID[$indice] = '';
					$NmAmigos[$indice] = '';
				}
				
				
				
            	echo '		<img id="foto_user" src="/FUSA/HTML/Usuarios/'.$fotoPerfil2.'" width=" 180px" height=" 410px"/>';
				
            	echo '<h3 class="p_amigos">Amigos</h3>';
            	echo '<div id="amigos_user">';
				$conecta = mysql_connect("localhost","root","root");
				$banco = mysql_select_db("banco_tcc_fusa");	
                
				$sql = mysql_query("SELECT co.cd_remetente_contato, fo.nm_destino_foto, us.nm_usuario FROM contatos co inner join fotos fo on ( co.cd_remetente_contato = fo.cd_usuario ) inner join usuarios us on (co.cd_remetente_contato = us.cd_usuario) where (cd_receptor_contato = ".$profileID." ) and ( cd_situacao_contato = 1 ) ;") or die;
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
						$totalAmigos = '<a href="profile2.php?id='.$AmigosID[$i].'" ><img src="/FUSA/HTML/Usuarios/'.$Amigos[$i].'" id="amigo'.$i.'" width=" 40px" height=" 40px" /></a>';
					}
					else
					{
						$totalAmigos = '<a href="#" ><img id="amigo'.$i.'" width=" 40px" height=" 40px" /></a>';
					}
					
					echo $totalAmigos;
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
				
				  
				$sql = mysql_query("SELECT us.nm_usuario FROM usuarios_bandas ub inner join usuarios us
on (ub.cd_banda = us.cd_usuario) where ub.cd_usuario = ".$_GET["id"].";") or die;

				echo '  <p class="estatic3"> Banda: </p><div id="banda_user"><p>';
				while($linha = mysql_fetch_array($sql))
				{
					echo $linha[0];					
	 			}
				echo ' </p></div>';
				
						?> 
                
             
                <p class="estatic3"> Gravadora:</p><div id="gravadora_user"><p></p></div>
        </div>                  
        
        <div id="coluna2" >
        	<div id="add_user_div"> 
        	</div>
        </div>
        
        <div id="coluna3">                  
        		<div id="descri_user">
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. </p>                                    
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
    <div id="VBOX"></div>
    <?php echo '<a href="../usuario_videos/videos.php?id='.$_GET["id"].'"><div id="videos_user"><p class="p_link"> Vídeos </p> <p class="p_number_v">'.  $QtVideos .'<p/> </div></a>'; ?>
   	 	
	<div id="LBOX"></div>
    	<?php echo '<a href="../lyrics/lyrics2.php?id='.$_GET["id"].'"><div id="lyrics_user"> <p class="p_link"> Lyrics </p>	<p class="p_number_l">'  .$QtLyrics.' <p/>  </div></a>'; ?>
                
	
	</div>
           
		<div id="vertical_2">
		<div id="player_user">
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
            </div>
            
            <div id="player_musica">
            	
            </div>
            <div id="musica_tocando">
            
            </div>
        </div>
         
         
         <div id="ABOX"></div>
    	<?php echo '<a href="#"><div id="agend_user"><p class="p_link"> Agenda </p>	<p class="p_number_a"> '. $QtAgendas .'<p/></div> </a>'; ?>
     
		</div>
        
				<div id="vertical_3">
               
                <?php echo '<a href="#"><div id="pics_user"> <p class="p_link2"> Fotos </p>	<p class="p_number_f">'. $QtFotos .'<p/>  </div></a>';?>
                 <div id="PBOX"></div>
   	    
         
                         
                
                <div id="RBOX"></div>
   		<?php echo '<a href="../referencias/referencias.php?id='.$_GET["id"].'"> <div id="references_user"><p class="p_link2"> Referências </p> <p class="p_number_r">'.  $QtReferencias .'<p/> </div> </a>'; ?>
                    
             
                </div>
                
                    <div id="mostrar_amigos">
    	
    	<?php
			for ($i = 1; $i < $indice+1; $i++ )
			{
				echo utf8_encode('<div id="amigo_div">');
					echo utf8_encode('<a href="profile2.php?id='.$AmigosID[$i].'">');
						echo utf8_encode('<img src="/FUSA/HTML/Usuarios/'.$Amigos[$i].'" width="40px" height="40px" />'); 
					echo utf8_encode('</a>');
					echo utf8_encode('<a href="profile2.php?id='.$AmigosID[$i].'">');
						echo utf8_encode($NmAmigos[$i]); 
					echo utf8_encode('</a>');
				echo utf8_encode('</div>');
			}
        ?>
    </div>
 
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