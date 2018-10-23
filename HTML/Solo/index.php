<?php
ob_start();
session_start();
error_reporting(0);

if ($_SESSION["login"] == "")
{
	echo '<script>window.location = "/Fusa/HTML/Pagina_Inicial/index.php";</script>';
}
else
{
	
		if ($_SESSION["tipo"] == 2)
		{
			echo '<script>window.location = "/Fusa/HTML/Banda/index.php";</script>';
		}
		else
		{
			if ($_SESSION["tipo"] == 3)
			{
				echo '<script>window.location = "/Fusa/HTML/Visitante/index.php";</script>';
			}
		}
	
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home - Fusa</title>
<link rel="stylesheet" type="text/css" href="../../CSS/estilo_home.css" />
<link rel="stylesheet" type="text/css" href="../../CSS/scroller.css" />
<link rel="stylesheet" type="text/css" href="../../CSS/estilo_colors.css" />

<link rel="stylesheet" type="text/css" href="../../JavaScript/jquery.alerts.css" />
<script src="../../JavaScript/jquery.js" type="text/javascript"></script>
<script src="../../JavaScript/jquery.ui.draggable.js" type="text/javascript"></script>
<script src="../../JavaScript/jquery.alerts.js" type="text/javascript"></script>

<script src="../../JavaScript/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="../../JavaScript/jquery-ui.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	//$('#carregando').hide();
//alert('oi recados');

$("#coluna2").load('../Feeds/feeds.php');	

$("#numbers").load('numeros.php');	
	
	});
	
	function convite_aceito(v)
	{
		
			var valor = v.split(";;e;;");

			if (valor[0] == 0)
			{
			
			$("#banco").load('concluir_convite.php?e='+v);	
			
			$('#carregando4').show();
			

			
			
			}
			else
			{
				if (valor[0] == 2)
				{
					
					$("#banco").load('concluir_convite.php?e='+v);	
					$('#carregando3').show();
	
			
				
					
				
					
				}
			}
						
	
		
	}
	
	function excluir_atualizacao(v,valor)
	{

			
			
			$("#banco").load('excluir_atualizacoes.php?e='+v);	
			
			$('#carregando').show();
			
			$("#mudancas").load('atualizacoes.php?id='+valor);
			

			$('#carregando').show();
			
		
	}
	function opcao(v)
	{
		var valor = v.split(";");
		if (valor[0] == 1)
		{
			

			$("#conteudo_troca1").load('atualizacoes.php?id='+valor[1]);	
			
				$('#carregando').show();
	

		}
		else
		{
			if (valor[0]==4)
			{
				$('#carregando4').show();
				$("#conteudo_troca4").load('convite.php?id='+valor[1]);	
				
				
			}
			else
			{
				if (valor[0] == 3)
				{
					$('#carregando3').show();
					$("#conteudo_troca3").load('convite_banda.php?id='+valor[1]);	
				}
				else
				{
					if (valor[0] == 2)
					{
						$('#carregando2').show();
						$("#conteudo_troca2").load('proposta.php?id='+valor[1]);	
					}
				}
			} 
		}
	}	
	
	function redirecionar_atualizacao(v)
	{
		
		//situacao_atualizacao(v);
		//var valor = v.split(";;e;;");
		redirecionar2(v);
	
	}
	
	function redirecionar2(valor)
	{
			
			$("#banco").load('situacao_atualizacao.php?id='+valor);	

	}
	
	function MenuEstado(valor)
	{
		
		$("#cidade").load('Cidades.php?id='+valor);	
	}
	
	function ProcurarIntegrante()
	{
		cidade = jumpMenu3.options[jumpMenu3.selectedIndex].text;
		 estado = jumpMenu2.options[jumpMenu2.selectedIndex].text ;
		while (estado.indexOf(" ") != -1)
		{
			estado = estado.replace(" ","+");
			
		}
		
		while (cidade.indexOf(" ") != -1)
		{
			cidade = cidade.replace(" ","+");
			
		}
		
		window.location = "../Procurar/procurar.php?id="+document.getElementById("jumpMenu1").value+";;e;;"+document.getElementById("jumpMenu2").value+";;e;;"+document.getElementById("jumpMenu3").value+";;e;;"+document.getElementById("jumpMenu4").value+";;e;;"+estado+";;e;;"+cidade;
		
	}
	
	
	function Procurar_Videos()
	{
		var valor = document.getElementById("search_video").value;
		if (valor !=  "")
		{
			
				window.location = "../Procurar/videos.php?id="+valor;
			
		
		}
	}
	
	function aceitar_proposta(valor)
	{
		var valor2 = valor.split(";");
		if(confirm('Deseja aceitar a proposta de '+ valor2[1] +' ?'))
		{
				$('#carregando2').show();
				$("#banco").load('aceitar_proposta.php?e='+valor2[0]);
				
				
				
			//	$("#conteudo_troca2").load('proposta.php?id='+valor2[2]);	
				//$('#carregando2').show();
				
		}
		else
		{
			$('#carregando2').hide();
		}
	}
	
	
	function procurar_amigos()
{
	var valor = document.getElementById("search_pessoas_input").value;
	
	if (valor != "")
	{
		window.location = "amigos/procurar_amigos.php?id="+valor;
	
	}
}
</script>

</head>
<body>

<div id="principal">

<div id="barra">  
            <a href="index.php"><div id="Fusa_home"></div></a>
                            
            <div id="procurar_users">
         
            <input type="text" id="search_pessoas_input" placeholder="Procurar Usuários" /> <input type="submit" value="" onclick="procurar_amigos()" id="go_search" />
            
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

<div id="conteudo">
	<div id="coluna1">
			<?php
            	echo '<a href="Profile/profile.php?id='.$_SESSION["codigo"].'"><img id="foto_user" src="../Usuarios/'.$_SESSION["foto_perfil"].'" /> </a>';
            ?>
			
            <div id="procurar_MV">
                <div id="linha_video"> <div id="icone_video"></div>  
                <div id="input_video">
                <form method="post" onSubmit="Procurar_Videos()">
                <input type="text" id="search_video" placeholder="Procurar Vídeos"  />
                <input type="button" onClick="Procurar_Videos()" id="btn_video" />
                </form>                
                </div> 
                </div>
            </div>
    </div>        
<div id="coluna2">

</div>
        	<div id="coluna3">
         
            	<div id="BTS_Box">
                
         
                <?php
            	    echo '<a href="#" name="1;'.$_SESSION["codigo"].'" onClick="opcao(this.name)" ><div id="bt1"></div></a>';
					echo '<a href="#" name="2;'.$_SESSION["codigo"].'" onClick="opcao(this.name)" ><div id="bt2"></div></a>';
					echo '<a href="#" name="3;'.$_SESSION["codigo"].'" onClick="opcao(this.name)" ><div id="bt3"></div></a>';
					echo '<a href="#" name="4;'.$_SESSION["codigo"].'" onClick="opcao(this.name)" ><div id="bt4"></div></a>';
					echo '         <a href="#"><div id="bt5"></div></a>
                <a href="#"><div id="bt6"></div></a>';
				?>
  
             

       
                
                <div id="barrinha_azul"></div>
                
                </div>
                
                <div id="troca1">
                	
                 <p class="p_title">NOTIFICAÇÕES GERAIS</p>
                 <div id="conteudo_troca1">
                    </div>
                 <div id="carregando">
					<img src="videos/load.gif" />
			   	 </div>
            
            	
                </div>
                
                <div id="troca2">
                <p class="p_title">PROPOSTAS DE PRODUTORES</p>
          		     <div id="conteudo_troca2">
                    </div>
					<div id="carregando2">
						<img src="videos/load.gif" />
			  	 	 </div>           
                    
                    
                                      
                </div>
                
                <div id="troca3">
                 <p class="p_title">PROPOSTAS DE BANDAS</p>
                 	 <div id="carregando3">
						<img src="videos/load.gif" />
                     </div>
                    <div id="conteudo_troca3">
                    </div>
                
                   
                </div>
                
                <div id="troca4">
                <p class="p_title">PROPOSTAS DE AMIZADES</p>
                	 <div id="carregando4">
					<img src="videos/load.gif" />
			   	 </div>
                <div id="conteudo_troca4">
                </div>
                   
                    
                
                </div>
                <div id="troca5">
                <p class="p_pi">PROCURAR INTEGRANTES</p>
            
                 <div  id="form_search">
                <p class="p_E">Estilo: <select name="jumpMenu" id="jumpMenu1" >
                
                			<?php
									$conecta = mysql_connect("localhost","root","root");
									$banco = mysql_select_db("banco_tcc_fusa");

	
									
									$sql = mysql_query("SELECT * FROM tipos_estilos ;") or die;
									
									echo '<option  value="valor">---- Selecione ----</option>';
									echo '<option value="Todos">---- TODOS ----</option>';
									while($linha = mysql_fetch_array($sql))
									{
										echo '<option  value="'.$linha[0].'">'.$linha[1].'</option>';
									}
									
									mysql_close($conecta);
	
                            ?>
                            
                           
                  </select>
                </p>
                
                <p class="p_EC">Estado: <select name="jumpMenu" id="jumpMenu2" onChange="MenuEstado(this.value)">
                           <option value="Valor">---- Selecione ----</option>
                           <option value="Todos">---- TODOS ----</option>
                           
                           <?php
						   
								$xml = simplexml_load_file("../../XML/estados.xml");
								// laço dentro da tag dados para cada tag dados que encontrar
									foreach($xml->xpath('//ESTADO') as $dados)
								{
									// armazena na var $registro o conteudo do nó dados
									$registro = simplexml_load_string($dados->asXML());
								
									
										
										   echo '<option value="'.$dados->ID.'">'.$dados->NOME.'</option>';
											
											
								
									   
								   
								}
                           ?>
                           
                  </select>
                </p>
                <div id="cidade">
                	<p class="p_EC">Cidade: <select name="jumpMenu" id="jumpMenu3" >
                	           <option>---- Selecione ----</option>
                               <option value="Todos">---- TODAS ----</option>
               				   </select>
               		 </p>
                </div>
                
                <p>Instrumento: <select name="jumpMenu" id="jumpMenu4" >
                			
                           <option>---- Selecione ----</option>
                           <option value="Todos">---- TODOS ----</option>
                           
                           <?php
						   		
								
									$conecta = mysql_connect("localhost","root","root");
									$banco = mysql_select_db("banco_tcc_fusa");

	
									
									$sql = mysql_query("SELECT * FROM tipos_instrumentos t;") or die;
									
									
									while($linha = mysql_fetch_array($sql))
									{
										echo '<option  value="'.$linha[0].'">'.$linha[1].'</option>';
									}
									
									mysql_close($conecta);
						   ?>
                  </select>
                </p>
                <input type="submit" value="Procurar" id="btn_procurar" onClick="ProcurarIntegrante()"/>
                </div>
                
                </div>
                
                <div id="troca6">
                <p class="p_title">CONFIGURAÇÕES</p>
                      <p>Status: <select name="Status" id="Status" >
                                
                               <option>---------- Selecione ----------</option>
                      
                               
                               <?php
                                    
                                    
                                        $conecta = mysql_connect("localhost","root","root");
                                        $banco = mysql_select_db("banco_tcc_fusa");
    
        
                                        
                                        $sql = mysql_query("SELECT * FROM `status` where (cd_status = 1) or (cd_status = 2);") or die;
                                        
                                        
                                        while($linha = mysql_fetch_array($sql))
                                        {
                                            echo '<option  value="'.$linha[0].'">'.$linha[1].'</option>';
                                        }
                                        
                                        mysql_close($conecta);
                               ?>
                      </select><br/>
                      <input type="button" onClick="mudar_status()" value="Salvar" id="mudar_status"/>
                    </p>
                    
                    
                </div>
                        <div id="numbers">
                    
                           
                        </div>
            </div>
</div>
</div>
</div>
<div id="rodape">

<a href="../Rodape/sobreafusa.php" class="float"><p class="space">Sobre a Fusa -</p></a>  
<a href="../Rodape/produtores.php" class="float"><p class="color">Produtores -</p></a>
<a href="../Rodape/contato.php" class="float"><p class="color">Contato</p></a>

</div>
<div id="banco">
</div>
<script type="text/javascript"> 

		$(document).ready(function(){
		$('#bt1').click(function(){	
			
   		$('#troca1').slideToggle("slow");
			
		$('#bt1').css({
		
			border:'2px solid #0d88cc'});
			
				$('#bt2').css({
				border:'1px solid #979696'});
				
				$('#bt3').css({
				border:'1px solid #979696'});
				
				$('#bt4').css({
				border:'1px solid #979696'});
				
				$('#bt5').css({
				border:'1px solid #979696'});
				
				$('#bt6').css({
				border:'1px solid #979696'});
					
		$('#troca2').fadeOut("fast");
		$('#troca3').fadeOut("fast");
		$('#troca4').fadeOut("fast");
		$('#troca5').fadeOut("fast");
		$('#troca6').fadeOut("fast");
		});
		
		
		$('#bt2').click(function(){		
   		$('#troca2').slideToggle("slow");
		$('#bt2').css({
			border:'2px solid #0d88cc'});
			
				$('#bt1').css({
				border:'1px solid #979696'});
				
				$('#bt3').css({
				border:'1px solid #979696'});
				
				$('#bt4').css({
				border:'1px solid #979696'});
				
				$('#bt5').css({
				border:'1px solid #979696'});
				
				$('#bt6').css({
				border:'1px solid #979696'});

		
		$('#troca1').fadeOut("fast");
		$('#troca3').fadeOut("fast");
		$('#troca4').fadeOut("fast");
		$('#troca5').fadeOut("fast");
		$('#troca6').fadeOut("fast");
		});
		
		$('#bt3').click(function(){		
   		$('#troca3').slideToggle("slow");
		$('#bt3').css({
			border:'2px solid #0d88cc'});
			
				$('#bt2').css({
				border:'1px solid #979696'});
				
				$('#bt1').css({
				border:'1px solid #979696'});
				
				$('#bt4').css({
				border:'1px solid #979696'});
				
				$('#bt5').css({
				border:'1px solid #979696'});
				
				$('#bt6').css({
				border:'1px solid #979696'});
		
		$('#troca1').fadeOut("fast");
		$('#troca2').fadeOut("fast");
		$('#troca4').fadeOut("fast");
		$('#troca5').fadeOut("fast");
		$('#troca6').fadeOut("fast");
		});
		
		$('#bt4').click(function(){		
   		$('#troca4').slideToggle("slow");
		$('#bt4').css({
			border:'2px solid #0d88cc'});
			
				$('#bt3').css({
				border:'1px solid #979696'});
				
				$('#bt1').css({
				border:'1px solid #979696'});
				
				$('#bt2').css({
				border:'1px solid #979696'});
				
				$('#bt5').css({
				border:'1px solid #979696'});
				
				$('#bt6').css({
				border:'1px solid #979696'});
		
		$('#troca1').fadeOut("fast");
		$('#troca2').fadeOut("fast");
		$('#troca3').fadeOut("fast");
		$('#troca5').fadeOut("fast");
		$('#troca6').fadeOut("fast");
		});
		
		$('#bt5').click(function(){		
   		$('#troca5').slideToggle("slow");
		$('#bt5').css({
			border:'2px solid #0d88cc'});
			
				$('#bt3').css({
				border:'1px solid #979696'});
				
				$('#bt4').css({
				border:'1px solid #979696'});
				
				$('#bt2').css({
				border:'1px solid #979696'});
				
				$('#bt1').css({
				border:'1px solid #979696'});
				
				$('#bt6').css({
				border:'1px solid #979696'});
		
		$('#troca1').fadeOut("fast");
		$('#troca2').fadeOut("fast");
		$('#troca3').fadeOut("fast");
		$('#troca4').fadeOut("fast");
		$('#troca6').fadeOut("fast");
		});
		
		$('#bt6').click(function(){		
   		$('#troca6').slideToggle("slow");
		$('#bt6').css({
			border:'2px solid #0d88cc'});
			
				$('#bt5').css({
				border:'1px solid #979696'});
				
				$('#bt4').css({
				border:'1px solid #979696'});
				
				$('#bt3').css({
				border:'1px solid #979696'});
				
				$('#bt2').css({
				border:'1px solid #979696'});
				
				$('#bt1').css({
				border:'1px solid #979696'});
		
		$('#troca1').fadeOut("fast");
		$('#troca2').fadeOut("fast");
		$('#troca3').fadeOut("fast");
		$('#troca4').fadeOut("fast");
		$('#troca5').fadeOut("fast");
		});
		
});

</script>

</body>
</html>