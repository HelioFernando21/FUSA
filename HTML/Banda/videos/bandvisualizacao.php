<?php
ob_start();
session_start();
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Visualização - Fusa</title>
<link rel="stylesheet" type="text/css" href="../../../CSS/estilo_bandvisu.css" />

<script src="../../../JavaScript/jquery-ui.js" type="text/javascript"></script>
<script src="../../../JavaScript/slimScroll.js" type="text/javascript"></script>
<script type="text/javascript" src="ajax.js"></script>
<script type="text/javascript" src="ajax_excluir_comentario.js"></script>
<script type="text/javascript" src="jquery-1.7.2.min.js"></script>

<script type="text/javascript">
//$(document).ready(function() {
//    $("input[type=submit]").click(function(event) {
//        //    });
//	$("a").click(function(event) {
//        $("#recados").load('recados.php',aviso());
//    });
//});
//function aviso(){
//    alert('O conteúdo será carregado agora!');
//}
//
function fazer_login()
{
	alert("É necessario efetuar o login para executar essa função");
}
$(document).ready(function() {
	texto = window.location;
		v = texto.toString();
		valor = v.split("=");
	
	$("#recados").load('recados.php?id='+valor[1]);	
	$("#curtidas").load('curtidas.php?id='+valor[1]);	
	$('#carregando').show();
	
	});
        			
	  //  $("#clicar_votar").click(function(event) {		
     //   $("#clicar_votar").load('votar.php');	    
	
	
//});



function clicar_votar_2(v)
{
	
	votar(v);
	alert("curtido com sucesso");
	carregar_votar();
}



function votar(valor)
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
			document.getElementById("clicar_votar").innerHTML=xmlhttp.responseText;
		
		}
	}

	xmlhttp.open("GET","votar.php?e="+valor,true);
	xmlhttp.send();
	
	
}
//
//function aviso2(){
//    alert('O aviso2');
//}
//
//
//	
//	
//


function incluir_recado(v)
{	
	pesquisa(v);
	alert('comentario efetuado com sucesso');
	document.getElementById("txtTexto").value = "";
	carregar();
	
}
function carregar()
{
	$(document).ready(function() {
		texto = window.location;
		v = texto.toString();
		valor = v.split("=");
	
		//$('#carregando').show();
		$("#recados").load('recados.php?id='+valor[1]);
		//$('#carregando').show();
	});

}

function carregar_votar()
{
	
	$(document).ready(function() {
	texto = window.location;
		v = texto.toString();
		valor = v.split("=");
	$("#curtidas").load('curtidas.php?id='+valor[1]);	
	});
	//alert("carregou curtir");	
}

function pesquisa(valor)
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
		document.getElementById("curtir").innerHTML="";
		return;
	}

	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("curtir").innerHTML=xmlhttp.responseText;
		
		}
	}

	xmlhttp.open("GET","inserir_recado.php?q="+str+"&valor="+valor,true);
	xmlhttp.send();
	
	
 		
}

function excluir_Recado(valor)
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
			document.getElementById("excluir_comentario").innerHTML=xmlhttp.responseText;
		
		}
	}

	xmlhttp.open("GET","excluir.php?e="+valor,true);
	xmlhttp.send();
	
	
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

<div id="principal">

	<div id="barra">  
            <a href="index.php"><div id="Fusa_home"></div></a>
                            
            <div id="procurar_users">
            <form method="post" name="procurar">
            <input type="text" id="search_pessoas_input" /> <input type="submit" value="" id="go_search" />
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
			  //echo 'oi msm';
			  
			?>

            </div>
    </div>
    

<div id="conteudo">
<?php
	error_reporting(0);
			$codigo = $_GET["id"];
			
				if ( $codigo == "" )
				{
					echo '<script type="text/javascript"> alert("Vídeo não encontrado"); </script>';
					
				}
				else
				{
					$conecta = mysql_connect("localhost","root","root");
					$banco = mysql_select_db("banco_tcc_fusa");
					
			
	
	
					$sql = mysql_query("SELECT vi.nm_destino_video, us.cd_tipo_usuario, us.cd_usuario, vi.nm_video, fo.nm_Destino_foto FROM videos vi inner join usuarios us on (vi.cd_usuario = us.cd_usuario) inner join fotos fo on (us.cd_usuario = fo.cd_usuario) where (cd_video = ".$codigo." ) and (us.cd_tipo_usuario = 2) and (fo.cd_situacao_perfil = 1) ;") or die;
					$bdDestino = "";
					while($linha = mysql_fetch_array($sql))
					{
						$bdDestino =  $linha[0];
						$cdUsuario = $linha[2];
						$NmVideo = $linha[3];
						$FotoPerfil = $linha[4];
				
 					}
					//$_SESSION["atualizacao_comentario_video"] = $cdUsuario;
					
					
					mysql_close($conecta);
				}
	?>



                <div id="banner">
                <?php echo '<a href="../Profile/bandprofile.php?id='.$cdUsuario.'"><img src="../../Usuarios/'.$FotoPerfil.'" width="995px" height="265px" /></a> '; ?>


                <div id="menu">
                	<?php
						echo '
                            <a href="../usuario_videos/index.php?id='.$cdUsuario.'"><div id="bt1"> <p class="p_link_esq"> Vídeos </p> </div></a>
                            <a href="bandfotos.php"><div id="bt2"> <p class="p_link"> Fotos </p> </div></a>
                            <a href="../lyrics/index.php?id='.$cdUsuario.'"><div id="bt3"> <p class="p_link"> Lyrics</p> </div></a>
                            <a href="../referencias/index.php?id='.$cdUsuario.'"><div id="bt4"> <p class="p_link_ref"> Referências</p> </div></a>
                            <a href="../agendas/index.php?id='.$cdUsuario.'"><div id="bt5"> <p class="p_link_dir"> Agenda</p> </div></a>';
					?>
                </div>
                </div>
                
<div id="segura_conteudo">
	<div id="title_video"><p class="p_name_big"><?php echo utf8_encode( $NmVideo);  ?></p></div>
    <div id="video">
    		<?php
		
					
					if ( $bdDestino == "" )
					{
						echo '<script type="text/javascript"> alert("Vídeo não encontrado"); </script>';
					}
					else
					{
						echo '  <video width="640" height="390" controls="controls">
							    <source src="'.$bdDestino.'" type="video/mp4" />  
								</video>';
								
								
					}
					
			
				
				
				echo'<script type="text/javascript">
			  			function antes_excluir_Recado(v)
						{
							if(confirm("Deseja excluir esse comentario ?"))
    						{
								valor = v +";;e;;"+"'.$_GET["id"].'"+";;e;;"+"'.$cdUsuario.'";
								
								excluir_Recado(valor);
								alert("excluido com sucesso");
								carregar();
							}
						} 
					</script>';

        ?>
        	
    
    
    </div>
    <div id="especificacoes">
    	
         <div id="curtir">
        	
        	</div>
               
            <?php
					
					if ($_SESSION["login"] == "")
					{
						echo 	'<a id="clicar_votar" onclick="fazer_login()" href="#"><div id="gostei2"></div></a>';
					}
					else
					{
        				echo 	'<a id="clicar_votar" name="'.$_SESSION["codigo"].';;e;;'.$cdUsuario.';;e;;'.$_GET["id"].'" onclick="clicar_votar_2(this.name)" href="#"><div id="gostei2"></div></a>';
					}
				?>
        <div id="nums_gostei">
    
       	    <div class="p_nums" id="curtidas">
        	</div>
        </div>
      
        <div id="nums_visualizacoes">
        <p class="p_nums"></p>
        </div>
    </div>
	<div id="descricao_video">
    <div id="descri">
    <p>Lalalalalalala~~ Lalalalalalala~~ Lalalalalalala~~ Lalalalalalala~~ Lalalalalalala~~ Lalalalalalala~~ Lalalalalalala~~ Lalalalalalala~~  Lalalalalalala~~ Lalalalalalala~~ Lalalalalalala~~ Lalalalalalala~~ Lalalalalalala~~ Lalalalalalala~~ Lalalalalalala~~ Lalalalalalala~~  Lalalalalalala~~ Lalalalalalala~~ Lalalalalalala~~ Lalalalalalala~~ Lalalalalalala~~ Lalalalalalala~~ Lalalalalalala~~ Lalalalalalala~~  Lalalalalalala~~ Lalalalalalala~~ Lalalalalalala~~ Lalalalalalala~~ Lalalalalalala~~ Lalalalalalala~~ Lalalalalalala~~ Lalalalalalala~~  Lalalalalalala~~ Lalalalalalala~~ Lalalalalalala~~ Lalalalalalala~~ Lalalalalalala~~ Lalalalalalala~~ Lalalalalalala~~ Lalalalalalala~~  Lalalalalalala~~ Lalalalalalala~~ Lalalalalalala~~ Lalalalalalala~~ Lalalalalalala~~ Lalalalalalala~~ Lalalalalalala~~ Lalalalalalala~~  Lalalalalalala~~ Lalalalalalala~~ Lalalalalalala~~ Lalalalalalala~~ Lalalalalalala~~ Lalalalalalala~~ Lalalalalalala~~ Lalalalalalala~~  </p>
    </div>
    
    <a href="#"><div id="barrinha"></div></a>
    
    </div>      	
            <div id="comentar_video">
            <?php 
				
						if ($_SESSION["tipo"] == 1)
						{
							echo '<a href="../Profile/profile.php?id='.$_SESSION["codigo"].'"><img  id="c11" src="../../Usuarios/'.$_SESSION["foto_perfil"].'"  /></a>';
						}
						else
						{
							if ($_SESSION["tipo"] == 2)
							{
								echo '<a href="../../Banda/Profile/profile.php?id='.$_SESSION["codigo"].'"><img  id="c11" src="../../Usuarios/'.$_SESSION["foto_perfil"].'"  /></a>';
							}
							
						}
			
		 ?>
  
        <?php
        		if ($_SESSION["login"] == NULL)
				{
					echo'					
        			<div id="comentar"><textarea name="txtTexto" id="txtTexto" cols="63" rows="2"></textarea></div>
				
            		<input type="submit" id="bt_enviar" value="Enviar" onclick="fazer_login()" />';
				}
				else
				{			
					echo'
					
        			<textarea name="txtTexto" id="txtTexto" cols="63" rows="2"></textarea>
				
            		<input type="submit" id="bt_enviar" value="Enviar" name="'.$_GET["id"].';;e;;;;e;;'.$cdUsuario.'" onclick="incluir_recado(this.name)" />';
				}
			?>
          
   			</div>
            
            <div id="comentarios">
       		    <div id="carregando">
					<img src="load.gif" />
				</div>
                 <div id="recados">
        		
                    
                </div>  
        		
                    
                   
                    
                   
			</div>  

  <div id="excluir_comentario">
      </div> 

<div id="rodape">
<a href="#" class="c_rodape">Sobre a Fusa</a>
<a href="#" class="c_rodape">Produtores</a>
<a href="#" class="c_rodape">Contato</a>
</div>
              
</div>                
</div>
</div>

<div id="visualizacao">
    </div>
    
 <div id="div_clicar_votar">
        	
        </div>

<script>

	$('#barrinha').click(function(){		
   		$('#descri').css({
			height:'auto'
			});
});


$(function(){			  
  $('#comentarios').slimscroll({
	  width: '100%',
	  height: '100%',
	  distance: '5px', 
	  start: 'top',
	  alwaysVisible: false
  });			  
 });

</script>

</body>
</html>