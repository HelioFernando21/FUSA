<?php
ob_start();
session_start();
?>
<script type="text/javascript" src="../../../JavaScript/jquery-1.7.2.min.js"></script>
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
	 
	 
	 $("#dad").load("buscar_agenda.php?e='.$_GET["id"].'");


	 
	 });


</script>';
?>