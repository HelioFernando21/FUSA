<?php
ob_start();
session_start();
?>


<script type="text/javascript" src="../../JavaScript/jquery-1.7.2.min.js"></script>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
	error_reporting(0);
	$cdConvite = $_GET["id"];
	if ( $cdConvite == "" )
	{
		echo '<script type="text/javascript"> alert("pagina nao encontrada"); </script>';
	}
	else
	{
		$conecta = mysql_connect("localhost","root","root");
		$banco = mysql_select_db("banco_tcc_fusa");
		
	
		
		$qtUsuario = 0;
		
		$sql = mysql_query("SELECT co.cd_situacao_contato, co.cd_remetente_contato, us.nm_usuario, fo.nm_destino_foto, cd_contato, co.nm_instrumento FROM contatos co inner join usuarios us on (co.cd_remetente_contato = us.cd_usuario) inner join fotos fo on (us.cd_usuario = fo.cd_usuario)
 where (co.cd_receptor_contato = ".$cdConvite.") and (fo.cd_situacao_perfil = 1) and (cd_situacao_contato = 2)  ;") or die;
		while($linha = mysql_fetch_array($sql))
		{
			$cdSituacaoContato =  $linha[0];
			$cdRemetenteContato = $linha[1];
			$nmUsuario = $linha[2];
			$nmDestino = $linha[3];
			$cdContato = $linha[4];
			$nmInstrumento = $linha[5];
			
			if ($linha[0] == NULL)
			{
				echo '<script type="text/javascript"> alert("nenhum convite"); </script>';
			}
			else
			{
				echo  utf8_encode('<div id="notifica_banda">');
				if ($cdSituacaoContato == 2)
				{
					$profile = "../Banda/Profile/bandprofile.php?id=";
				}
				else
				{
					if ($cdSituacaoContato == 0)
					{
						$profile = "Profile/profile.php?id=";
					}
				}
					echo  '<a href="'.$profile.$cdRemetenteContato.'" >';
					
						echo  '
						<div id="c111" style="background-image:url(../Usuarios/'.$nmDestino.'); " >
						</div>';
								
					echo  utf8_encode('</a>');
					
					 echo '<div id="c2">';
					 
					 echo  '<a href="'.$profile.$cdRemetenteContato.'" >';
						echo '<div id="nome_banda"><p>'.$nmUsuario.'</p></div>';
					echo  utf8_encode('</a>');
					
					echo ' <div id="escolher_op"><p class="p_frase">Quer você como integrante da banda!</p>';
					
					
					
					
					
					
					echo  '<input id="Aceitar" type="button" value="Aceitar" name="'.$cdSituacaoContato.';;e;;'.$cdContato.';;e;;'.$cdRemetenteContato.';;e;;'.$cdConvite.';;e;;'.$nmInstrumento.'" onClick="convite_aceito(this.name)" />';
					
					echo ' <a href="#"><div id="c33"></div></a>';
					echo '</div></div>';
					
				echo  utf8_encode('</div>');
			}
			
			
		}
		
			
		if ($cdSituacaoContato == "")
		{
			echo 'Nenhum convite pendente';
		}
		
		mysql_close($conecta);
	}
	echo '<script type="text/javascript">

	$("#carregando3").hide();

	
	
	
	</script>';
	
	
?>