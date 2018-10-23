<?php
ob_start();
session_start();
?>
<script type="text/javascript" src="jquery-1.7.2.min.js"></script>
<script type="text/javascript">

function x () {	
	var auto_refresh = setInterval(
	function()
	{
	$('#digitar_videos').fadeOut('slow').load('buscar_videos.php?id=' + <?php echo $_SESSION["codigo"]; ?>).fadeIn("slow");
	}, 9000);
}

var W3CDOM = (document.createElement && document.getElementsByTagName);

function initFileUploads() {
	if (!W3CDOM) return;
	var fakeFileUpload = document.createElement('div');
	fakeFileUpload.className = 'fakefile';
	fakeFileUpload.appendChild(document.createElement('input'));
	var image = document.createElement('img');
	image.src='pix/button_select.gif';
	fakeFileUpload.appendChild(image);
	var x = document.getElementsByTagName('input');
	for (var i=0;i<x.length;i++) {
		if (x[i].type != 'file') continue;
		if (x[i].parentNode.className != 'fileinputs') continue;
		x[i].className = 'file hidden';
		var clone = fakeFileUpload.cloneNode(true);
		x[i].parentNode.appendChild(clone);
		x[i].relatedElement = clone.getElementsByTagName('input')[0];
		x[i].onchange = x[i].onmouseout = function () {
			this.relatedElement.value = this.value;
		}
	}
}

</script>
<style>
div.fileinputs {
	position: relative;
	float:left;
	margin-left:10px;
}

div.fakefile {
	position: absolute;
	top: 0px;
	left: 0px;
	z-index: 1;
	
}

input.file {
	position: relative;
	text-align: right;
	-moz-opacity:0 ;
	filter:alpha(opacity: 0);
	opacity: 0;
	z-index: 2;
}

</style>

<div id="digitar_videos" >
	<form name="form" id="form" method="post" enctype="multipart/form-data" action="up.php?id=<?php echo $_SESSION["codigo"]; ?>" target="alvo">				
     <div id="arq1">
     <a class="form_a">Escolha o vídeo: </a>   
     <div class="fileinputs">                     
	 <input  type="file" name="arquivo" class="file">
    	<div class="fakefile">
        <img src="../../../Design/bt_arquivo.png" />
        </div>
     </div></div>
     
     <div id="arq22">

    <a class="form_a">Escolha uma imagem: </a>   
     <div class="fileinputs">                     
	 <input  type="file" name="arquivo2" class="file">
    	<div class="fakefile">
        <img src="../../../Design/bt_arquivo.png" />
        </div>
     </div></div>
    
    
    <p><a class="form_a2">Escolha o estilo:</a>
	<label for="cmbEstilo"></label>
	<select name="cmbEstilo" id="cmbEstilo"></p>
    
    <?php
    	$conecta = mysql_connect("localhost","root","root");
		$banco = mysql_select_db("banco_tcc_fusa");
	
		$i = 0;

		$sql = mysql_query("SELECT cd_estilo,nm_estilo FROM tipos_estilos ;") or die;
	
		while($linha = mysql_fetch_array($sql))
		{
					echo utf8_encode('<option value="'.$linha[0].'">'.$linha[1].'</option>');
		}
									
		mysql_close($conecta);
									
	  ?>
      </select> 
    
    <p>
    <a  class="form_a3">Nome do vídeo:</a>
	<input type="text" name="txtTexto" id="txtTexto" ></p>
    
    <p>
    <a  class="form_a4">Descrição do vídeo:</a>
    <textarea name="txtDescricao" id="txtDescricao" cols="63" rows="5"></textarea></p>
    
	<input type="submit" id="carregar" value="Enviar" onclick="x()">
	</form>
    <iframe frameborder="0" scrolling="no" width="500" height="30" name="alvo"></iframe>

</div>
