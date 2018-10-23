<?php
ob_start();
session_start();
error_reporting(0);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sobre a Fusa</title>
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

<div id="nota_menor"></div>
<div id="descri">
<p class="title">A FUSA</p>
<p class="white">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
<p></p>
</div>
<div id="img">

<p class="b_s">Crie seu perfil interativo,<br />
Conheça novas pessoas,<br />
Monte sua banda,<br />
Poste seus vídeos e <br />
participe dos rankings!</p>

<p class="prd">Receba estatísticas <br />
dos melhores artistas <br />
em rankings mensais <br />
e semanais!</p>


<p class="vist">Fique por dentro dos <br /> 
novos sucessos. Curta <br />
seus artistas e os<br />
leve para o estrelato!</p>

</div>

</div>
</div>
<div id="rodape">

<a href="sobreafusa.php" class="float"><p class="space">Sobre a Fusa -</p></a>  
<a href="produtores.php" class="float"><p class="color">Produtores -</p></a>
<a href="contato.php" class="float"><p class="color">Contato</p></a>

</div>

</body>
</html>