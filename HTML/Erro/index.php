<?php
ob_start();
session_start();
error_reporting(0);
?>

<script type="text/javascript" src="../../JavaScript/jquery-1.7.2.min.js"></script>

<script>

	
	
	
		function procurar_amigos()
	{
		var valor = document.getElementById("search_pessoas_input").value;
		
		if (valor != "")
		{
			window.location = "../solo/amigos/procurar_amigos.php?id="+valor;
		
		}
	}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Erro - Fusa</title>
<link rel="stylesheet" type="text/css" href="../../CSS/estilo_erro.css" />
</head>
<body>

<div id="principal">

   <div id="barra">  
             <?php
		
	
		if ($_SESSION["tipo"] == 1)
		{
		 	echo  '<a href="../../Solo/index.php"><div id="Fusa_home"></div></a>';
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
           
            <input type="text" id="search_pessoas_input" placeholder="Procurar Usuários" /> <input type="submit" value="" id="go_search" onClick="procurar_amigos()"/>
            
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
<div id="warning">
<p class="p_big">PÁGINA NÃO ENCONTRADA</p>
<p class="p_azul">Desculpe, <br /> O conteúdo procurado não existe!</p>
</div>
</div>

</div>
</body>
</html>