<?php
ob_start();
session_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
error_reporting(0);
$conecta = mysql_pconnect("localhost","root","root");
$banco = mysql_select_db("banco_tcc_fusa");



$sql = mysql_query("select cd_agenda, dt_agenda, ds_agenda, nm_agenda, nm_endereco_agenda, nm_local_agenda,nm_horario_agenda from agendas where cd_usuario = ".$_GET["e"]."");
$l=0;
$i = 0;


echo'			<div id="eventos">
                    
                    <div id="cc1" class="linhas_c"></div>
                    <div id="cc2" class="linhas_c"></div>
                    <div id="cc3" class="linhas_c"></div>      ';

while($mostra = mysql_fetch_array($sql))
{
	//$texto[$i] = $mostra[0].';;e;;'.$mostra[1].';;e;;'.$mostra[2].';;e;;'.$mostra[3].';;e;;'.$mostra[4].';;e;;'.$mostra[5];
	//$i++;
	$data = explode('-',$mostra[1]);
	$ano = $data[0];
	echo ' <div id="linha">';
    echo '              <div id="c1">	<p>'.$data[2].'/'.$data[1].'/'.$ano[2].$ano[3].'</p>	</div>';
    echo '              <div id="c2">	<p>'.$mostra[6].'</p>	</div>';
    echo '              <div id="c3">	<p>'.$mostra[4].'</p>	</div>';
    echo '              <div id="c4">	<p>'.$mostra[2].'</p>	</div>';
	if ($_GET["e"] == $_SESSION["codigo"])
	{
  		  echo '              <a href="#"  onclick="excluir_agenda('.$mostra[0].','.$_GET['e'].')"><div id="c5"></div></a>';
	}
                    
    echo ' </div>';
}

					
					
					
echo'			</div>';
mysql_close($conecta);
?>
