<?php
ob_start();
session_start();
error_reporting(0);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Visualização - Fusa</title>
<link rel="stylesheet" type="text/css" href="../../../CSS/estilo_bandvisu.css" />
<link rel="stylesheet" type="text/css" href="../../../CSS/estilo_colors2.css" />

<script src="../../../JavaScript/jquery-ui.js" type="text/javascript"></script>
<script type="text/javascript" src="ajax.js"></script>
<script type="text/javascript" src="ajax_excluir_comentario.js"></script>
<script type="text/javascript" src="jquery-1.7.2.min.js"></script>

<link rel="stylesheet" type="text/css" href="../../../JavaScript/jquery.alerts.css" />
<script src="../../../JavaScript/jquery.js" type="text/javascript"></script>
<script src="../../../JavaScript/jquery.ui.draggable.js" type="text/javascript"></script>
<script src="../../../JavaScript/jquery.alerts.js" type="text/javascript"></script>

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
	jAlert("É necessario efetuar o login para executar essa função");
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
	jAlert("Curtido com sucesso!");
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
	var str = document.getElementById("txtTexto").value;
	while (str.indexOf("\n") != -1)
		{
			str = str.replace("\n","</br>");
			
		}

	pesquisa(v,str);
	jAlert('Comentario efetuado com sucesso');
	document.getElementById("txtTexto").value = "";
	//carregar();
	
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

function pesquisa(valor,str)
{
	while (str.indexOf("\n") != -1)
	{
		str = str.replace("\n","</br>");
		
	}
	
	while (str.indexOf(" ") != -1)
	{
		str = str.replace(" ","+");
		
	}
	
	$(document).ready(function() {
	
	$("#curtir").load('inserir_recado.php?q='+str+'&valor='+valor);	
	
	});
 		
}

function excluir_Recado(valor)
{

	
	
	$(document).ready(function() {
	
	$("#curtir").load('excluir.php?e='+valor);	
	
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
            <input type="text" id="search_pessoas_input" placeholder="Procurar Usuários"/> <input type="submit" value="" id="go_search"  onclick="procurar_amigos()" />
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
	error_reporting(0);
			$codigo = $_GET["id"];
			
				if ( $codigo == "" )
				{
					echo '<script type="text/javascript"> window.location = "../../Erro/index.php"; </script>';
					
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
                            <a href="../albuns/index.php?id='.$_GET["id"].'"><div id="bt2"> <p class="p_link"> Fotos </p> </div></a>
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
						echo '<script type="text/javascript"> window.location = "../../Erro/index.php"; </script>';
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
							if(confirm("Deseja excluir esse comentário ?"))
    						{
								valor = v +";;e;;"+"'.$_GET["id"].'"+";;e;;"+"'.$cdUsuario.'";
								
								excluir_Recado(valor);
								jAlert("Excluido com sucesso");
								
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
    <p class="p_descri">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. </p>
    </div>
    
    <div id="barrinha"></div><div id="barrinha2"></div>
    
    </div>      	
            <div id="comentar_video">
            <?php 
				
						if ($_SESSION["tipo"] == 1)
						{
							echo '<a href="../Profile/profile.php?id='.$_SESSION["codigo"].'">
							
							<div  style="background-image:url(../../Usuarios/'.$_SESSION["foto_perfil"].');background-size:28px;" id="c11"> 
							</div>
							</a>';
						}
						else
						{
							if ($_SESSION["tipo"] == 2)
							{
								echo '<a href="../../Banda/Profile/profile.php?id='.$_SESSION["codigo"].'">
								<div  style="background-image:url(../../Usuarios/'.$_SESSION["foto_perfil"].');background-size:40px;" id="c11"> 
								</div>
								</a>';
							}
							else
							{
								if ($_SESSION["tipo"] == 3)
								{
									echo '<a href="../../Visitante/index.php">
									<div  style="background-image:url(../../Usuarios/'.$_SESSION["foto_perfil"].');background-size:28px;" id="c11"> 
									</div>
									</a>';
								}
								else
								{
									if ($_SESSION["tipo"] == 4)
									{
										echo '<a href="../../Produtor/ranque/index.php">
										<div  style="background-image:url(../../Usuarios/'.$_SESSION["foto_perfil"].');background-size:28px;" id="c11"> 
										</div>
										</a>';
									}
									else
									{
										echo '<a href="#"><div  id="c11"></div></a>';
									}
								}
								
							}
							
						}
		 ?>
  
        <?php
        		if ($_SESSION["login"] == NULL)
				{
					echo'					
        			<textarea name="txtTexto" id="txtTexto" cols="63" rows="2"></textarea>
				
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
            
            <div id="rodape4">

            <a href="../../Rodape/sobreafusa.php" class="float4"><p class="space4">Sobre a Fusa -</p></a>  
            <a href="../../Rodape/produtores.php" class="float4"><p class="color4">Produtores -</p></a>
            <a href="../../Rodape/contato.php" class="float4"><p class="color4">Contato</p></a>
            
            </div> 

  <div id="excluir_comentario">
      </div> 
     
</div>   
</div>
</div>

<div id="visualizacao"></div>
<div id="div_clicar_votar"></div>


<script>
				$('#barrinha').click(function(){		
								$('#descri').css({
									height:'auto'
									});
								$('#barrinha2').css({
									display:'block'
									});
								$('#barrinha').css({
									display:'none'
									});
						});
						$('#barrinha2').click(function(){		
								$('#descri').css({
									height:'24px'
									});
								$('#barrinha2').css({
									display:'none'
									});
								$('#barrinha').css({
									display:'block'
									});
						});
</script>

</body>
</html>