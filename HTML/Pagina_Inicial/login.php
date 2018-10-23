<?php 
$login = $_POST['login'];
$senha = $_POST['senha'];


	
  $xml = simplexml_load_file("dados.xml");
  $Senha2 = '';
  //Percorer o array de informações
  foreach($xml->usuario as $dados)
  {
	  
	  if($dados->login == $login)
	  {
		  $Senha2 = $dados->senha ;
		  
	  }
  

  }
  
 

if($Senha2 == '')
{
	echo "<script>alert (\"Login inexistente\")</script>";
	header("location: formulario.php");
	
}
else
{





	if ( $senha == $Senha2)
	{
		session_start();
		$_SESSION['login'] = $login;
		$_SESSION['senha'] = $senha;
		
		
		header("location: acesso.php");		
	}
	else
	{
		 echo "<script>alert (\"Senha incorreta\")</script>";
	}

}

?>
