<?php
ob_start();
session_start();
error_reporting(0);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home - Fusa</title>
<link rel="stylesheet" type="text/css" href="../../../CSS/estilo_produtorhome.css" />
<link rel="stylesheet" type="text/css" href="../../../CSS/estilo_colors2.css" />
<script type="text/javascript" src="../../../JavaScript/jquery-1.7.2.min.js">
</script>

<script type="text/javascript">

$(document).ready(function() {
		
		$("#coluna2").load("semanal.php");

	});
	
	
function mensal()
{
	$(document).ready(function() {
			
		$("#coluna2").load("mensal.php");

	});
}
function semanal()
{
	$(document).ready(function() {
			
		$("#coluna2").load("semanal.php");

	});
}

function procurar_amigos()
{
	var valor = document.getElementById("search_pessoas_input").value;
	
	if (valor != "")
	{
		window.location = "../../solo/amigos/procurar_amigos.php?id="+valor;
	
	}
}

function Procurar_Videos()
	{
		var valor = document.getElementById("search_video").value;
		if (valor !=  "")
		{
			
				window.location = "../../Procurar/videos2.php?id="+valor;
			
		}
	}
	
	function agenciados()
	{
		$(document).ready(function() {
	

		
			$("#coluna2").load("agenciados.php");

		});
	}
	
	function excluir_agenciado(valor)
	{
		$(document).ready(function() {
	

			if( confirm( "Deseja mesmo excluí-lo?" ) )
			{
				$("#banco").load("excluir_agenciado.php?id="+valor);
			}

		});
		
		agenciados();
	}
	
	$(document).ready(function(){
		$("#caixa1").click(function(){
			$("#caixa1").css({background:"#0d88cc"});
			$("#caixa2").css({background:"#8bacbe"});
			$("#caixa3").css({background:"#8bacbe"});
			
			
			
			});
		$("#caixa2").click(function(){
			$("#caixa1").css({background:"#8bacbe"});
			$("#caixa2").css({background:"#0d88cc"});
			$("#caixa3").css({background:"#8bacbe"});
			
			
			
			
			});
		
		$("#caixa3").click(function(){
			$("#caixa1").css({background:"#8bacbe"});
			$("#caixa2").css({background:"#8bacbe"});
			$("#caixa3").css({background:"#0d88cc"});
			
			
			
			
			});
		
		});
	/*0d88cc 8bacbe*/
	
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
        	echo '<img id="fotoprodutor" src="../../Usuarios/'.$_SESSION['foto_perfil'].'"/>';
		?>
        	
            <div id="btns">
        			<a href="#"><div id="caixa1" onclick="semanal()"> <p class="p_menu">Ranking Semanal</p> </div></a>
                    <a href="#"><div id="caixa2" onclick="mensal()"> <p class="p_menu">Ranking Mensal</p> </div></a>
                    <a href="#"><div id="caixa3" onclick="agenciados()"> <p class="p_menu">Agenciados</p> </div></a>
        	</div>
        	
            <div id="search">        
        		<div id="icone_video"></div> 
                <div id="input_video">
                <form method="post">
                <input type="text" id="search_video" placeholder="Procurar Vídeos"/>
                <input type="button" onClick="Procurar_Videos()" id="btn_video">
                </form>
                </div>       
        	</div>            
    </div>
    
<div id="coluna2">
		
		
</div>
<div id="banco">
</div>
</div>
</div>
</body>
</html>