<?php
ob_start();
session_start();
?>
<script type="text/javascript" src="../../JavaScript/jquery-1.7.2.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<?php
//nl2br();

	error_reporting(0);
	$codigo_pagina =  $_GET["id"];

	if ($codigo_pagina == "")
	{
		echo '<script type="text/javascript"> alert("pagina nao encontrada"); </script>';
	}	
	else
	{
	
		$conecta = mysql_connect("localhost","root","root");
		$banco = mysql_select_db("banco_tcc_fusa");
		
	
		
		$qtUsuario = 0;
		
		$sql = mysql_query("SELECT count(*) FROM usuarios where cd_usuario = ".$codigo_pagina.";") or die;
		while($linha = mysql_fetch_array($sql))
		{
			$qtUsuario =  $linha[0];
			
		}
			
		
		
		mysql_close($conecta);
		
		if ($qtUsuario == 0)
		{
			echo '<script type="text/javascript"> alert("pagina nao encontrada"); </script>';
		}
		else
		{
				//echo utf8_encode('<a href="#" name="0;;e;;'.$_SESSION["codigo"].'" onclick="excluir_atualizacao(this.name,'.$_SESSION["codigo"].')">excluir todos</a>');
			
				$conecta = mysql_connect("localhost","root","root");
				$banco = mysql_select_db("banco_tcc_fusa");
				
			
				
				$qtUsuario = 0;
				
				$sql = mysql_query("SELECT sum(qt_atualizacao),nm_link,cd_situacao_atualizacao,cd_atualizacao, 
cd_tipo_atualizacao,cd_link FROM atualizacoes where (cd_usuario = ".$codigo_pagina.")  group by cd_tipo_atualizacao,cd_link;") or die;
				while($linha = mysql_fetch_array($sql))
				{
					
					$nmLink =  explode(';;e;;',$linha[1]);
					$cdSituacao = $linha[2];
					$cdAtualizacao = $linha[3];
					$cdTipoAtualizacao = $linha[4];
					$cdLink = $linha[5];
					$qtAtualizacao = $linha[0];
					
					if ($cdSituacao == 0)
					{
						echo utf8_encode('<div id="conteudo_atualizacao" style="background-color:green;">');
					}
					else
					{
						echo utf8_encode('<div id="conteudo_atualizacao" style="background-color:;">');
					}
						//echo utf8_encode('<a href="#" name="1;;e;;'.$cdAtualizacao.'" onclick="excluir_atualizacao(this.name,'.$_SESSION["codigo"].')">excluir</a>');
						
						if (($cdTipoAtualizacao == 5) || ($cdTipoAtualizacao == 6))
						{
						
							echo utf8_decode(utf8_encode('<a href="#" name="'.$nmLink[2].$cdLink.';;e;;'.$cdTipoAtualizacao.'" onclick="redirecionar_atualizacao(this.name)" id="nome_atualizacao">'));
							
							echo $nmLink[1];
							
						echo utf8_encode('</a>');
						}
						else
						{
							echo utf8_decode(utf8_encode('<a href="#" name="'.$nmLink[2].$cdLink.';;e;;'.$cdTipoAtualizacao.'" onclick="redirecionar_atualizacao(this.name)" id="nome_atualizacao">'));
							
							echo $nmLink[0].' '.$qtAtualizacao.' '.$nmLink[1];
						echo utf8_encode('</a>');
						}
						
						
						
					echo utf8_encode('</div>');
					
				}
				
				mysql_close($conecta);
		}
	}
	
	echo "<script type='text/javascript'>


	$('#carregando').hide();
//alert('oi recados');
	

	
	</script>";
?>

