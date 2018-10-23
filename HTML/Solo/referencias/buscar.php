<?php
ob_start();
session_start();
?>
<script type="text/javascript" src="../../../JavaScript/jquery-1.7.2.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
    error_reporting(0);
		session_start();
		$conecta = mysql_connect("localhost","root","root");
		$banco = mysql_select_db("banco_tcc_fusa");
		
		$i = 0;
		$dados[0]="";
		
	
		
		$sql = mysql_query("SELECT ds_referencia,nm_destino_referencia,cd_referencia FROM referencias where cd_usuario = ".$_GET["id"].";") or die;
		
		while($linha = mysql_fetch_array($sql))
		{
			$dados[$i] =  $linha[0].';;e;;'.$linha[1].';;e;;'.$linha[2];
			$i ++;
		}
			
		mysql_close($conecta);
		
		if ( $dados[0] != "" )
		{
		
		
			echo '<div>';
			for ($inicio = 0;$inicio < $i;$inicio++)
			{
				$dividido = "";
				$dividido = explode(';;e;;',$dados[$inicio]);
				
				echo 
				'<div id="ref1">
					 
					';
					
			
				if ($_SESSION["codigo"] == "")
				{
					$codigo = 0;
				}
				else
				{
					$codigo = $_SESSION["codigo"];
				}
					echo '<img id="ref_foto" src="'.$dividido[1].'" width="100px" height="100px"> </img>';
					echo '<div id="ref_band_name"><p>'.$dividido[0].'</p></div>';
					
						if ( $_GET["id"] == $codigo )
					{
						echo '<a href="#" name="'.$dividido[2].'" onclick="antes_excluir_referencia(this.name,'.$_GET["id"].')"><div id="bt_excluir_ref"></div></a>';
					}
					

					echo'  </div>';
			}
			echo '</div>';
		}
	
	
?>