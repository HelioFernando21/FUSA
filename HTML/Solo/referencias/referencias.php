<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Referências - Fusa</title>    
<link rel="stylesheet" type="text/css" href="../../../CSS/estilo_referencias.css" />
<link rel="stylesheet" type="text/css" href="../../../CSS/estilo_colors.css" />
<script src="../../../JavaScript/jquery-ui.js" type="text/javascript"></script>
<script src="../../../JavaScript/jquery-1.7.2.min.js" type="text/javascript"></script>

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
		
		$sql = mysql_query("SELECT count(*),fo.nm_destino_foto FROM usuarios us
inner join fotos fo on (us.cd_usuario = fo.cd_usuario)
where (us.cd_usuario = ".$_GET["id"].") and ( us.cd_tipo_usuario = 1 ) and (cd_situacao_perfil = 1) group by us.cd_usuario;") or die;
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

			<div id="coluna1">
			<?php
            	echo '<a href="../profile/profile.php?id='.$_GET["id"].'"><img src="../../Usuarios/'.$FotoUsuario.'" id="foto_user"/></a>';
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
                
				$sql = mysql_query("SELECT co.cd_remetente_contato, fo.nm_destino_foto, us.nm_usuario FROM contatos co inner join fotos fo on ( co.cd_remetente_contato = fo.cd_usuario ) inner join usuarios us on (co.cd_remetente_contato = us.cd_usuario) where (cd_receptor_contato = ".$_GET["id"]." ) and ( cd_situacao_contato = 1 ) ;") or die;
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

<div id="coluna2">
<div id="menu">
        <a href="videos.php"><div id="bt1"> <p class="p_link_esq"> Vídeos </p> </div></a>
        <a href="fotos.php"><div id="bt2"> <p class="p_link"> Fotos </p> </div></a>
        <a href="lyrics.php"><div id="bt3"> <p class="p_link"> Lyrics</p> </div></a>
        <a href="referencias.php"><div id="bt4"> <p class="p_link_ref"> Referências</p> </div></a>
        <a href="agenda.php"><div id="bt5"> <p class="p_link_dir"> Agenda</p> </div></a>
</div>

<div id="segura_conteudo">

            <div id="caixa_uploud_ref">
            
    		 <?php
		 	 session_start();
		 error_reporting(0);
			if ( $_SESSION["codigo"] == $_GET["id"] )
			{
				echo '<a id="bt_uploud_ref" href="upar_referencias.php?id='.$_GET["id"].'" title="Upload Referencias"  rel="gb_page_center[600, 280]">Adicionar Referencia</a>';
			}
			
					
					
		

		?>
            
            </div>
            
            <div id="referencias">

             
            </div>
</div>

</div>
</div>
</div>
<div id="rodape">

<a href="#" class="float"><p class="space">Sobre a Fusa -</p></a>  
<a href="#" class="float"><p class="color">Produtores -</p></a>
<a href="#" class="float"><p class="color">Contato</p></a>

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