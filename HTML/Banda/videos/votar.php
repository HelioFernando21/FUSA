<?php
ob_start();
session_start();
?>
<?php
				error_reporting(0);
				date_default_timezone_set("Brazil/East");
				
				$conecta = mysql_connect("localhost","root","root");
				$banco = mysql_select_db("banco_tcc_fusa");
				$valor2 =  explode(";;e;;",$_GET["e"]);
				$video = $valor2[2];
				$cdusuario = $valor2[1];
				$remetente = $valor2[0];
				
				$sql = mysql_query("SELECT count(*) FROM estrela where (cd_remetente_estrela = ".$remetente.") and (cd_video = ".$video.");") or die;
				 
				while($linha = mysql_fetch_array($sql))
				{
					$qt =  $linha[0];
					

			 	}
				
				
				if ($qt == 0)
				{
					echo '<a id="clicar_votar" href="#" onclick="clicar_votar_2"><div id="gostei2"></div></a>';
					$sql = mysql_query("SELECT max(cd_estrela)+1 FROM estrela ;") or die;
				 
					while($linha = mysql_fetch_array($sql))
					{
						$Maior =  $linha[0];
					

			 		}
					
					if ($Maior == "")
					{
						$Maior = 1;
					}
					
					$sql = mysql_query("insert into estrela values(".$Maior.",".$video.",".$remetente.",'".date("Y-m-d")."');") or die;
					if ($cdusuario != $_SESSION["codigo"])
					{
								$sql = mysql_query("insert into atualizacoes values('Há;;e;;nova(s) curtida(s) sobre seu video;;e;;/Fusa/HTML/Banda/videos/index.php?id=',".$cdusuario.",0,null,3,".$video.",1,".$_SESSION["codigo"].",".$Maior.");") or die;
					}
					
					/*echo '<script type="text/javascript"> alert("curtido com sucesso");</script>';*/
				}
				else
				{
					echo '<a id="clicar_votar" href="#" onclick="clicar_votar_2"><div id="gostei2"></div></a>';	
					/*echo '<script type="text/javascript"> alert("ja curtido com sucesso");</script>';*/
		 
					 


				}
				
				mysql_close($conecta);
				
				
				
			//$sql = mysql_query("insert into estrela values(null,".$video.",".$_SESSION['codigo'].");") or die;
				
				
?>