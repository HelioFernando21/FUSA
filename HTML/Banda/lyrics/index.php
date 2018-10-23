<?php
ob_start();
session_start();
error_reporting(0);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Band Lyrics - Fusa</title>
<link rel="stylesheet" type="text/css" href="../../../CSS/estilo_bandlyrics.css" />
<link rel="stylesheet" type="text/css" href="../../../CSS/estilo_colors2.css" />
<script type="text/javascript" src="jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="ajax_excluir_comentario.js"></script>

<link rel="stylesheet" type="text/css" href="../../../JavaScript/jquery.alerts.css" />
<script src="../../../JavaScript/jquery.js" type="text/javascript"></script>
<script src="../../../JavaScript/jquery.ui.draggable.js" type="text/javascript"></script>
<script src="../../../JavaScript/jquery.alerts.js" type="text/javascript"></script>

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
	jAlert("É necessario efetuar o login para executar essa função");
}
function incluir_lyrics(v)
	{
		
		var str = document.getElementById("txtTexto").value;
		
		while (str.indexOf("\n") != -1)
		{
			str = str.replace("\n","</br>");
			
		}
		
		while (str.indexOf(" ") != -1)
		{
			str = str.replace(" ","+");
			
		}
		
		pesquisa2(v,str);
		
		document.getElementById("txtTexto").value = "";
		jAlert("Lyric enviado");
		//carregar_lyrics();
	}
	
	function antes_excluir_lyrics(v)
	{
		if(confirm('Deseja excluir esse lyric?'))
    	{
			excluir_lyrics(v);
			jAlert("Lyric excluido com sucesso");
			//carregar_lyrics();
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
	
	
	function pesquisa2(valor,str)
	{
	

		
		
		$(document).ready(function() {


			$("#add_lyrics").load('inserir_lyrics.php?q='+str+'&&id='+valor);
		});
	
 		
	}
	
	function excluir_lyrics(valor)
	{	
	

		
		$(document).ready(function() {


			$("#excluir_lyrics").load('excluir_lyrics.php?e='+valor);
		});
	
	}


function procurar_amigos()
{
	var valor = document.getElementById("search_pessoas_input").value;
	
	if (valor != "")
	{
		window.location = "../amigos/procurar_amigos.php?id="+valor;
	
	}
}
</script>
</head>

<body>
<div id="add_lyrics">
</div>
<div id="excluir_lyrics">
</div>
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
<?php
		
			$lyrics = $_GET["id"];
			if ($lyrics == "")
			{
				echo '<script type="text/javascript"> window.location = "../../Erro/index.php"; </script>';
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
						echo '<script type="text/javascript"> window.location = "../../Erro/index.php"; </script>';
					}
					
			}
        ?>

                <div id="banner">
                <?php
                	echo '<a href="../profile/bandprofile.php?id='.$_GET["id"].'"><img width="1000px" height="265px" src="../../Usuarios/'.$FotoUsuario.'" /></a>';
				?>
                <div id="menu">
                	<?php
						echo '
                            <a href="../usuario_videos/index.php?id='.$_GET["id"].'"><div id="bt1"> <p class="p_link_esq"> Vídeos </p> </div></a>
                            <a href="../albuns/index.php?id='.$_GET["id"].'"><div id="bt2"> <p class="p_link"> Fotos </p> </div></a>
                            <a href="../lyrics/index.php?id='.$_GET["id"].'"><div id="bt3"> <p class="p_link"> Lyrics</p> </div></a>
                            <a href="../referencias/index.php?id='.$_GET["id"].'"><div id="bt4"> <p class="p_link_ref"> Referências</p> </div></a>
                            <a href="../agendas/index.php?id='.$_GET["id"].'"><div id="bt5"> <p class="p_link_dir"> Agenda</p> </div></a>';
					?>
                </div>
                </div>
  	    
<div id="centraliza">
               
	<div id="write_lyric">
	
   				 <?php
        			if ($_SESSION["codigo"] == "")
					{
						echo '<textarea name="txtTexto" id="txtTexto" cols="90" rows="3"></textarea>
        	   	 	
						<input type="submit" value="Enviar" id="EnviarLYRIC" onclick="fazer_login()" />';
					}
					else
					{
        				echo '<textarea name="txtTexto" id="txtTexto" cols="90" rows="3"  placeholder="Digite seu recado"></textarea>
        	   	 	
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
<div id="rodape3">

<a href="../../Rodape/sobreafusa.php" class="float3"><p class="space3">Sobre a Fusa -</p></a>  
<a href="../../Rodape/produtores.php" class="float3"><p class="color3">Produtores -</p></a>
<a href="../../Rodape/contato.php" class="float3"><p class="color3">Contato</p></a>

</div>
      
</div>


</div>



</body>
</html>