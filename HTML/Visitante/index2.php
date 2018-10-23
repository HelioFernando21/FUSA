<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home - Fusa</title>
<link rel="stylesheet" type="text/css" href="../../CSS/estilo_visithome.css" />
<link rel="stylesheet" type="text/css" href="../../CSS/scroller.css" />
</head>

<body>

<div id="principal">

   <div id="barra">  
            <a href="index.php"><div id="Fusa_home"></div></a>
                            
            <div id="procurar_users">
            <form method="post" name="procurar">
            <input type="text" id="search_pessoas_input" /> <input type="submit" value="K" />
            </form>
            </div>
        
            <div id="infos_user"></div>
    </div>

<div id="conteudo">

	<div id="coluna1">
    	<div id="foto_user"></div>
        <div id="procurar_MV">
                                  
                <div id="linha_musica"> <div id="icone_musica"></div> 
                <div id="input_musica">
                <form method="post">
                <input type="text" id="search_musica" />
                </form>
                </div>
                </div>
                
                <div id="linha_video"> <div id="icone_video"></div>  
                <div id="input_video">
                <form method="post">
                <input type="text" id="search_video" />
                </form>                
                </div> 
                </div>
        </div>
        
    </div>
    
<div id="coluna2">
    	<div id="infos_user2">
        		<div id="nome_user"><p class="p_name_big">Tiffany Hasegawa</p></div>
                <div id="estilos_user">	<p>Korean Pop, Japanese Rock, Japanese Pop, Metalcore, Eletro, Punk rock, Indie, Rock Alternativo, Metal Alternativo</p>	</div>      
                <a href="#"><div id="edit_user"></div></a>  
        </div>
		<div id="videos">
                
        	<div id="video" class="alinhado">
                    <div id="title_video"><p>Fim do mundo - Veeshe</p></div>
                        <div id="imagem">
                        <img src="../ImagensTeste/videovisit.png"/>
                        </div>
                       <a href="visualizacao.php"><div id="btn_play"></div></a>
                    </div>

			<div id="video" class="alinhado">
                    <div id="title_video"><p>Fim do mundo - Veeshe</p></div>
                        <div id="imagem">
                        <img src="../ImagensTeste/videovisit.png"/>
                        </div>
                       <a href="visualizacao.php"><div id="btn_play"></div></a>
                    </div>

			<div id="video" class="alinhado">
                    <div id="title_video"><p>Fim do mundo - Veeshe</p></div>
                        <div id="imagem">
                        <img src="../ImagensTeste/videovisit.png"/>
                        </div>
                       <a href="visualizacao.php"><div id="btn_play"></div></a>
                    </div>
		</div>  
          
</div>
</div>
</div>
<script>

$(function(){			  
  $('#videos').slimscroll({
	  width: '770px',
	  height: '93%',
	  distance: '5px',
	  start: $('#videos_estilo'),
	  alwaysVisible: true
  });			  
 });

</script>

</body>
</html>