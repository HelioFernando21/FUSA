<?php
ob_start();
session_start();
error_reporting(0);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Produtores - Fusa</title>
<link rel="stylesheet" type="text/css" href="../../CSS/estilo_erro.css" />
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
<p class="title3">PRODUTORES</p>

<p class="title0">Produtor!</p>
<p class="white0">Com a Fusa você pode mais!<br />
Receba os rankings semanais e menais dos artistas que estão na rede!<br />
Invista nos melhores!</p>

<img src="../../Design/produtores.png" id="produtores"/>

</div>

</div>
<div id="rodape">

<a href="sobreafusa.php" class="float"><p class="space">Sobre a Fusa -</p></a>  
<a href="produtores.php" class="float"><p class="color">Produtores -</p></a>
<a href="contato.php" class="float"><p class="color">Contato</p></a>

</div>

</body>
</html>