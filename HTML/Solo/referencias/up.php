
<script src="../../../JavaScript/jquery-1.7.2.min.js" type="text/javascript"></script>


<?php 
ob_start();
session_start();
						error_reporting(0);
						$referencia = $_GET["id"];
						
						$imagem = "";
						$imagem = $_FILES["arquivo"]["type"] ;
						if ( (strlen($imagem)>0 )&& (strlen($_POST["txtTexto"]) >0) )
						{
					  		
					  
					  
					 
					 	    if ($imagem == "image/jpeg")
					 		{
						  	     $conecta = mysql_connect("localhost","root","root");
								 $banco = mysql_select_db("banco_tcc_fusa");
	
							 $i = 0;
	
							
	
	
								$sql = mysql_query("SELECT max(cd_referencia)+1 FROM referencias ;") or die;
	
								while($linha = mysql_fetch_array($sql))
								{
										$cdReferencia = $linha[0];
 								}
								//echo'passou aqui';
								
								//echo'passou aqu2';
								
								if ($cdReferencia =="")
								{
									$cdReferencia = 0;
								}
								
								
							//	echo $cdReferencia;
								
						 		 @move_uploaded_file($_FILES["arquivo"]["tmp_name"],"../../Usuarios/".$referencia."/HTML/referencias/imagens/{$_FILES["arquivo"]["name"]}");
						 		
								rename("../../Usuarios/".$referencia."/HTML/referencias/imagens/".$_FILES["arquivo"]["name"],"../../Usuarios/".$referencia."/HTML/referencias/imagens/".$cdReferencia.".jpg");
								$sql = mysql_query("insert into referencias values(".$cdReferencia.",".$referencia.",'".$_POST["txtTexto"]."','../../Usuarios/".$referencia."/HTML/referencias/imagens/".$cdReferencia.".jpg');") or die;
							
							echo '<script type="text/javascript"> 
							
							$(document).ready(function() {
		
        	alert("referencia cadastrada com sucesso");
		
});
							
							 </script>';
		
							
								
							}
					  		else
					  		{
						  		echo '<script type="text/javascript"> alert("arquivo invalido") </script>';
					  		}  
 					       mysql_close($conecta);
						 
						 		//copy("C:/xampp/htdocs/TCC/Fusa/Profile/Scripts/HTML/referencias".$_FILES["name"],"1.jpg");
								// session_start();
								// $_SESSION["upload_referencia"] = $_FILES["arquivo"];
						}

			
?>