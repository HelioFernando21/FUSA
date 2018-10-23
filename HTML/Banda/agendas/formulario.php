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

<link rel="stylesheet" type="text/css" href="../../../JavaScript/jquery.alerts.css" />

<script src="../../../JavaScript/jquery.ui.draggable.js" type="text/javascript"></script>
<script src="../../../JavaScript/jquery.alerts.js" type="text/javascript"></script>

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
	


}

function pesquisa(valor)
{
	
		
	
	
	var nome = " ";
	var agenda_data = document.getElementById("agenda_data").value;
	var agenda_descricao = document.getElementById("agenda_descricao").value;
	var agenda_endereco = document.getElementById("agenda_endereco").value;
	var agenda_local = " ";
	var horario_agenda = document.getElementById("horario_evento").value;

	
		while (agenda_descricao.indexOf("\n") != -1)
		{
			agenda_descricao = agenda_descricao.replace("\n","</br>");
			
		}
		
		while (agenda_descricao.indexOf(" ") != -1)
		{
			agenda_descricao = agenda_descricao.replace(" ","+");
			
		}
		
		while (agenda_endereco.indexOf(" ") != -1)
		{
			agenda_endereco = agenda_endereco.replace(" ","+");
			
		}
		
		

	

	
	jAlert("Evento cadastrado com sucesso");
		 $("#add_agenda").load("incluir.php?agenda_data="+agenda_data+"&&agenda_descricao="+agenda_descricao+"&&agenda_endereco="+agenda_endereco+"&&id="+valor+"&&horario_agenda="+horario_agenda);
		 
	 
}

</script>
<div id="add_agenda">
</div>
<div id="digitar_eventos">

<p><a  class="form_a0">Data do evento:<input type="text" name="agenda_data" class="margin10" id="agenda_data" value="(Ano-Mes-Dia)" /></a></p>

<div id="arq2"><p><a  class="form_a">Horario do evento:<input type="text" name="horario_evento" class="margin10" id="horario_evento"/></a></p></div>

<div id="arq3">
<p><a  class="form_a">Endereço do evento:<input type="text" name="agenda_endereco" class="margin10" id="agenda_endereco"/></a></p></div>

<div id="arq4">
<p><a  class="form_a">Descreva o evento:</a><textarea name="agenda_descricao" id="agenda_descricao" cols="40" rows="5"></textarea></p></div>


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

</div>
