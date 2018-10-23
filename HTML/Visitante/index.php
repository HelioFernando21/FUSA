<?php
ob_start();
session_start();
error_reporting(0);

if ($_SESSION["login"] == "")
{
	echo '<script>window.location = "/Fusa/HTML/Pagina_Inicial/index.php";</script>';
}
else
{
	if ($_SESSION["tipo"] == 1)
	{
		echo '<script>window.location = "/Fusa/HTML/Solo/index.php";</script>';
	}
	else
	{
		if ($_SESSION["tipo"] == 2)
		{
			echo '<script>window.location = "/Fusa/HTML/Banda/index.php";</script>';
		}
	
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home - Fusa</title>
<link rel="stylesheet" type="text/css" href="../../CSS/estilo_visithome.css" />
<link rel="stylesheet" type="text/css" href="../../CSS/scroller.css" />
<link rel="stylesheet" type="text/css" href="../../CSS/estilo_colors.css" />
<script src="../../JavaScript/jquery-1.7.2.min.js" type="text/javascript"></script>

<script type="text/javascript">
function procurar_amigos()
{
	var valor = document.getElementById("search_pessoas_input").value;
	
	if (valor != "")
	{
		window.location = "../Solo/amigos/procurar_amigos.php?id="+valor;
	
	}
}

function Procurar_Videos()
	{
		var valor = document.getElementById("search_video").value;
		if (valor !=  "")
		{
			
				window.location = "../Procurar/videos2.php?id="+valor;
		}
	}
</script>
</head>
<body>

<div id="principal">

   <div id="barra">  
            <a href="index.php"><div id="Fusa_home"></div></a>
                            
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

	<div id="coluna1">
    	<?php
        	echo '<img id="foto_user2" src="../Usuarios/'.$_SESSION["foto_perfil"].'"/>';
		?>
        <div id="procurar_MV">
				<div id="linha_video"> <div id="icone_video"></div>  
                <div id="input_video">
                <form method="post" onSubmit="Procurar_Videos()">
                <input type="text" id="search_video" />
                <input type="button" onClick="Procurar_Videos()" id="btn_video">
                </form>                
                </div> 
                </div>
        </div>
        
    </div>
    
<div id="coluna2">
    	<div id="infos_user2">
        		<div id="nome_user"><p class="p_name_big"><?php echo $_SESSION['nome'] ?></p></div>
                <div id="estilos_user">	<p>
                
                <?php
		     	  $conecta = mysql_connect("localhost","root","root");
				  $banco = mysql_select_db("banco_tcc_fusa");
				  
				  
				  
				  $sql = mysql_query("SELECT nm_estilo FROM usuarios_estilos ue inner join tipos_estilos te on (ue.cd_estilo = te.cd_estilo) where ue.cd_usuario = ".$_SESSION['codigo'].";") or die;
				  
				  $i = 0;
				  while($linha = mysql_fetch_array($sql))
				  {
					  if ($i == 0)
					  {
						  echo $linha[0];
						  $i++;
					  }
					  else
					  {
						  echo ', '.$linha[0];
					  }
				  }
				  
					  
						mysql_close($conecta);
                ?>
                
                </p>	</div>      
                <a href="#"><div id="edit_user"></div></a>  
        </div>
		<div id="videos">
                
                <?php
						 $conecta = mysql_connect("localhost","root","root");
						  $banco = mysql_select_db("banco_tcc_fusa");
						  
						  
						  
						  $sql = mysql_query("SELECT vi.cd_video, vi.nm_video, vi.nm_destino_print, us.cd_tipo_usuario FROM estrela es inner join videos vi on (es.cd_video = vi.cd_video) inner join usuarios us on (vi.cd_usuario = us.cd_usuario) where cd_remetente_estrela = ".$_SESSION['codigo'].";") or die;
						  
					
						  while($linha = mysql_fetch_array($sql))
						  {
							 echo '<div id="video" class="alinhado">';
							 	echo '<div id="title_video"><p>'.$linha[1].'</p></div>';
								echo '<div id="imagem">';
								$destino = explode("../../", $linha[2]);
									echo '<img id="imagem" src="../'.$destino[1].'"/>';
								echo '</div>';
								if ($linha[3] == 1)
								{
									echo '<a href="../Solo/videos/index.php?id='.$linha[0].'"><div id="btn_play"></div></a>';
								}
								else
								{
									if ($linha[3] == 2)
									{
										echo '<a href="../Banda/videos/index.php?id='.$linha[0].'"><div id="btn_play"></div></a>';
									}
									
								}
							 echo '</div>';	
						  }
						  
							  
								mysql_close($conecta);
                ?>

		</div>    
</div>
</div>
</div>
<div id="rodape">

<a href="#" class="float"><p class="space">Sobre a Fusa -</p></a>  
<a href="#" class="float"><p class="color">Produtores -</p></a>
<a href="#" class="float"><p class="color">Contato</p></a>

</div>

</body>
</html>