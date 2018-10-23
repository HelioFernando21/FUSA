<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Agenda</title>
<script type="text/javascript">
        var GB_ROOT_DIR = "../../../JavaScript/greybox/greybox/";
    </script>

    <script type="text/javascript" src="../../../JavaScript/greybox/greybox/AJS.js"></script>
    <script type="text/javascript" src="../../../JavaScript/greybox/greybox/AJS_fx.js"></script>
    <script type="text/javascript" src="../../../JavaScript/greybox/greybox/gb_scripts.js"></script>
    <link href="../../../JavaScript/greybox/greybox/gb_styles.css" rel="stylesheet" type="text/css" media="all" />

    <script type="text/javascript" src="../../../JavaScript/greybox/static_files/help.js"></script>
    
<!--FIM LINKS CSS-->
<link rel="stylesheet" type="text/css" href="../../../CSS/estilo_agenda.css" />
<link rel="stylesheet" type="text/css" href="../../../JavaScript/jquery-ui-1.9.0.custom (1)/jquery-ui-1.9.0.custom/css/cupertino/jquery-ui-1.9.0.custom.css" />



<!--FIm LINKS CSS-->
<!--BIBLIOTECAS JQUERY-->
<script type="text/javascript" src="../../../JavaScript/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="../../../JavaScript/jquery-ui-1.9.0.custom (1)/jquery-ui-1.9.0.custom/js/jquery-1.8.2.js"></script>
<script type="text/javascript" src="../../../JavaScript/jquery-ui-1.9.0.custom (1)/jquery-ui-1.9.0.custom/js/jquery-ui-1.9.0.custom.js"></script>
<!--FIM BIBLIOTECAS JQUERY-->
<!--JAVASCRIPT PARA A AGENDA-->
<script type="text/javascript">

 $(document).ready(function(){
	 var texto = window.location;
	 var v =  texto.toString();
	 var valor = v.split("=");
	 
	 $("#dad").load("buscar_agenda.php?e="+valor[1]);
	 
	 });
		
$(function() {
        
	$("#agenda_data").datepicker({
            numberOfMonths:3,
            showButtonPanel:true
        });
	});
 



function incluir_dados(v)
{


	pesquisa(v);
	carregar(2);

}

function pesquisa(valor)
{
	
	var nome = document.getElementById("agenda_nome").value;
	var agenda_data = document.getElementById("agenda_data").value;
	var agenda_descricao = document.getElementById("agenda_descricao").value;
	var agenda_endereco = document.getElementById("agenda_endereco").value;
	var agenda_local = document.getElementById("agenda_local").value;
	

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

	xmlhttp.open("GET","incluir.php?agenda_nome="+nome+"&agenda_data="+agenda_data+"&agenda_descricao="+agenda_descricao+"&agenda_endereco="+agenda_endereco+"&agenda_local="+agenda_local+"&id="+valor,true);
	xmlhttp.send();
	
	
 		
}

function excluir_agenda(v)
{
	
	if (confirm("Deseja excluir esse evento?"))
	{
		$("#excluir_agenda").load("excluir.php?e="+v);
		 carregar(1);
	}
	 
	 
	 
	
	 
	
	
}

function carregar(v)
{
	
	 
	 var texto = window.location;
	 var v =  texto.toString();
	 var valor = v.split("=");
	 
	 $("#dad").load("buscar_agenda.php?e="+valor[1]);
	 
	

	 if (v == 1)
	 {
	 	alert("evento excluido com sucesso");
	 }
	 else
	 {
		 	alert("Dados cadastrados com sucesso");
	 }
}

</script>
<!--FIM JAVASCRIPT PARA A AGENDA-->
</head>
<body>

<div id="principal">

<?php
	
?>

	<div id="barra">  
            <a href="index.php"><div id="Fusa_home"></div></a>
                            
            <div id="procurar_users">
            <form method="post" name="procurar">
            <input type="text" id="search_pessoas_input" /> <input type="submit" value="K" />
            </form>
            </div>
        
            <div id="infos_user"></div>
    </div>

<div id="conteudo">

			<div id="coluna1">
			<a href="profile.php"><div id="foto_user"></div></a>
            	<p class="p_amigos">Amigos</p>
            	<div id="amigos_user">
                
              	<a href="#"><div id="amigo1"></div></a>
                <a href="#"><div id="amigo2"></div></a>
                <a href="#"><div id="amigo4"></div></a>
                <a href="#"><div id="amigo5"></div></a>
                <a href="#"><div id="amigo6"></div></a>
                <a href="#"><div id="amigo7"></div></a>
                <a href="#"><div id="amigo8"></div></a>
                <a href="#"><div id="amigo9"></div></a>
                
                </div>
			</div>

<div id="coluna2">
<div id="menu">
        <a href="videos.php"><div id="bt1"> <p class="p_link_esq"> Vídeos </p> </div></a>
        <a href="fotos.php"><div id="bt2"> <p class="p_link"> Fotos </p> </div></a>
        <a href="lyrics.php"><div id="bt3"> <p class="p_link"> Lyrics</p> </div></a>
        <a href="referencias.php"><div id="bt4"> <p class="p_link_ref"> Referências</p> </div></a>
        <a href="agenda.php"><div id="bt5"> <p class="p_link_dir"> Agenda</p> </div></a>
</div>

<div id="segura_conteudo">

			<div id="caixa_uploud_evento">
                     
    		
            <?php
	echo '<a id="bt_uploud_evento" href="formulario.php?id='.$_GET["id"].'" title="Adicionar Evento"  rel="gb_page_center[700, 550]">Adicionar Evento</a>';
?>
            
            </div>

			<div id="agenda">
                    <div id="titulos"> 
                            <div id="t_agenda"><h1>Agenda</h1></div>
                            <div id="t_def_colunas"><h2>Data</h2>  <h2>Hora</h2> <h2 class="h_title">Local</h2> <h2 class="h_title">Complementos</h2></div>
                    </div>

				<div id="dad">     
                
                    
                    
            </div>
</div>       
</div>

</div>
</div>

<div id="cadastrar_agenda">
</div>

<div id="excluir">
</div>

</div>
<div id="rodape">
<a href="#" class="c_rodape">Sobre a Fusa</a>
<a href="#" class="c_rodape">Produtores</a>
<a href="#" class="c_rodape">Contato</a>            
</div>

<div id="excluir_agenda">
</div>


<script>

$(function(){			  
  $('#eventos').slimscroll({
	  width: '100%',
	  height: '100%',
	  distance: '5px',
	  start: 'top',
	  alwaysVisible: false
  });			  
 });

</script>

</body>
</html>