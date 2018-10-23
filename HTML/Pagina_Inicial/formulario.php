<?php
ob_start();
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sem título</title>
<script src="../../JavaScript/jquery-1.7.2.min.js" type="text/javascript"></script>

<style>

.p_frase {
	color:#000;	
	margin-left:-15px;
}

.p_class {
	margin-left:-13px;
	position:relative;
	color:#000;	
}

</style>

</head>

<body>


<div id="infos_user">
                    <div id="logar">

<form action="#" method="post">
<p class="p_class">Login: <input type="text" name="login" id="senha" /> 
Senha: 
<input type="password" name="senha" id="senha"/>
<input type="submit" value="Entrar" id="bt_entrar"/></p>
<input type="hidden" value="<?php $caminho = $_SERVER['REQUEST_URI'];?>" name="caminho" />
</form>
</div>
</div>

<?php 
if (!isset($_POST["caminho"]))
{

}
else
{
	
$caminho = $_POST["caminho"];
error_reporting(0);
$login = $_POST['login'];
$senha = $_POST['senha'];

if( (strlen($login)>0) && (strlen($senha)>0) )
{
	      $Senha2 = '';
				
		  $conecta = mysql_connect("localhost","root","root");
		  $banco = mysql_select_db("banco_tcc_fusa");
		  
		  $sql = mysql_query("SELECT us.cd_usuario,us.nm_usuario,us.cd_tipo_usuario,us.nm_senha, fo.nm_destino_foto  FROM usuarios us inner join fotos fo on (us.cd_usuario = fo.cd_usuario) where  (fo.cd_situacao_perfil = 1) and (nm_login = '".$login."') ;") or die;
		  
		  while($linha = mysql_fetch_array($sql))
		  {
			  $CdUsuario = $linha[0];
			  $NmUsuario = $linha[1];
			  $Tipo = $linha[2];
			  $Senha2 = $linha[3];
			  $foto = $linha[4];
		  }
			mysql_close($conecta);

	  if($Senha2 == '')
	  {
		  echo "<script>alert (\"Login inexistente\")</script>";
	  }
	  else
	  {
		  if ($senha == $Senha2)
		  {
			
			  $_SESSION['login'] = $login;
			  $_SESSION['senha'] = $senha;
			  $_SESSION['codigo'] = $CdUsuario;
			  $_SESSION['nome'] = $NmUsuario;
			  $_SESSION['tipo'] = $Tipo;
			  $_SESSION['foto_perfil'] = $foto;
			  
			  
			  /*$texto = $_SERVER['REQUEST_URI'];
			  
			  $i=1;
			  $diretorio = "";
			  do
			  {
				  if($texto[$i] == "/")
				  {
							  
					  $diretorio = $diretorio."../";
				  }
				  
			  $i++;
			  }
			  while(strlen($_SERVER['REQUEST_URI']) > $i+1);
			  
			  $diretorio;*/
			  if ($Tipo == 1)
			  {
			  		echo "<script>window.location=\"$caminho\";</script>";
			  }
			  else
			  {
				  if ($Tipo == 2)
				  {
					  echo "<script>window.location=\"$caminho\";</script>";
				  }
				  else
				  {
					  if ($Tipo == 3)
					  {
						  echo "<script>window.location=\"$caminho\";</script>";
					  }
					  else
					  {
						  if ($Tipo == 4)
						  {
							  echo "<script>window.location=\"$caminho\";</script>";
						  }
					  }
				  }
			  }
			  //header("location: /Fusa/HTML/Pagina_Inicial/acesso.php");		
		  }
		  else
		  {
			   echo "<script>alert (\"Senha incorreta\")</script>";
		  }
	  
	  }
}
}
?>

</body>
</html>