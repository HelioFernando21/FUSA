<?php
ob_start();
session_start();
error_reporting(0);
?>
<script type="text/javascript" src="../../JavaScript/jquery-1.7.2.min.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php

		$conecta = mysql_connect("localhost","root","root");
		$banco = mysql_select_db("banco_tcc_fusa");

		$CdUsuario = $_GET["id"];
		
		$sql = mysql_query("SELECT us.nm_usuario,fo.nm_destino_foto,pr.ds_proposta,pr.cd_proposta FROM propostas pr inner join usuarios us on (pr.cd_produtor = us.cd_usuario) inner join fotos fo on (us.cd_usuario = fo.cd_usuario)  where (pr.cd_usuario = ".$CdUsuario.") and (pr.cd_tipo_proposta = 2) and (pr.cd_situacao_proposta = 0) ; ") or die;
		
		
		while($linha = mysql_fetch_array($sql))
		{
			$valor = $linha[0];
			echo '<div id="notifica_produtor">';
            echo '               
			<div id="c1" style="background-image:url(../Usuarios/'.$linha[1].'); " >
						</div>';
			
            echo '                 <div id="c2">';
            echo '                    <div id="nome_produtora"><p>'.$linha[0].'</p></div>';
			
            echo '                    <div id="corpo_mensagem"><p class="p_frase">'.$linha[2].'</p></div>';
			echo '                    <input id="Aceitar" type="button" value="Aceitar"  name="'.$linha[3].';'.$linha[0].';'.$_SESSION["codigo"].'"  onClick="aceitar_proposta(this.name)"/>';
            echo '                 </div>';
			
            echo '        </div>';
		}
		
		mysql_close($conecta);
		
		if ($valor == "")
		{
			echo '<p>Nenhuma proposta pendente</p>';
		}
		
		echo '<script type="text/javascript">

	$("#carregando2").hide();

	
	
	
	</script>';
?>