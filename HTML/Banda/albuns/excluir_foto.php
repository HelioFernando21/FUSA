
<?php
error_reporting(0);
ob_start();
session_start();

?>
<script src="../../../JavaScript/jquery-1.7.2.min.js" type="text/javascript"></script>

<?php

				$conecta = mysql_connect("localhost","root","root");
				$banco = mysql_select_db("banco_tcc_fusa");	
                
				$valor = explode(';',$_GET["e"]);
				$sql = mysql_query("SELECT count(*) FROM fotos where (cd_album = ".$valor[1].") ;") or die;

		
				while($linha = mysql_fetch_array($sql))
				{
					$qtFotos =  $linha[0];
	 			}
		
				if ($qtFotos == 1)
				{
					$sql = mysql_query("UPDATE fotos SET cd_situacao_perfil = 2 where  cd_foto = ".$valor[0].";") or die;
				}
				else
				{
					unlink("/Fusa/HTML/Usuarios/".$valor[2]);
					$sql = mysql_query("delete from fotos where cd_foto = ".$valor[0].";") or die;
				}
                
         
				mysql_close($conecta);
				
				echo '
				<script type="text/javascript">
				$(document).ready(function() {
			
				window.location = window.location;
			
		
			});
			</script>';
?>