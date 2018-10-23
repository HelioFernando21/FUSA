<?php
ob_start();
session_start();
?>
<input type="text" />
<script type="text/javascript" src="../CSS/jquery-1.7.2.min.js"></script>
<?php
$valor = 0;
echo '<form  enctype="multipart/form-data" >
						
						<input  type="file" name="arquivo" /></br>
						<textarea name="txtTexto" id="txtTexto" cols="45" rows="5"></textarea> </br>
						<input type="button" id="carregar" value="Enviar" >
						
						</form>';
						
?>
<?php
	include("teste.php");
?>

<script type="text/javascript">
	function oi(v)
	{
		alert(v);
	}	
</script>
