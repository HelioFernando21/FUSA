<?php
error_reporting(E_ALL ^E_NOTICE^E_WARNING);  
?>

<!DOCTYPE HTML> 
<html lang="en"> 
<head> 


<meta http-equiv="content-type" content="text/html; charset=utf-8" /> 

<title>HTML5 Drag & Drop Uploader</title>

<style>
body { padding: 20px 10px; color:#333; font: normal 12px sans-serif; }
#devcontainer { margin: 0 auto; width: 940px; }
</style>
<!-- jquery -->
<script src="../../../../JavaScript/jquery-1.7.2.min.js" type="text/javascript"></script> 

</head> 

<body> 
<div id="devcontainer">
<!-- development area -->
<script src="droparea.js" type="text/javascript"></script> 
<style> 
.droparea {
	position:relative;
	text-align: center;
	border: 2px dashed #ddd;
	
}		
.droparea.over {
	background: #ffa;
	border: 2px dashed #000;
}
.droparea .progress {
	position:absolute;
	bottom: 0;
	width: 100%;
	height: 0;
	color: #fff;
	background: #6b0;
}
.spot {
	
    margin-bottom:20px;
    width: 460px;
	height: 345px;
}
.thumb {
	
    float: left;
    margin-right:17px;
    width: 140px;
	height: 105px;
}
.desc {
    float:right;
    width: 460px;
}
.signature a { color:#555; text-decoration:none; }
.signature img { margin-right:5px; vertical-align: middle; }
</style> 

    <div class="desc">
    <p><b>É só arrastar e soltar na caixa que o upload é realizado de acordo com o tamanho da DIV selecionada</b>.</p>
    <p>&nbsp;</p>
    </div>

    <div class="droparea spot" data-width="460" data-height="345" data-type="jpg" data-crop="true" data-quality="60"></div>

    <div class="droparea thumb" data-width="140" data-height="105" data-type="jpg" data-crop="true" data-quality="60"></div>
    <div class="droparea thumb" data-width="140" data-height="105" data-type="jpg" data-crop="true" data-quality="60"></div>
    <div class="droparea thumb" data-width="140" data-height="105" data-type="jpg" data-crop="true" data-quality="60"></div>


<script>
// Calling jQuery "droparea" plugin
$('.droparea').droparea({'post':'upload.php'});
</script>

<!-- /development area -->
</div>
</body>
</html> 
