<?php 
error_reporting(0);

session_start();
if ($_SESSION['login'] == NULL)
{	
			/*$texto = $_SERVER['REQUEST_URI'];
			  
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
			  
			  $diretorio;*/
			  
			  header("location: /FUSA/HTML/Pagina_Inicial/index.php");
}
?>
