<?php
ob_start();
@session_start();
error_reporting(0);
?>

<style>
#excluir {
	width:18px;
	height:29px;
	background-image:url(../../../Design/excluir.png);
	position:absolute;
	margin-left:160px;
	margin-top:-30px;
}

#foto {
	width:100px;
	height:100px;
}


p {
	color:#FFF;
	font-family:Verdana, Geneva, sans-serif;
	font-size:12px;
	margin-top:0px;
}

#nome {
	color:#000;
	font-family:"Century Gothic";
	font-size:24px;
	margin-top:0px;
	text-decoration:none;
	color:#FFF;
}

#artista {
	margin-left: 20px;
	margin-top:20px;
	width:200px;
	float:left;
}


</style>

<script type="text/javascript" src="../../../JavaScript/jquery-1.7.2.min.js"></script>
<div id="user">
<?php
		$conecta = mysql_connect("localhost","root","root");
		$banco = mysql_select_db("banco_tcc_fusa");	
		$sql = mysql_query("SELECT us.nm_usuario, fo.nm_destino_foto, us.nm_Cidade, us.nm_Estado, us.nm_telefone , us.cd_tipo_usuario, us.cd_usuario FROM propostas pr inner join usuarios us on (pr.cd_usuario = us.cd_usuario) inner join fotos fo on (pr.cd_usuario = fo.cd_usuario) where (pr.cd_produtor = ".$_SESSION["codigo"].") and (fo.cd_situacao_perfil = 1) and (pr.cd_situacao_proposta = 1);") or die;
	
	

		while($linha = mysql_fetch_array($sql))
		{
			echo '<div id="artista">';
				
			if ($linha[5] == 1)
			{
				echo '<a href="../../Solo/Profile/profile.php?id='.$linha[6].'"><div id="foto" style="background-image:url(../../Usuarios/'.$linha[1].'); background-size:100px;"></div></a><br/>';
				echo '<a id="nome" href="../../Solo/Profile/profile.php?id='.$linha[6].'">'.$linha[0].'</a>';
				echo '<a href="#" onclick="excluir_agenciado(this.name)" name="'.$linha[6].'" ><div id="excluir"></div></a>'; 
			}
			else
			{
				if ($linha[5] == 2)
				{
					echo '<a href="../../Banda/Profile/bandprofile.php?id='.$linha[6].'"><div id="foto" style="background-image:url(../../Usuarios/'.$linha[1].'); background-size:100px;
					background-repeat:no-repeat;
					
					"></div></a>';
					echo '<a id="nome" href="../../Banda/Profile/bandprofile.php?id='.$linha[6].'">'.$linha[0].'</a>';
					echo '<a href="#" onclick="excluir_agenciado(this.name)" name="'.$linha[6].'" ><div id="excluir"></div></a>'; 
				}
			}
				
				
				echo '<p id="cidade">'.$linha[2].'</p>';
				echo '<p id="Estado">'.$linha[3].'</p>';
				echo '<p id="Telefone">'.$linha[4].'</p>';
				
			echo '</div>';	

	 	}
		
		mysql_close($conecta);
?>
</div>