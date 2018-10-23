<?php
ob_start();
session_start();
error_reporting(0);
?>


<script type="text/javascript" src="../../JavaScript/jquery-1.7.2.min.js"></script>

<script>

	
	
	
		function procurar_amigos()
	{
		var valor = document.getElementById("search_pessoas_input").value;
		
		if (valor != "")
		{
			window.location = "../solo/amigos/procurar_amigos.php?id="+valor;
		
		}
	}
</script>

<?php

if ($_SESSION['login'] != "")
{
	if ($_SESSION['tipo'] == 1)
	{
		echo '<script>window.location = "/Fusa/HTML/Solo/index.php";</script>';
	}
	else
	{
		if ($_SESSION['tipo'] == 2)
		{
		     echo '<script>window.location = "/Fusa/HTML/Banda/index.php";</script>';
		}
		else
		{
			if ($_SESSION['tipo'] == 3)
			{
				  echo '<script>window.location = "/Fusa/HTML/Visitante/index.php";</script>';
			}
			else
			{
				if ($_SESSION['tipo'] == 4)
				{
					  echo '<script>window.location = "/Fusa/HTML/Produtor/ranque/index.php";</script>';
				}
			}
		}
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bem-vindo ao Fusa</title>
<link rel="stylesheet" type="text/css" href="../../CSS/index_inicial.css" media="screen" />
<script src="../../JavaScript/jquery-1.7.2.min.js" type="text/javascript"></script>


</head>
<body>

<div id="principal">

<div id="barra">  
            <a href="index.php"><div id="Fusa_home"></div></a>
                            
            <div id="procurar_users">

            <input type="text" id="search_pessoas_input" placeholder="Procurar Usuários" /> <input type="submit" value="" id="go_search" onClick="procurar_amigos()"/>
            
            </div>
        
            <div id="infos_user">
            	<div id="texto_auxiliar">
                	<p class="p_frase">Faça seu login ou <a href="#">cadastre-se!</a></p>
                </div>
                    <div id="logar2">
                    
                    <?php include("formulario.php"); ?>
                    <a href="#" class="aFORGET">Esqueci minha senha</a></p>
                    
                    </form>
                    </div>
            </div>
    </div>

<div id="conteudo">

<img src="../../Design/create_acc.png" id="img2" />
<img src="../../Design/linhas_inicial.png" id="img" />
<div id="esquerda"><a href="#" id="VisitanteLINK"><p class="links1">Visitante</p></a></div>
<div id="direita"><a href="#" id="ArtistaLINK"><p class="links2">Artista</p></a></div>
<div id="meio"></div>

<div id="HIDE_Visitante">

<p class="frase1">Selecione uma das opções:</p>

<form id="cadastro_visitante">
<p class="recuar">Visitante: <input name="" type="checkbox" value="" /> <br />
Produtor: <input name="" type="checkbox" value="" /></p>

<p>Nome: <input type="text" id="email_visitante" /></p>
<p>Email: <input type="text" id="email_visitante" /></p>
<p>Senha: <input type="text" id="senha_visitante" /></p>
<p class="recuar2">Repita Senha: <input type="text" id="again_email_visitante" /></p>

<input type="submit" value="Cadastrar" id="btn_cadastrar_visitante" />

</form>

</div>
<div id="HIDE_Artista">

<p class="frase2">Selecione uma das opções:</p>

<form id="cadastro_artista">
<p class="recuar">Banda: <input name="" type="checkbox" value="" /> <br />
Artista solo: <input name="" type="checkbox" value="" /></p>

<p class="recuar">Estilo: <select name=""><option> Rock Alternativo </option></select></p>
<p>Email: <input type="text" id="email_artista" /></p>
<p>Senha: <input type="text" id="senha_artista" /></p>
<p class="recuar2">Repita Senha: <input type="text" id="again_email_artista" /></p>

<input type="submit" value="Cadastrar" id="btn_cadastrar_artista" />
</form>

</div>

</div>

</div>
</div>
<div id="rodape">

<a href="../Rodape/sobreafusa.php" class="float"><p class="space">Sobre a Fusa -</p></a>  
<a href="../Rodape/produtores.php" class="float"><p class="color">Produtores -</p></a>
<a href="../Rodape/contato.php" class="float"><p class="color">Contato</p></a>

</div>

<script type="text/javascript"> 

$(document).ready(function(){
$('#VisitanteLINK').click(function(){		
   		$('#HIDE_Visitante').slideToggle("slow");
		$('#HIDE_Artista').fadeOut("slow");
		});
		
		
		$('#ArtistaLINK').click(function(){		
   		$('#HIDE_Artista').slideToggle("slow");
		$('#HIDE_Visitante').fadeOut("slow");
		
		
		});
});
</script>

</div>
</div>
</div>
</body>
</html>