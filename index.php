<?php
	ob_start();
	session_start();
	error_reporting(0);
	if ( $_SESSION["login"] == "" )
	{
		echo '<script>window.location = "HTML/Pagina_Inicial";</script>';
	}
	else
	{
		if ($_SESSION['tipo'] == 1)
		{
			echo '<script>window.location = "/Fusa/HTML/Solo/index.php";</script>';
		}
		else
		{
				if ($_SESSION['tipo'] == 2)
				{
					 echo '<script>window.location = "/Fusa/HTML/Banda/index.php";</script>';
				}
				else
				{
					if ($_SESSION['tipo'] == 3)
					{
						  echo '<script>window.location = "/Fusa/HTML/Visitante/index.php";</script>';
					}
				}
		}
	}
?>