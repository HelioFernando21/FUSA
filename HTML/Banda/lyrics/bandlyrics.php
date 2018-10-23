<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Band Lyrics - Fusa</title>
<link rel="stylesheet" type="text/css" href="../../../CSS/estilo_bandlyrics.css" />
<script type="text/javascript" src="jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="ajax_excluir_comentario.js"></script>

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
					
					$_SESSION["lyrics"] = $lyrics;
	
	
					$sql = mysql_query("SELECT count(*),us.cd_usuario,fo.nm_destino_foto FROM usuarios us inner join fotos fo on (us.cd_usuario = fo.cd_usuario) where (us.cd_usuario = ".$lyrics.") and ( us.cd_tipo_usuario = 2 ) and (cd_situacao_perfil = 1) group by us.cd_usuario;") or die;
					$valorQT = 0;
					while($linha = mysql_fetch_array($sql))
					{
						$valorQT =  $linha[0];
						$cdUsuario = $linha[1];
						$FotoUsuario = $linha[2];
				
 					}
					
					$_SESSION["atualizacao_lyrics"] = $cdUsuario;
					
					mysql_close($conecta);
					
					if( $valorQT == 0 )
					{
						echo '<script type="text/javascript"> alert("pagina nao encontrada");  </script>';
					}
					
			}
        ?>

                <div id="banner">
                <?php
                	echo '<a href="bandprofile.php"><img src="../../Usuarios/'.$FotoUsuario.'" /></a>';
				?>
                <div id="menu">
                            <a href="bandvideos.php"><div id="bt1"> <p class="p_link_esq"> Vídeos </p> </div></a>
                            <a href="bandfotos.php"><div id="bt2"> <p class="p_link"> Fotos </p> </div></a>
                            <a href="bandlyrics.php"><div id="bt3"> <p class="p_link"> Lyrics</p> </div></a>
                            <a href="bandreferencias.php"><div id="bt4"> <p class="p_link_ref"> Referências</p> </div></a>
                            <a href="bandagenda.php"><div id="bt5"> <p class="p_link_dir"> Agenda</p> </div></a>
                </div>
                </div>
  	    
<div id="centraliza">
               
	<div id="write_lyric">
	
   				 <?php
        			if ($_SESSION["codigo"] == "")
					{
						echo '<textarea name="txtTexto" id="txtTexto" cols="90" rows="3"></textarea>
        	   	 	
						<input type="submit" value="Enviar" onclick="fazer_login()" />';
					}
					else
					{
        				echo '<textarea name="txtTexto" id="txtTexto" cols="90" rows="3"></textarea>
        	   	 	
						<input type="submit" value="Enviar" id="EnviarLYRIC" onclick="incluir_lyrics('.$_GET["id"].')" />';
					}
				?>       
	</div>
        
        <div id="lyrics">
        
          <div id="carregando">
				<img src="load.gif" />
			</div>
            
        		<div id="Lyric_1">   
                
        		                      
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
</div>
</body>
</html>