<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
</head>

<body>

<form method="post" enctype="multipart/form-data" action="#" id="form1">
						
	<input  type="file" name="arquivo1" /></br>
	<textarea name="txtTexto1" id="txtTexto1" cols="45" rows="5"></textarea> </br>
	<input type="submit" id="carregar1" value="Enviar1">
    <?php
	
						 		 @move_uploaded_file($_FILES["arquivo1"]["tmp_name"],"{$_FILES["arquivo1"]["name"]}");
    ?>
	</form>
    
    <form method="post" enctype="multipart/form-data" action="#" id="form2">
						
	<input  type="file" name="arquivo2" /></br>
	<textarea name="txtTexto2" id="txtTexto2" cols="45" rows="5"></textarea> </br>
	<input type="submit" id="carregar2" value="Enviar2">
    <?php
	
						 		 @move_uploaded_file($_FILES["arquivo2"]["tmp_name"],"{$_FILES["arquivo2"]["name"]}");
    ?>
	</form>
    
    
</body>
</html>