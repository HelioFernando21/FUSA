<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home - Fusa</title>
<link rel="stylesheet" type="text/css" href="../../../CSS/estilo_produtorhome.css" />

</head>
<?php 
 ?>
<body>
<div id="principal">

   <div id="barra">  
            <a href="index.php"><div id="Fusa_home"></div></a>
                            
            <div id="procurar_users">
            <form method="post" name="procurar">
            <input type="text" id="search_pessoas_input" /> <input type="submit" value="" />
            </form>
            </div>
        
            <div id="infos_user"></div>
    </div>

<div id="conteudo">

	<div id="coluna1">
    	<div id="fotoprodutor"></div>
        	
            <div id="btns">
        	         <a href="ranque_semanal.php"><div id="caixa1"> <p class="p_menu">Ranking Semanal</p> </div></a>
                    <a href="ranque_mensal.php"><div id="caixa2"> <p class="p_menu">Ranking Mensal</p> </div></a>
                    <a href="#"><div id="caixa3"> <p class="p_menu">Mensagens</p> </div></a>
        	</div>
        	
            <div id="search">        
        		<div id="icone_video"></div> 
                <div id="input_video">
                <form method="post">
                <input type="text" id="search_video" />
                </form>
                </div>       
        	</div>
            
            <div id="editar"></div>
            
    </div>
    

<?php
error_reporting(0);
$conecta = mysql_pconnect("localhost","root","root");
$banco = mysql_select_db("banco_tcc");

//-------------------------------//
// RANQUEAMENTO PARA HOMENS
//-------------------------------//
$sql = mysql_query("select e.cd_video, count(e.cd_video) as 'Estrela', v.nm_video, u.nm_usuario, u.nm_estado, u.nm_cidade, v.nm_destino_print, te.nm_estilo  from estrela e inner join videos V on e.cd_video=v.cd_video inner join usuarios U on v.cd_usuario = u.cd_usuario inner join usuarios_estilos UE on u.cd_usuario = ue.cd_usuario inner join tipos_estilos TE on ue.cd_estilo = te.cd_estilo where cd_sexo = 1 group by cd_video");

echo '<div id="coluna2">
		<div id="solo">
        		<div id="title_solo"><p class="p_title_solo">Solo</p></div>
               	<div id="homens">
                	  <div id="num_homens">
                        <p class="p_num1">1°</p>
                        <p class="p_num">2°</p>
                        <p class="p_num">3°</p>
                        <p class="p_num">4°</p>
                        <p class="p_num">5°</p>
                        <p class="p_num">6°</p>
                        <p class="p_num">7°</p>
                        <p class="p_num">8°</p>
                        <p class="p_num">9°</p>
                        <p class="p_num2">10°</p> 
                                          
      </div>
      <div id="title_homens"><p class="title_HM">Masculinos</p></div>   
                        <div id="raking_homens">';
while($ranque = mysql_fetch_array($sql))
{	
	
	echo ' 
                		
                        	<div id="h">
                                	<div id="c1">
	<p class="p_name">'.$ranque[3].'</p>
                                    <p class="p_job">'.$ranque[7].'</p>
                                    </div>
                                    <div id="c2"><img src='.$ranque[6].'  width="88px" height="52px"  /></div>
                                    <div id="c3"></div>
			   </div>';
		
	 
	};
	echo'                                             
                </div>            
                </div>';
//-------------------------------//
// FIM DO COMANDO PARA HOMENS
//-------------------------------// 
?>

<?php
//-------------------------------//
// RANQUEAMENTO PARA MULHERES
//-------------------------------//
$sql = mysql_query("select e.cd_video, count(e.cd_video) as 'Estrela', v.nm_video, u.nm_usuario, u.nm_estado, u.nm_cidade, v.nm_destino_print, te.nm_estilo  from estrela e inner join videos V on e.cd_video=v.cd_video inner join usuarios U on v.cd_usuario = u.cd_usuario inner join usuarios_estilos UE on u.cd_usuario = ue.cd_usuario inner join tipos_estilos TE on ue.cd_estilo = te.cd_estilo where cd_sexo = 0 group by cd_video");

echo' 		<div id="mulheres">
		  <div id="num_mulheres">
                        <p class="p_num1">1°</p>
                        <p class="p_num">2°</p>
                        <p class="p_num">3°</p>
                        <p class="p_num">4°</p>
                        <p class="p_num">5°</p>
                        <p class="p_num">6°</p>
                        <p class="p_num">7°</p>
                        <p class="p_num">8°</p>
                        <p class="p_num">9°</p>
                        <p class="p_num2">10°</p>   
      		</div> 
      		<div id="title_mulheres"><p class="title_HM">Femininos</p></div>   
                        <div id="raking_mulheres">
                        		';
while($ranque = mysql_fetch_array($sql))
{	
	
	echo '<div id="h">
                 <div id="c1">
	      <p class="p_name">'.$ranque[3].'</p>
                 <p class="p_job">'.$ranque[7].'</p>
                 </div>
                 <div id="c2"><img src='.$ranque[6].'  width="88px" height="52px"  /></div>
                 <div id="c3"></div>
	      </div>';
			   
			   
	 
	};
	echo'                                             
                </div>            
                </div>
	     </div>';
//-------------------------------//
// FIM DO COMANDO PARA MULHERES
//-------------------------------//
?>
<?php
//-------------------------------//
// RANQUEAMENTO PARA BANDAS
//-------------------------------//
$sql = mysql_query("select e.cd_video, count(e.cd_video) as 'Estrela', v.nm_video, u.nm_usuario, u.nm_estado, u.nm_cidade, v.nm_destino_print, te.nm_estilo  from estrela e inner join videos V on e.cd_video=v.cd_video inner join usuarios U on v.cd_usuario = u.cd_usuario inner join usuarios_estilos UE on u.cd_usuario = ue.cd_usuario inner join tipos_estilos TE on ue.cd_estilo = te.cd_estilo where cd_sexo = 2 group by cd_video");
echo'	   <div id="banda">
        	   	<div id="title_banda">
			<p class="p_title_bandas">Bandas</p>
	   	</div>
              	<div id="bandas">
              	<div id="num_bandas">
                   		   <p class="p_num1">1°</p>
                     		   <p class="p_num">2°</p>
                     		   <p class="p_num">3°</p>
                      	   <p class="p_num">4°</p>
                 	              <p class="p_num">5°</p>
                    		   <p class="p_num">6°</p>
                  		   <p class="p_num">7°</p>
                      	   <p class="p_num">8°</p>
                       	   <p class="p_num">9°</p>
                      	   <p class="p_num2">10°</p>   
                        </div> 
		  <div id="title_bandas"></div> 
                        <div id="raking_bandas">
                        		';
while($ranque = mysql_fetch_array($sql))
{	
	
	echo '<div id="h">
           <div id="c1">
	<p class="p_name">'.$ranque[3].'</p>
	<p class="p_job">'.$ranque[7].'</p>
           </div>
           <div id="c2"><img src='.$ranque[6].'  width="88px" height="52px"  /></div>
           <div id="c3"></div>
	</div>';
		         
	
	 
};

	
	echo' 	                                                  
            	</div>            
                 </div>
	 </div>
      </div></div>';
//-------------------------------//
//FIM DO COMANDO PARA BANDAS
//-------------------------------//
mysql_close($conecta);
?>
                                    
        


</div>
</div>

</body>
</html>