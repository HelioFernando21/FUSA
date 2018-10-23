<?php
ob_start();
session_start();
?>
<script type="text/javascript" src="../../../JavaScript/jquery-1.7.2.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
			error_reporting(0);
			$conecta = mysql_connect("localhost","root","root");
			$banco = mysql_select_db("banco_tcc_fusa");
					
			$usuarioVideo = $_GET["id"];
	
			 
			if ($_SESSION["codigo"] == "")
			{
				$codigo = "";
			}
			else
			{
				$codigo =  $_SESSION["codigo"];
			}
	
			$sql = mysql_query("SELECT cd_video,nm_video,dt_video,nm_horario_video,nm_destino_print FROM videos where cd_usuario = ".$usuarioVideo." order by dt_Video Desc, nm_horario_video Desc ;") or die;
			
			while($linha = mysql_fetch_array($sql))
			{
				
				
				echo '<div id="video" class="alinhado">';
					
					echo '<a href="../videos/index.php?id='.$linha[0].'"><div id="title_video"><p>';
					echo $linha[1];
					echo '</p></div></a>';
					
					echo '<div id="imagem"><img src="'.$linha[4].'" id="imagem" /></div>';
					
					
					echo '<a href="../videos/index.php?id='.$linha[0].'"><div id="btn_play"></div></a>';
					
			
					
					//echo '<div id="data_video">';
					//echo $linha[2] .' '. $linha[3];
					//echo '</div>';
					
						if ( $codigo == $usuarioVideo)
					{
						echo'<a href="#" onclick="antes_excluir('.$linha[0].')"><div id="icon"></div></a>';
					}
					
				echo '</div>';
			}
					
			mysql_close($conecta);
			
			
        ?>