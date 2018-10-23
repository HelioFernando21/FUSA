<?php
error_reporting(0);
ob_start();
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Resultados - Fusa</title>
<link rel="stylesheet" type="text/css" href="../../../CSS/estilo_colors.css" />
<link rel="stylesheet" type="text/css" href="../../../CSS/estilo_amigo_resultado.css" />
<link rel="stylesheet" type="text/css" href="../../../CSS/scroller.css" />
<script src="../../JavaScript/jquery-ui.js" type="text/javascript"></script>
<script type="text/javascript" src="jquery-1.7.2.min.js"></script>

<script>
function Procurar_Videos()
	{
		var valor = document.getElementById("search_video").value;
		if (valor !=  "")
		{
				window.location = "../../Procurar/videos.php?id="+valor;
		}
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

<style>

#Foto {
	float:left;
}

#Nome {
	font-family:Arial, Helvetica, sans-serif;
	color:#2da6e9;
	font-size:18px;
	margin-left:5px;
}

#Estado {
	text-align:left;
	min-width:100px;
	max-width:500px;
	margin-left:55px;
	color:#FFF;
	font-size:12px;
	font-family:Verdana, Geneva, sans-serif;
}

#amigos {
	height:50px;
	padding-top:10px;
}


</style>

</head>
<body>
<div id="principal">
		<div id="barra">  
    <?php
		
	
		if ($_SESSION["tipo"] == 1)
		{
		 	echo  '<a href="/fusa/html/pagina_inicial/index.php"><div id="Fusa_home"></div></a>';
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
					else
					{
						
						if ($_SESSION["tipo"] == "")
						{
							echo  '<a href="/fusa/html/pagina_inicial/index.php"><div id="Fusa_home"></div></a>';
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

<div id="login_amigos">
<?php /*
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
			  			  
			  include($diretorio."FUSA/HTML/Pagina_Inicial/acesso.php");*/
?>
		<?php	
			error_reporting(0);
			$amigos = $_GET["id"];
			if ($amigos == "")
			{
				echo '<script type="text/javascript"> window.location = "../../Erro/index.php"; </script>';
			} 
			else
			{
				$textoAmigo = str_replace("+"," ",$amigos);
			}
		?>
</div>



<div id="conteudo">
    
<div id="coluna2">

	<div id="amigo">
    	<?php
		    $conecta = mysql_connect("localhost","root","root");
			$banco = mysql_select_db("banco_tcc_fusa");
			$sql = mysql_query("SELECT us.cd_usuario,us.nm_usuario, us.nm_estado, us.nm_cidade, fo.nm_destino_foto, us.cd_tipo_usuario FROM usuarios us inner join fotos fo on (us.cd_usuario = fo.cd_usuario)  where ((nm_usuario like '%".$textoAmigo."%') or (nm_usuario like '%".$textoAmigo."') or (nm_usuario like '".$textoAmigo."%') or (nm_usuario = '".$textoAmigo."') ) and (fo.cd_situacao_perfil = 1) and ((us.cd_tipo_usuario = 1) or (us.cd_tipo_usuario = 2)) ;") or die;
				
				while($linha = mysql_fetch_array($sql))
				{
					$CdUsuario = $linha[0];	
					$NmUsuario = $linha[1];				
					$NmEstado = $linha[2];			
					$NmCidade = $linha[3];				
					$NmDestino = $linha[4];
					
					
					
					if ($linha[5] == 1)
					{
						
						echo '<div id="amigos">';
							echo '<a id="Foto" href="../../Solo/Profile/profile.php?id='.$CdUsuario.'"> <div id="use" style="background-image:url(../../Usuarios/'.$NmDestino.'); background-size:40px;" > </div></a>';
							echo utf8_encode( '<a id="Nome" href="../../Solo/Profile/profile.php?id='.$CdUsuario.'">'.$NmUsuario.'</a>');							
							echo utf8_encode('<p id="Estado">'.$NmEstado.' - '.$NmCidade);
						echo '</div>';
					}
					else
					{
						
						if ($linha[5]==2)
						{
							echo '<div id="amigos">';
							echo '<a id="Foto" href="../../Banda/Profile/bandprofile.php?id='.$CdUsuario.'"> <div id="use" style="background-image:url(../../Usuarios/'.$NmDestino.'); background-size:60px;" > </div> </a>';
							echo utf8_encode( '<a id="Nome" href="../../Banda/Profile/bandprofile.php?id='.$CdUsuario.'">'.$NmUsuario.'</a>');
							echo utf8_encode('<p id="Estado">'.$NmEstado.' - '.$NmCidade);
							echo '</div>';	
						}	
										
					}
				}
				
				mysql_close($conecta);
		?>
</div>
</div>
</div>
</div>
</body>
</html>