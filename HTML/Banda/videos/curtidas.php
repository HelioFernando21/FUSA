<?php
ob_start();
session_start();
?>
<?php
				error_reporting(0);
				session_start();
				$conecta = mysql_connect("localhost","root","root");
				$banco = mysql_select_db("banco_tcc_fusa");
			
				
				$sql = mysql_query("SELECT count(*) FROM estrela where cd_video = ".$_GET["id"].";") or die;
				 
				while($linha = mysql_fetch_array($sql))
				{
					$qt =  $linha[0];

			 	}
				echo ' <p class="p_nums">'. $qt.'  </p>';
				mysql_close($conecta);
?>