function pesquisa()
{
var str = document.getElementById("txtTexto").value;

if (window.XMLHttpRequest)
{
	xmlhttp=new XMLHttpRequest();
}
else
{
	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}

if (str.length==0)
{ 
	document.getElementById("curtir").innerHTML="";
	return;
}

xmlhttp.onreadystatechange=function()
{
	if (xmlhttp.readyState==4 && xmlhttp.status==200)
	{
		document.getElementById("curtir").innerHTML=xmlhttp.responseText;
		
	}
}

xmlhttp.open("GET","inserir_recado.php?q="+str,true);
xmlhttp.send();
xmlhttp.alert("oi");

}
