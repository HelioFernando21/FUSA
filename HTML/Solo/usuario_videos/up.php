<?php
ob_start();
session_start();
?>
<?php 
    	$conecta = mysql_connect("localhost","root","root");
		$banco = mysql_select_db("banco_tcc_fusa");
		
						error_reporting(0);
						// aqui para setar o horario para o Brasileiro
						date_default_timezone_set("Brazil/East");
						$video = $_GET["id"];
						
						//aqui pegando os arquivos upload
						$uploadVideo = "";
						$uploadVideo = $_FILES["arquivo"]["type"] ;
						$imagem = "";
						$imagem = $_FILES["arquivo2"]["type"] ;
						
						// Seliga aqui eu pergunto se nao ta em branco as caixas
						if ( (strlen($imagem)>0 )&& (strlen($_POST["txtTexto"]) >0) && (strlen($_POST["txtDescricao"]) > 0) &&(strlen($uploadVideo)>0) && (strlen($_POST["cmbEstilo"])>0) )
						{
					  		
					  
					  
					 		// Aqui pergunta se a imagem é jpeg ai pode criar mais de uma extensao tbm
					 	    if ($imagem == "image/jpeg") 
					 		{
								// Aqui pergunta a extensao do video
								if ( $uploadVideo == "video/mp4" )
								{
								
										 $conecta = mysql_connect("localhost","root","root");
										 $banco = mysql_select_db("banco_tcc_fusa");
			
									 	 $i = 0;
			
									
										
										// aqui é para ver qual o proximo cd_video para eu cadastrar ele e criar a pasta dele
										$sql = mysql_query("SELECT max(cd_video)+1 FROM videos ;") or die;
			
										while($linha = mysql_fetch_array($sql))
										{
												$cdvideo = $linha[0];
										}
										//echo'passou aqui';
										
										//echo'passou aqu2';
										
										// aqui é para quando nao tenho nenhum codigo no banco ai o codigo dele vai para 0
										if ($cdvideo =="")
										{
											$cdvideo = 0;
										}
										
										// aqui pega a extensao dos bagulhos
										$extensaov = $_FILES["arquivo"]["name"];
										$extensaov = substr($extensaov,(strlen($extensaov)-4),strlen($extensaov));
										
										$extensaoi = $_FILES["arquivo2"]["name"];
										$extensaoi = substr($extensaoi,(strlen($extensaoi)-4),strlen($extensaoi));
								
										
									//	echo $cdvideo;
									// aqui cria as pastas
										mkdir("../../Usuarios/".$video."/HTML/videos/".$cdvideo);
										mkdir("../../Usuarios/".$video."/HTML/videos/".$cdvideo."/print");
										mkdir("../../Usuarios/".$video."/HTML/videos/".$cdvideo."/video");
										
										
										// aqui efetua o upload @move_uploaded_file(arquivo, para onde ele vai);
										@move_uploaded_file($_FILES["arquivo2"]["tmp_name"],"../../Usuarios/".$video."/HTML/videos/".$cdvideo."/print/{$_FILES["arquivo2"]["name"]}");
										
										// quando ele faz o upload ele faz com o nome q ele pegou ai eu coloco o nome q eu quero tipo 6.jpg (o codigo dele)
										//rename(nome q ele passou,nome que eu quero q fique)
										rename("../../Usuarios/".$video."/HTML/videos/".$cdvideo."/print/".$_FILES["arquivo2"]["name"],"../../Usuarios/".$video."/HTML/videos/".$cdvideo."/print/".$cdvideo.$extensaoi."");
										
										// o resto aqui é o msm esquema
										@move_uploaded_file($_FILES["arquivo"]["tmp_name"],"../../Usuarios/".$video."/HTML/videos/".$cdvideo."/video/{$_FILES["arquivo"]["name"]}");
										
										// o resto aqui é o msm esquema
										rename("../../Usuarios/".$video."/HTML/videos/".$cdvideo."/video/".$_FILES["arquivo"]["name"],"../../Usuarios/".$video."/HTML/videos/".$cdvideo."/video/".$cdvideo.$extensaov);
										
										// aqui faz o insert no banco
										$sql = mysql_query("insert into videos values(".$cdvideo.",'".$_POST["txtTexto"]."','".date("Y-m-d")."',".$video.",".$_POST["cmbEstilo"].",'../../Usuarios/".$video."/HTML/videos/".$cdvideo."/video/".$cdvideo.$extensaov."','".date("H:i")."','../../Usuarios/".$video."/HTML/videos/".$cdvideo."/print/".$cdvideo.$extensaoi."','".str_replace("/ln","</br>",$_POST["txtDescricao"])."');");
									
									echo '<script type="text/javascript"> alert("Vídeo cadastrado com sucesso"); window.close();</script>';
									//echo '<a href="#" onclick="oi()">clicar</a>';
									
								}
								else
								{
									echo '<script type="text/javascript"> alert("É necessário inserir um vídeo ") </script>';
								}
							}
					  		else
					  		{
						  		echo '<script type="text/javascript"> alert("É necessário inserir uma imagem ") </script>';
					  		}  
 					       mysql_close($conecta);	
						}	
?>