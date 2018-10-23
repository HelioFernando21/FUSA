<?php
ob_start();
session_start();
?>

<!--FIM LINKS CSS-->

<link rel="stylesheet" type="text/css" href="../../../JavaScript/jquery-ui-1.9.0.custom (1)/jquery-ui-1.9.0.custom/css/cupertino/jquery-ui-1.9.0.custom.css" />



<!--FIm LINKS CSS-->
<!--BIBLIOTECAS JQUERY-->
<script type="text/javascript" src="../../../JavaScript/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="../../../JavaScript/jquery-ui-1.9.0.custom (1)/jquery-ui-1.9.0.custom/js/jquery-1.8.2.js"></script>
<script type="text/javascript" src="../../../JavaScript/jquery-ui-1.9.0.custom (1)/jquery-ui-1.9.0.custom/js/jquery-ui-1.9.0.custom.js"></script>
<!--FIM BIBLIOTECAS JQUERY-->
<!--JAVASCRIPT PARA A AGENDA-->
<script type="text/javascript">

$(function() {
        
	$("#agenda_data").datepicker({
            
            showButtonPanel:true
        });
	});
function incluir_dados(v)
{

	
	pesquisa(v);
	alert("Evento cadastrado com sucesso");


}

function pesquisa(valor)
{
	
	var nome = " ";
	var agenda_data = document.getElementById("agenda_data").value;
	var agenda_descricao = document.getElementById("agenda_descricao").value;
	var agenda_endereco = document.getElementById("agenda_endereco").value;
	var agenda_local = " ";
	var horario_agenda = document.getElementById("horario_evento").value;
	
	

	if (window.XMLHttpRequest)
	{
		xmlhttp=new XMLHttpRequest();
	}
	else
	{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}

	if ((nome.length==0)&&(agenda_data.length==0)&&(agenda_descricao.length==0)&&(agenda_endereco.length==0)&&(agenda_local.length==0))
	{ 
		document.getElementById("cadastrar_agenda").innerHTML="";
		return;
	}

	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("cadastrar_agenda").innerHTML=xmlhttp.responseText;
		
		}
	}

	xmlhttp.open("GET","incluir.php?agenda_nome="+nome+"&agenda_data="+agenda_data+"&agenda_descricao="+agenda_descricao+"&agenda_endereco="+agenda_endereco+"&agenda_local="+agenda_local+"&id="+valor+"&horario_agenda="+horario_agenda,true);
	xmlhttp.send();
	
	
 		
}

</script>



Descreva o evento:<textarea name="agenda_descricao" id="agenda_descricao" cols="40" rows="5"></textarea><br />

Endereço do evento:<input type="text" name="agenda_endereco" id="agenda_endereco"/><br />

Horario do evento:<input type="text" name="horario_evento" id="horario_evento"/><br />

Data do evento:<input type="text" name="agenda_data" id="agenda_data" value="(Ano-Mes-Dia)" />


<?php
error_reporting(0);
	$agenda = $_GET["id"];
	
	if ($agenda == "")
	{
		echo 'Não ha eventos agendados';
	}	
	else
	{
		echo '<script type="text/javascript">

 $(document).ready(function(){
	 
	 $("#conteudo_agenda").load("buscar_agenda.php?e='.$agenda.'");
	 
	 
	 });
		 </script>';
	}

	echo' <input type="submit" name="enviar" id="btn_agendar" value="Agendar" onclick="incluir_dados('.$_GET["id"].')" />';
?>

<div id="cadastrar_agenda">
</div>
