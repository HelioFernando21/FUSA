<?php
ob_start();
session_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
error_reporting(0);
$agenda = $_GET["e"];
//$_SESSION["agenda"] = $agenda;

$conecta = mysql_pconnect("localhost","root","root");
$banco = mysql_select_db("banco_tcc_fusa");


//echo 'oioioioioio'.$codagenda.', '.$data.', '.$descricao.', '.$agendanome.', '.$endereco.', '.$local.'';
$sql = mysql_query("delete FROM agendas where cd_agenda = ".$agenda.";") or die;
//echo "insert into agendas values(".$codagenda.",'".$data."','".$descricao."','".$agendanome."','".$endereco."','".$local."',".$agenda.");";
mysql_close($conecta);

echo'<script type="text/javascript">


 $(document).ready(function(){
	 
	 
	 window.location = "index.php?id='.$_GET["id"].'";


	 
	 });


</script>';

?>