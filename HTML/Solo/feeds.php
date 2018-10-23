<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="../../JavaScript/jquery-ui-1.9.0.custom (1)/jquery-ui-1.9.0.custom/js/jquery-ui-1.9.0.custom.js" type="text/javascript"></script>
<script src="../../JavaScript/jquery-ui-1.9.0.custom (1)/jquery-ui-1.9.0.custom/js/jquery-1.8.2.js" type="text/javascript"></script>

<script type="text/javascript">

$(document).ready(function(){
	
	$(".titulo").slideDown(1000);
	
	
	});


</script>
<title>Leitor de FEED</title>

<!--Lembrar de fazer efeitos Jquery-->
<style type="text/css">
.titulo {
	background-color: #0d88cc;
	padding: 5px;
	border: 1px solid #8bacbe;
	margin: 10px;
	border-bottom-left-radius:10px;
	-moz-border-bottom-left-radius:10px;
	border-top-right-radius:8px;
	-moz-border-top-right-radius:8px;
	display:none;
}

#teste {
	background-color:red;
	width:300px;
	height:300px;
}

</style>
</head>

<body>
<h1>FEED Terra</h1>
<?php
$feed = file_get_contents('arquivo_terra.xml');
$rss = new SimpleXmlElement($feed);

foreach($rss->channel->item as $entrada) 
{
		echo '<p class="titulo">';
		echo '<a id="titulo_noticia" href="'. $entrada->link . '">'; 
		echo $entrada->title;
		echo '</a>';
		echo '<br><em>"'. $entrada->description.'"</em>';
		echo '</p>';
		$total = count($rss->channel->item);
}
//echo "Total de Noticias: ".$total;
?>

</body>
</html>