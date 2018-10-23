<?php
ob_start();
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Band Videos - Fusa</title>
<link rel="stylesheet" type="text/css" href="../../../CSS/estilo_bandvideos.css" />
<script type="text/javascript">
        var GB_ROOT_DIR = "../../../JavaScript/greybox/greybox/";
    </script>

    <script type="text/javascript" src="../../../JavaScript/greybox/greybox/AJS.js"></script>
    <script type="text/javascript" src="../../../JavaScript/greybox/greybox/AJS_fx.js"></script>
    <script type="text/javascript" src="../../../JavaScript/greybox/greybox/gb_scripts.js"></script>
    <link href="../../../JavaScript/greybox/greybox/gb_styles.css" rel="stylesheet" type="text/css" media="all" />

    <script type="text/javascript" src="../../../JavaScript/greybox/static_files/help.js"></script>
    <link href="../../../static_files/help.css" rel="stylesheet" type="text/css" media="all" />
    

<script type="text/javascript" src="../../../JavaScript/jquery-1.7.2.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {

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
    	texto = window.location;
		v = texto.toString();
		valor = v.split("=");
        $("#conteudo_print_videos").load('buscar_videos.php?id='+valor[1]);
		
    
	});
}

function antes_excluir(v)
{
	if(confirm('Deseja excluir esse video'))
    {
		
		excluir_video(v);
		alert("Video exluido com sucesso");
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


</script>
</head>

<body>
<div id="principal">
<?php
		$usuarioVideo = $_GET["id"];
		if ( $usuarioVideo == "" )
		{
			echo '<script type="text/javascript"> alert("pagina nao encontrada"); </script>';
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
				echo '<script type="text/javascript"> alert("pagina nao encontrada"); </script>';
			}

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
			  //echo 'oi msm';
	?>
            </div>
    </div>
    

<div id="conteudo">

                <div id="banner">
                <?php
                	echo '<a href="../Profile/bandprofile.php?id='.$_GET["id"].'"><img src="../../Usuarios/'.$FotoUsuarioVideo.'" /></a>';
				?>
                <div id="menu">
                            <a href="bandvideos.php"><div id="bt1"> <p class="p_link_esq"> Vídeos </p> </div></a>
                            <a href="bandfotos.php"><div id="bt2"> <p class="p_link"> Fotos </p> </div></a>
                            <a href="bandlyrics.php"><div id="bt3"> <p class="p_link"> Lyrics</p> </div></a>
                            <a href="bandreferencias.php"><div id="bt4"> <p class="p_link_ref"> Referências</p> </div></a>
                            <a href="bandagenda.php"><div id="bt5"> <p class="p_link_dir"> Agenda</p> </div></a>
                </div>
                </div>
  	           
            <div id="caixa_uploud_video">
            
    	<?php
			 error_reporting(0);
			if ( $_SESSION["codigo"] == $_GET["id"] )
			{
				echo '<a href="upar_videos.php?id='.$_GET["id"].'" title="Upload de Video"  rel="gb_page_center[600, 280]">Adicionar Vídeo</a>';
			}
			
        ?>
            
            </div>
            
             
            <div id="videos">
            
            		<div id="conteudo_print_videos">
    	
   					 </div>
                    
                          
			 </div>       
             
 		     <div id="excluir_videos">
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