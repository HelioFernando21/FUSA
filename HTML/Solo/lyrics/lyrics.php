<?php
error_reporting(0);
	$conecta = mysql_connect("localhost","root","root");
	$banco = mysql_select_db("banco_tcc_fusa");
	
	$i = 0;
	
	session_start();
	
	
	$sql = mysql_query("SELECT re.cd_remetente_recado,us.nm_usuario,re.ds_recado,re.nm_horario_recado,re.dt_recado,
fo.nm_destino_foto,re.cd_recado
 from recados re inner join usuarios us
on re.cd_receptor_recado = us.cd_usuario
inner join fotos fo on us.cd_usuario = fo.cd_usuario
where ( re.cd_receptor_recado  = ".$_SESSION["lyrics"]." )
order by re.dt_recado Desc,re.nm_horario_recado Desc;") or die;
	
	while($linha = mysql_fetch_array($sql))
	{
		$dados[$i] =  $linha[0].';;e;;'.$linha[1].';;e;;'.$linha[2].';;e;;'.$linha[3].';;e;;'.$linha[4].';;e;;'.$linha[5].';;e;;'.$linha[6];
		$i ++;
 	}
	
	
	
	
	echo '<div>';
	for ($inicio = 0;$inicio < $i;$inicio++)
	{
		
		$dividido = "";
		$dividido = explode(';;e;;',$dados[$inicio]);
		
		
		$sql = mysql_query("SELECT count(*) FROM recados where ((cd_remetente_recado = ".$_SESSION["codigo"]." ) and (cd_recado = ".$dividido[6]."));") or die;
	
		while($linha = mysql_fetch_array($sql))
		{
				$qtSituacao =  $linha[0];
		
	 	}
	
		
		
		echo utf8_encode(	
		'<div>
			 
			
			<img src="'.$dividido[5].'" width="50px" height="40px"> </img>
			<a href="../videos">'.$dividido[1].'</a>');
			
			if(( $qtSituacao == 1 ) ||( $_SESSION["codigo"] == $_SESSION["lyrics"] ))
			{
				echo '</br><a name="'.$dividido[6].'" href="#" id="excluir_lyrics" onclick="antes_excluir_lyrics(this.name)"> excluir </a>';
			}
			
			echo utf8_encode('
			<p>'.$dividido[2].'</p>
			<p>Horario: '.$dividido[3].'</p>
			<p>Data: '.$dividido[4].'</p>
			
		 </div></br>');
	}
	echo '</div>';
	
?>