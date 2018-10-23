<?php 
ob_start();
session_start();
error_reporting(0);
?>
<script type="text/javascript" src="jquery-1.7.2.min.js"></script>
<?php
//dt agenda
//ds agenda
//nm agenda
//nm endereço agenda
//nm local agenda
//cd usuario



$agenda = $_GET["id"];
//$_SESSION["agenda"] = $agenda;

$conecta = mysql_pconnect("localhost","root","root");
$banco = mysql_select_db("banco_tcc_fusa");


$codagenda = 1;
$data = $_GET['agenda_data'];
$descricao = $_GET['agenda_descricao'];
$agendanome = $_GET['agenda_nome'];
$endereco = $_GET['agenda_endereco'];
$local = $_GET['agenda_local'];
$horario_agenda = $_GET['horario_agenda'];

//echo 'oioioioioio'.$codagenda.', '.$data.', '.$descricao.', '.$agendanome.', '.$endereco.', '.$local.'';
$sql = mysql_query("insert into agendas values(null,'".$data."','".$descricao."','".$agendanome."','".$endereco."','".$local."',".$agenda.",'".$horario_agenda."');") or die;
//echo "insert into agendas values(".$codagenda.",'".$data."','".$descricao."','".$agendanome."','".$endereco."','".$local."',".$agenda.");";
mysql_close($conecta);

echo
'
<script type="text/javascript"> 


$(document).ready(function(){
	 	 
	 window.location = "index.php?id='.$agenda.'";
	 
	 });


 </script>
';



?>
