<?php
ob_start();
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lyrics</title>
<link rel="stylesheet" type="text/css" href="../../../CSS/estilo_lyrics.css" />

<script src="../../../JavaScript/jquery-ui.js" type="text/javascript"></script>
<script src="../../../JavaScript/slimScroll.js" type="text/javascript"></script>

<script src="../../../JavaScript/jquery-1.7.2.min.js" type="text/javascript"></script>
</head>

<script type="text/javascript">

$(document).ready(function() {
	texto = window.location;
		v = texto.toString();
		valor = v.split("=");
	
	
	$("#lyrics").load('bd_lyrics.php?id='+valor[1]);	
	$('#carregando').show();
	
	});
	
function fazer_login()
{
	alert("É necessario efetuar o login para executar essa função");
}
function incluir_lyrics(v)
	{
		
		pesquisa2(v);
		alert("Lyrics Cadastrado com sucesso");
		carregar_lyrics();
	}
	
	function antes_excluir_lyrics(v)
	{
		if(confirm('Deseja excluir esse lyrics'))
    	{
			excluir_lyrics(v);
			alert("Lyrics excluido com sucesso");
			carregar_lyrics();
		}
	}
	
	function carregar_lyrics()
	{
		$(document).ready(function() {
			texto = window.location;
		v = texto.toString();
		valor = v.split("=");

			$("#lyrics").load('bd_lyrics.php?id='+valor[1]);
		});
		

	}
	
	
	function pesquisa2(valor)
	{
		var str = document.getElementById("txtTexto").value;

		if (window.XMLHttpRequest)
		{
			xmlhttp=new XMLHttpRequest();
		}
		else
		{
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}

		if (str.length==0)
		{ 
			document.getElementById("add_lyrics").innerHTML="";
			return;
		}

		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("add_lyrics").innerHTML=xmlhttp.responseText;
		
			}
		}

		xmlhttp.open("GET","inserir_lyrics.php?q="+str+"&id="+valor,true);
		xmlhttp.send();
	
	
 		
	}
	
	function excluir_lyrics(valor)
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
				document.getElementById("excluir_lyrics").innerHTML=xmlhttp.responseText;
			
			}
		}

		xmlhttp.open("GET","excluir_lyrics.php?e="+valor,true);
		xmlhttp.send();
	
	
	}

</script>


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
        <?php
		
			$lyrics = $_GET["id"];
			if ($lyrics == "")
			{
				echo '<script type="text/javascript"> alert("pagina nao encontrada"); </script>';	
			}
			else
			{
				
					$conecta = mysql_connect("localhost","root","root");
					$banco = mysql_select_db("banco_tcc_fusa");
					
				
	
	
					$sql = mysql_query("SELECT count(*),us.cd_usuario,fo.nm_destino_foto FROM usuarios us
inner join fotos fo on (us.cd_usuario = fo.cd_usuario)
where (us.cd_usuario = ".$lyrics.") and ( us.cd_tipo_usuario = 1 ) and (cd_situacao_perfil = 1) group by us.cd_usuario;") or die;
					$valorQT = 0;
					while($linha = mysql_fetch_array($sql))
					{
						$valorQT =  $linha[0];
						$cdUsuario = $linha[1];
						$NmDestinoFoto = $linha[2];
				
 					}
					
					
					
					mysql_close($conecta);
					
					if( $valorQT == 0 )
					{
						echo '<script type="text/javascript"> alert("pagina nao encontrada");  </script>';
					}
					
			}
        ?>

			<div id="coluna1">
           <?php
			echo '	<a href="../Profile/profile.php?id='.$cdUsuario.'"><img src="../../Usuarios/'.$NmDestinoFoto.'" id="foto_user" width="180px" height="410px"  /></a >';
            ?>
           <h3 class="p_amigos">Amigos</h3>
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
                
				$sql = mysql_query("SELECT co.cd_remetente_contato, fo.nm_destino_foto, us.nm_usuario FROM contatos co inner join fotos fo on ( co.cd_remetente_contato = fo.cd_usuario ) inner join usuarios us on (co.cd_remetente_contato = us.cd_usuario) where (cd_receptor_contato = ".$cdUsuario." ) and ( cd_situacao_contato = 1 ) ;") or die;
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
        <a href="videos.php"><div id="bt1"> <p class="p_link_esq"> Vídeos </p> </div></a>
        <a href="fotos.php"><div id="bt2"> <p class="p_link"> Fotos </p> </div></a>
        <a href="lyrics.php"><div id="bt3"> <p class="p_link"> Lyrics</p> </div></a>
        <a href="referencias.php"><div id="bt4"> <p class="p_link_ref"> Referências</p> </div></a>
        <a href="agenda.php"><div id="bt5"> <p class="p_link_dir"> Agenda</p> </div></a>
</div> 

<div id="segura_conteudo">

        <div id="write_lyric">
 
        
        <?php
        			if ($_SESSION["codigo"] == "")
					{
						echo '<textarea name="txtTexto" id="txtTexto" cols="90" rows="3"></textarea>
        	   	 	
						<input type="submit" value="Enviar" id="EnviarLYRIC" onclick="fazer_login()" />';
					}
					else
					{
        				echo '<textarea name="txtTexto" id="txtTexto" cols="90" rows="3"></textarea>
        	   	 	
						<input type="submit" value="Enviar" id="EnviarLYRIC" onclick="incluir_lyrics('.$_GET["id"].')" />';
					}
		?>
        </div>
        
     
           
            
            <div id="add_lyrics">
            </div>
            
            <div id="excluir_lyrics">
            </div>
        
        <div id="lyrics">
             <div id="carregando">
				<img src="load.gif" />
			</div>
       
            				                
        </div>
        
</div>
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

<script>

$(function(){			  
  $('#lyrics').slimscroll({
	  width: '804px',
	  height: '95%',
	  distance: '5px', 
	  alwaysVisible: false
  });			  
 });

</script>

</body>
</html>