<?php
ob_start();
session_start();
?>
<link rel="stylesheet" type="text/css" href="../../CSS/estilo_colors.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style>
#acesso3 {	
	overflow-x:hidden;
	overflow-y:hidden;
	width: 40px;
	height: 40px;
	background-size:40px;
	background-repeat:no-repeat;
	border:1px solid #666;
	float:left;
	margin-right:10px;
	margin-top:10px;
}

.a_sair {
	color:#0d88cc;
	float:left;
	margin-top:28px;
}


</style>

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
			  
if (isset($_SESSION['login']))
{
			  //require($diretorio."TCC_FUSA/Fusa/Pagina_Inicial/HTML/proteger.php");
			  
			  
			  $nome = explode(' ',$_SESSION['nome']);

				if ( $_SESSION["tipo"] == '1' )
				{
					echo utf8_encode("<p class=\"p_nome\">Bem vindo: </b>".$nome[0]. "</b></p>" ."<a href=\"/Fusa/HTML/solo/Profile/profile.php?id=".$_SESSION["codigo"]."\">
					 	<div id=\"acesso\" style=\"background-image:url(/FUSA/HTML/Usuarios/".$_SESSION["foto_perfil"].");background-size:40px; \" >
						 </div>
						</a>"
						. " <a href=\"/FUSA/HTML/Pagina_Inicial/sair.php\" class=\"a_sair\">Sair</a>");
					
					
				}
				else
				{
					if ($_SESSION["tipo"] == '2')
					{
						echo utf8_encode("<p class=\"p_nome\">Bem vindo: </b>".$nome[0]. "</b></p>" ."<a href=\"/Fusa/HTML/Banda/Profile/bandprofile.php?id=".$_SESSION["codigo"]."\"> 
						<div id=\"acesso2\" style=\"background-image:url(/FUSA/HTML/Usuarios/".$_SESSION["foto_perfil"]."); background-size:100px;\"></div></a>". " <a href=\"/FUSA/HTML/Pagina_Inicial/sair.php\" class=\"a_sair\">Sair</a>");
					}
					else
					{
						if ($_SESSION["tipo"] == '3')
						{
							echo utf8_encode("<p class=\"p_nome\">Bem vindo: </b>".$nome[0]. "</b></p>" ."<a href=\"/Fusa/HTML/Visitante/index.php \"> <div id=\"acesso\" style=\"background-image:url(/FUSA/HTML/Usuarios/".$_SESSION["foto_perfil"]."); background-size:40px;\"> </div></a>". " <a href=\"/FUSA/HTML/Pagina_Inicial/sair.php\" class=\"a_sair\">Sair</a>");
						}
						else
						{
							if ($_SESSION["tipo"] == '4')
							{
								echo utf8_encode("<p class=\"p_nome\">Bem vindo: </b>".$nome[0]. "</b></p>" ."<a href=\"/Fusa/HTML/Produtor/ranque/index.php \"> <div id=\"acesso\" style=\"background-image:url(/FUSA/HTML/Usuarios/".$_SESSION["foto_perfil"]."); background-size:40px;\"> </div></a>". " <a href=\"/FUSA/HTML/Pagina_Inicial/sair.php\" class=\"a_sair\">Sair</a>");
							}
						}
					}
					
				}
			
			
}
else
{
	include($diretorio."FUSA/HTML/Pagina_Inicial/formulario.php");
}


?>
