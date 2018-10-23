<?php
error_reporting(0);
ob_start();
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Resultados - Fusa</title>
<link rel="stylesheet" type="text/css" href="../../CSS/estilo_colors.css" />
<link rel="stylesheet" type="text/css" href="../../CSS/estilo_amigo_resultado.css" />
<script src="../../JavaScript/jquery-ui.js" type="text/javascript"></script>
<script src="../../JavaScript/jquery-1.7.2.min.js" type="text/javascript"></script>

<script type="text/javascript">
	function MenuEstado(valor)
	{
		
		$(document).ready(function() {
			$("#cidade").load('Cidades.php?id='+valor);	
		});
	}
	
	$(document).ready(function() {
	texto = window.location;
		v = texto.toString();
		valor = v.split("=");
		valor2 = valor[1].split(";;e;;");
		
		if (valor[1] != "")
		{
			
			$("#conteudo_usuario").load('conteudo_procura.php?id='+valor2[0]+';;e;;'+valor2[4]+';;e;;'+valor2[5]+';;e;;'+valor2[3]);
		}
	
	});
	
	function ProcurarIntegrante()
	{
		
		var estilo = document.getElementById("jumpMenu1").value;
		var estado = jumpMenu2.options[jumpMenu2.selectedIndex].text ;
		var cidade = jumpMenu3.options[jumpMenu3.selectedIndex].text;
		var instrumento = document.getElementById("jumpMenu4").value;
	
		while (estado.indexOf(" ") != -1)
		{
			estado = estado.replace(" ","+");
			
		}
		
		while (cidade.indexOf(" ") != -1)
		{
			cidade = cidade.replace(" ","+");
			
		}
		
		$(document).ready(function() {
			$("#conteudo_usuario").load('conteudo_procura.php?id='+estilo+';;e;;'+estado+';;e;;'+cidade+';;e;;'+instrumento);	
		});
	}

</script>

<script>
function Procurar_Videos()
	{
		var valor = document.getElementById("search_video").value;
		if (valor !=  "")
		{
				window.location = "../../Procurar/videos.php?id="+valor;
		}
	}
	
		function procurar_amigos()
{
	var valor = document.getElementById("search_pessoas_input").value;
	
	if (valor != "")
	{
		window.location = "../solo/amigos/procurar_amigos.php?id="+valor;
	
	}
}
	
</script>
</head>
<body>

<div id="principal">
		<div id="barra">  
     <?php
		
	
		if ($_SESSION["tipo"] == 1)
		{
		 	echo  '<a href="../Solo/index.php"><div id="Fusa_home"></div></a>';
		}
		else
		{
			if ($_SESSION["tipo"] == 2)
			{
				echo  '<a href="../Banda/index.php"><div id="Fusa_home"></div></a>';
			}
			else
			{
				if ($_SESSION["tipo"] == 3)
				{
					echo  '<a href="../Visitante/index.php"><div id="Fusa_home"></div></a>';
				}
				else
				{
					if ($_SESSION["tipo"] == 4)
					{
						echo  '<a href="../Produtor/ranque/index.php"><div id="Fusa_home"></div></a>';
					}
				}
			}
		}
	
	?>
                            
            <div id="procurar_users">

            <input type="text" id="search_pessoas_input" placeholder="Procurar Usuários" /> <input type="submit" value="" id="go_search" onclick="procurar_amigos()" />

            </div>
        
            <div id="infos_user">
            
                    
                    	<?php
					if ($_SESSION["codigo"] == "")
					{
						echo ' <div id="texto_auxiliar">
                					<p class="p_frase">Faça seu login ou <a href="#">cadastre-se!</a></p>
              				  </div>';
					} 
			
				?>
           
                    <div id="logar">
            	<?php
	error_reporting(0);
		$texto = $_SERVER['REQUEST_URI'];
		
			  
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
			  
			  
			  
			  include($diretorio."FUSA/HTML/Pagina_Inicial/acesso.php");
			  //echo 'oi msm';
	?>
            </div>
    </div>
    </div>
    
<div id="conteudo">
	
<div id="coluna2">    
    <div id="amigo">

<div  id="form_search">
               <p class="p_E">Estilo: <select name="jumpMenu" id="jumpMenu1" onChange="MM_jumpMenu('parent',this,0)">
                
                			<?php
								$passou = 0;
									if ( $_GET["id"] != "" )
									{
										$valor = explode(";;e;;",$_GET["id"]);
									}
									
									
									
									$conecta = mysql_connect("localhost","root","root");
									$banco = mysql_select_db("banco_tcc_fusa");

									$concatenar = "";
									
									$sql = mysql_query("SELECT * FROM tipos_estilos ;") or die;
									
									
									$concatenar .=  '<option  value="valor">---- Selecione ----</option>';
									
									if ($valor[0] == "Todos")
									{
										echo '<option value="Todos">---- TODOS ----</option>';
									}
									else
									{
										$concatenar .= '<option value="Todos">---- TODOS ----</option>';
									}
									while($linha = mysql_fetch_array($sql))
									{
										if ($valor[0] == $linha[0])
										{
											echo '<option  value="'.$linha[0].'">'.$linha[1].'</option>';
											
										}
										else
										{
											$concatenar .= '<option  value="'.$linha[0].'">'.$linha[1].'</option>';
										}
									}
									
									mysql_close($conecta);
									
									echo $concatenar;
	
                            ?>
                            
                           
                  </select>
                </p>
                
                <p class="p_EC">Estado: <select name="jumpMenu" id="jumpMenu2" onChange="MenuEstado(this.value)">
                         
                           
                           <?php
						   		$concatenar = "";
								
								$concatenar .= '  <option value="Valor">---- Selecione ----</option>';
								if ($valor[1] == "Todos")
									{
										echo '<option value="Todos">---- TODOS ----</option>';
									}
									else
									{
										$concatenar .= '<option value="Todos">---- TODOS ----</option>';
									}
									
      
						   
								$xml = simplexml_load_file("../../XML/estados.xml");
								// laço dentro da tag dados para cada tag dados que encontrar
									foreach($xml->xpath('//ESTADO') as $dados)
								{
									// armazena na var $registro o conteudo do nó dados
									$registro = simplexml_load_string($dados->asXML());
								
									
										if ($valor[1] == $dados->ID)
										{
										   echo '<option value="'.$dados->ID.'">'.$dados->NOME.'</option>';
											$estado = $dados->ID;
											 $passou = 1;
										  
										}
										else
										{
											$concatenar .= '<option value="'.$dados->ID.'">'.$dados->NOME.'</option>';
										}
											
											
							
									   
								   
								}
									echo $concatenar;
                           ?>
                           
                  </select>
                  
                  <?php
				 	
                  ?>
                </p>
                <div id="cidade">
                	<?php
					
					if ($passou == 0)
					{
							echo 	'
                	<p class="p_EC">Cidade: <select name="jumpMenu" id="jumpMenu3" onChange="MM_jumpMenu("parent",this,0)">
                	          ';
                              if ($valor[2] == "Todos")
									{
										echo '<option value="Todos">---- TODAS ----</option>';
										echo ' <option>---- Selecione ----</option>';
									}
									else
									{
										echo ' <option>---- Selecione ----</option>';
										echo '<option value="Todos">---- TODAS ----</option>';
									}
               				  echo ' </select></p>';
					}
					else
					{
	
							if ($valor[2] != "")
							{
										echo '<script type="text/javascript">
										$(document).ready(function() {
					$("#cidade").load("Cidades.php?id='.$estado.';'.$valor[2].'");	
				}); </script>';
							}
					}
					?>
               		 
                </div>
                
                <p>Instrumento: <select name="jumpMenu" id="jumpMenu4" onChange="MM_jumpMenu('parent',this,0)">
                			
                          
                           
                           <?php
						   		$concatenar = "";
								$concatenar .= ' <option>---- Selecione ----</option>';
                           			if ($valor[3] == "Todos")
									{
										echo '<option value="Todos">---- TODOS ----</option>';
									}
									else
									{
										$concatenar .= '<option value="Todos">---- TODOS ----</option>';
									}
									$conecta = mysql_connect("localhost","root","root");
									$banco = mysql_select_db("banco_tcc_fusa");

	
									
									$sql = mysql_query("SELECT * FROM tipos_instrumentos t;") or die;
									
									
									while($linha = mysql_fetch_array($sql))
									{
										if ($linha[0] == $valor[3])
										{
											echo '<option  value="'.$linha[0].'">'.$linha[1].'</option>';
										}
										else
										{
											$concatenar .= '<option  value="'.$linha[0].'">'.$linha[1].'</option>';
										}
									}
									
									mysql_close($conecta);
									
									echo $concatenar;
						   ?>
                  </select>
                  
                  
                </p>
                
            
                <input type="submit" value="Procurar" id="btn_procurar" onclick="ProcurarIntegrante()"/>
                </div>
                
                <div id="conteudo_usuario">
                </div>           		
</div>
</div>
</div>
</div>
</body>
</html>
