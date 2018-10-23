
<span style="color: white; border: solid 1px; background: red;"></span><html>

<head>
<title>Modal</title>

<link rel="stylesheet" href="../../../JavaScript/jquery-ui-1.9.1.custom/css/ui-lightness/jquery-ui-1.9.1.custom.css" />

<script src="../../../JavaScript/jquery-ui-1.9.1.custom/js/jquery-1.8.2.js" type="text/javascript"></script>
<script src="../../../JavaScript/jquery-ui-1.9.1.custom/js/jquery-ui-1.9.1.custom.js" type="text/javascript"></script>
</head>

<body>
<script>

$.fx.speeds._default = 1000;
$(function() {
	$( "#dialog" ).dialog({
		autoOpen: false,
		hide: "explode",
		resizable: false,
		modal: true
	});

	$(document).ready(function() {
		$("#dialog").dialog( "open" );
		return true;
	});
});
</script>

<form action="index.php" method="post" enctype="multipart/form-data" name="form1" id="dialog">
<p id="menor">  <input type="file" name="arquivo">
  <input type="submit" name="Submit" value="Enviar"></p>  
</form>

</body>

</html>