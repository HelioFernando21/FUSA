<?php
ob_start();
session_start();
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Band Referências- Fusa</title>
<link rel="stylesheet" type="text/css" href="../../../CSS/estilo_bandreferencias.css" />

<script type="text/javascript">
        var GB_ROOT_DIR = "../../../JavaScript/greybox/greybox/";
    </script>

    <script type="text/javascript" src="../../../JavaScript/greybox/greybox/AJS.js"></script>
    <script type="text/javascript" src="../../../JavaScript/greybox/greybox/AJS_fx.js"></script>
    <script type="text/javascript" src="../../../JavaScript/greybox/greybox/gb_scripts.js"></script>
    <link href="../../../JavaScript/greybox/greybox/gb_styles.css" rel="stylesheet" type="text/css" media="all" />

    <script type="text/javascript" src="../../../JavaScript/greybox/static_files/help.js"></script>
    <link href="../../../JavaScript/greybox/static_files/help.css" rel="stylesheet" type="text/css" media="all" />
    

<script type="text/javascript" src="jquery-1.7.2.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	//alert(jsGet('id')+' oi' );
    	//buscar_referencia(jsGet('id'));
		texto = window.location;
		v = texto.toString();
		valor = v.split("=");
        $("#referencias").load('buscar.php?id='+valor[1]);
		//alert("passou5");
    
	});
function carregar_referencias()
{
	$(document).ready(function() {
    	texto = window.location;
		v = texto.toString();
		valor = v.split("=");
        $("#referencias").load('buscar.php?id='+valor[1]);
		alert("passou2");
    
	});
}

function antes_excluir_referencia(v)
{
	if(confirm('Deseja excluir essa referencia'))
    {
		excluir_referencia(v);
		alert("excluiu1");
		carregar_referencias();
	}
}
     
	 
	  function excluir_referencia(valor)
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
					document.getElementById("upload_feito").innerHTML=xmlhttp.responseText;
		
				}
			}

			xmlhttp.open("GET","excluir_referencias.php?e="+valor,true);
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
		$referencia = $_GET["id"];
		session_start();

		if ($referencia == "")
		{
			echo '<script type="text/javascript"> alert("pagina nao encontrada"); </script> ';
		}
		
		$conecta = mysql_connect("localhost","root","root");
		$banco = mysql_select_db("banco_tcc_fusa");
		
	
		
		$qtUsuarioLyrics = 0;
		
		$sql = mysql_query("SELECT count(*),fo.nm_destino_foto FROM usuarios us inner join fotos fo on (us.cd_usuario = fo.cd_usuario) where (us.cd_usuario = ".$_GET["id"].") and ( us.cd_tipo_usuario = 2 ) and (cd_situacao_perfil = 1) group by us.cd_usuario;") or die;
		while($linha = mysql_fetch_array($sql))
		{
			$qtUsuarioLyrics =  $linha[0];
			$FotoUsuario = $linha[1];
			
		}
		
		mysql_close($conecta);
		
		
		if($qtUsuarioLyrics == 0)
		{
			echo '<script type="text/javascript"> alert("pagina nao encontrada"); </script>';
		}
		
		
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
			  		$_SESSION["referencia"] = $referencia;
					
						?>
            </div>
    </div>
    

<div id="conteudo">

                <div id="banner">
                <?php
                
					echo '<a href="../profile/bandprofile.php?id='.$_GET["id"].'"><img src="../../Usuarios/'.$FotoUsuario.'" /></a>';
					
				?>
                <div id="menu">
                            <a href="bandvideos.php"><div id="bt1"> <p class="p_link_esq"> Vídeos </p> </div></a>
                            <a href="bandfotos.php"><div id="bt2"> <p class="p_link"> Fotos </p> </div></a>
                            <a href="bandlyrics.php"><div id="bt3"> <p class="p_link"> Lyrics</p> </div></a>
                            <a href="bandreferencias.php"><div id="bt4"> <p class="p_link_ref"> Referências</p> </div></a>
                            <a href="bandagenda.php"><div id="bt5"> <p class="p_link_dir"> Agenda</p> </div></a>
                </div>
                </div>
  	           
            <div id="caixa_uploud_ref">
            
            <?php
		 	 session_start();
		 error_reporting(0);
			if ( $_SESSION["codigo"] == $_GET["id"] )
			{
				echo '<a href="upar_referencias.php?id='.$_GET["id"].'" title="Upload Referencias"  rel="gb_page_center[600, 280]">Adicionar Referencia</a>';
			}
			
					
					
		

		?>
            
            </div>
            
             
            <div id="referencias">
            
            			
                            
            </div>
            <div id="upload_feito">
    		</div>
       		<div id="carregar">
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