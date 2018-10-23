<?php
ob_start();
session_start();
?>
<script type="text/javascript" src="jquery-1.7.2.min.js"></script>

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

<div id="digitar_referencia" >

    
    <div id="arq222">
    <form method="post" enctype="multipart/form-data" action="up.php?id=<?php echo $_SESSION["codigo"]?>" target="alvo">
     <a class="form_a">Escolha uma imagem: </a>   
     <div class="fileinputs">                     
	 <input  type="file" name="arquivo" class="file">
    	<div class="fakefile">
        <img src="../../../Design/bt_arquivo.png" />
        </div>
     </div></div>
    
    <p>
    <a  class="form_a5">Título:</a>
    <input type="text" name="txtTexto" id="txtTitulo" ></p>
    
    
    <p>
    <a  class="form_a6">Descrição:</a>
	<textarea name="txtTexto" id="txtTexto" cols="45" rows="5"></textarea></p>
	<input type="submit" id="carregar" value="Enviar">
	</form>
   </div>
       <iframe frameborder="0" scrolling="no" width="500" height="30" name="alvo"></iframe>
