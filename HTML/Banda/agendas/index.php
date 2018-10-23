<?php
error_reporting(0);
ob_start();
session_start();
error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Band Agenda - Fusa</title>
<link rel="stylesheet" type="text/css" href="../../../CSS/estilo_bandagenda.css" />
<link rel="stylesheet" type="text/css" href="../../../CSS/estilo_colors.css" />
<script type="text/javascript" src="../../../JavaScript/jquery-1.7.2.min.js"></script>

<link rel="stylesheet" type="text/css" href="../../../JavaScript/jquery.alerts.css" />
<script src="../../../JavaScript/jquery.js" type="text/javascript"></script>
<script src="../../../JavaScript/jquery.ui.draggable.js" type="text/javascript"></script>
<script src="../../../JavaScript/jquery.alerts.js" type="text/javascript"></script>

<script type="text/javascript">

 $(document).ready(function(){
	 var texto = window.location;
	 var v =  texto.toString();
	 var valor = v.split("=");
	 
	 $("#eventos").load("buscar_agenda.php?e="+valor[1]);
	 
	 });

function incluir_dados(v)
{

	pesquisa(v);
	carregar(2);

}

function pesquisa(valor)
{
	
	var nome = document.getElementById("agenda_nome").value;
	var agenda_data = document.getElementById("agenda_data").value;
	var agenda_descricao = document.getElementById("agenda_descricao").value;
	var agenda_endereco = document.getElementById("agenda_endereco").value;
	var agenda_local = document.getElementById("agenda_local").value;
	

	if (window.XMLHttpRequest)
	{
		xmlhttp=new XMLHttpRequest();
	}
	else
	{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}

	if ((nome.length==0)&&(agenda_data.length==0)&&(agenda_descricao.length==0)&&(agenda_endereco.length==0)&&(agenda_local.length==0))
	{ 
		document.getElementById("cadastrar_agenda").innerHTML="";
		return;
	}

	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("cadastrar_agenda").innerHTML=xmlhttp.responseText;
		
		}
	}

	xmlhttp.open("GET","incluir.php?agenda_nome="+nome+"&agenda_data="+agenda_data+"&agenda_descricao="+agenda_descricao+"&agenda_endereco="+agenda_endereco+"&agenda_local="+agenda_local+"&id="+valor,true);
	xmlhttp.send();
	
	
 		
}

function excluir_agenda(v,valor)
{
	
	if (confirm("Deseja excluir esse evento?"))
	{

		$("#excluir_agenda").load("excluir.php?e="+v+"&&id="+valor);
		 	jAlert("Evento excluido com sucesso");	
		 //alert(v+" e "+valor);
	}
}


function carregar(valor2)
{
	
	 
	 var texto = window.location;
	 var v =  texto.toString();
	 var valor = v.split("=");
	 
	 $("#eventos").load("buscar_agenda.php?e="+valor[1]);

}


function procurar_amigos()
{
	var valor = document.getElementById("search_pessoas_input").value;
	
	if (valor != "")
	{
		
		window.location = "../amigos/procurar_amigos.php?id="+valor;
	
	}
}


</script>
</head>

<body>
<div id="principal">

	<div id="barra">  
                <?php
				
				 echo '
		   <script type="text/javascript">
		   		
$(document).ready(function() {
		$("#bt_uploud_evento").click(function(){
        	$("#agenda2").load("formulario.php?id='.$_GET["id"].'");
			$("#agenda").hide();
		});
});


		   </script>
		   ';
		   
		   
	if ($_SESSION["codigo"] == "")
	{
		echo  '<a href="/fusa/html/pagina_inicial/index.php"><div id="Fusa_home"></div></a>';
	}
	else
	{
		if ($_SESSION["tipo"] == 1)
		{
		 	echo  '<a href="../index.php"><div id="Fusa_home"></div></a>';
		}
		else
		{
			if ($_SESSION["tipo"] == 2)
			{
				echo  '<a href="../../Banda/index.php"><div id="Fusa_home"></div></a>';
			}
			else
			{
				if ($_SESSION["tipo"] == 3)
				{
					echo  '<a href="../../Visitante/index.php"><div id="Fusa_home"></div></a>';
				}
				else
				{
					if ($_SESSION["tipo"] == 4)
					{
						echo  '<a href="../../Produtor/ranque/index.php"><div id="Fusa_home"></div></a>';
					}
				}
			}
		}
	}
	?>
                            
            <div id="procurar_users">
            <input type="text" id="search_pessoas_input" placeholder="Procurar Usuários"/> <input type="submit" value="" id="go_search"  onclick="procurar_amigos()" />
            </div>
        
         
            		<?php
		error_reporting(0);
		$referencia = $_GET["id"];
		session_start();

		if ($referencia == "")
		{
			echo '<script type="text/javascript"> window.location = "../../Erro/index.php"; </script>';
		}
		
		$conecta = mysql_connect("localhost","root","root");
		$banco = mysql_select_db("banco_tcc_fusa");
		
	
		
		$qtUsuarioLyrics = 0;
		
		$sql = mysql_query("SELECT count(*),fo.nm_destino_foto FROM usuarios us
inner join fotos fo on (us.cd_usuario = fo.cd_usuario)
where (us.cd_usuario = ".$_GET["id"].") and ( us.cd_tipo_usuario = 2 ) and (cd_situacao_perfil = 1) group by us.cd_usuario;") or die;
		while($linha = mysql_fetch_array($sql))
		{
			$qtUsuarioLyrics =  $linha[0];
			$FotoUsuario = $linha[1];
			
		}
		
		mysql_close($conecta);
		
		
		if($qtUsuarioLyrics == 0)
		{
			echo '<script type="text/javascript"> window.location = "../../Erro/index.php"; </script>';
		}
		?>
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
				<div id="banner">
				<?php
					echo '<a href="../profile/bandprofile.php?id='.$_GET["id"].'"><img width="1000" height="265" src="../../Usuarios/'.$FotoUsuario.'" id="foto_user3" /></a>';
				?>
                
                <div id="menu">
                	<?php
						echo '
                            <a href="../usuario_videos/index.php?id='.$_GET["id"].'"><div id="bt1"> <p class="p_link_esq"> Vídeos </p> </div></a>
                            <a href="../albuns/index.php?id='.$_GET["id"].'"><div id="bt2"> <p class="p_link"> Fotos </p> </div></a>
                            <a href="../lyrics/index.php?id='.$_GET["id"].'"><div id="bt3"> <p class="p_link"> Lyrics</p> </div></a>
                            <a href="../referencias/index.php?id='.$_GET["id"].'"><div id="bt4"> <p class="p_link_ref"> Referências</p> </div></a>
                            <a href="../agendas/index.php?id='.$_GET["id"].'"><div id="bt5"> <p class="p_link_dir"> Agenda</p> </div></a>';
					?>
                </div>
                </div>
  	           
            <div id="caixa_uploud_evento">

    		            <?php
			if ($_GET["id"] == $_SESSION["codigo"])
			{
				echo '<input type="button" id="bt_uploud_evento" value="Adicionar Evento"/>';
			}
?>
            
            </div>
            
             <div id="agenda2"></div>
            <div id="agenda">
            
            		<div id="titulos"> 
                    <div id="t_agenda"> <h2>Data</h2>  <h2>Hora</h2> <h2 class="h_title">Local</h2> <h2 class="h_title">Complementos</h2> </div>
                    </div>
                    
                    <div id="eventos">
                    
                    </div>                        		       
</div>

<div id="rodape3">

<a href="../../Rodape/sobreafusa.php" class="float3"><p class="space3">Sobre a Fusa -</p></a>  
<a href="../../Rodape/produtores.php" class="float3"><p class="color3">Produtores -</p></a>
<a href="../../Rodape/contato.php" class="float3"><p class="color3">Contato</p></a>

</div>

<div id="cadastrar_agenda">
</div>

<div id="excluir_agenda">
</div>
</div>           
</div>


</body>
</html>

