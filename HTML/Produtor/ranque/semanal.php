<?php
ob_start();
session_start();
error_reporting(0);
?>

<script type="text/javascript" src="../../../JavaScript/jquery-1.7.2.min.js"></script>

<?php
		date_default_timezone_set("Brazil/East");
		$conecta = mysql_connect("localhost","root","root");
		$banco = mysql_select_db("banco_tcc_fusa");	
		
		$mes = date('m');
		$ano = date('Y');
		$dia = date('d') - date('w');
		$dataInicio = $ano.'-'.$mes.'-0'.$dia.' ';
		$falta = 6-date('w') ;
		
		
		
		if ((date('d')+$falta) >  date('t'))
		{
			
			$valor = (date('d')+$falta) - date('t');
			$dataFim = $ano.'-'.$mes.'-0'.((date('d')+$falta)-$valor);
		}
		else
		{
			$dataFim = $ano.'-'.$mes.'-0'.((date('d')+$falta)-$valor);
		}
	
	
		$sql = mysql_query("select e.cd_video, count(e.cd_video) as 'Estrela', v.nm_video, u.nm_usuario, u.nm_estado, u.nm_cidade, v.nm_destino_print, te.nm_estilo,v.dt_video, u.cd_usuario from estrela e inner join videos V on e.cd_video=v.cd_video inner join usuarios U on v.cd_usuario = u.cd_usuario inner join usuarios_estilos UE on u.cd_usuario = ue.cd_usuario inner join tipos_estilos TE on ue.cd_estilo = te.cd_estilo where (cd_sexo = 1) and (e.dt_estrela Between '".$dataInicio."' and '".$dataFim."' ) group by cd_video order by count(e.cd_video) desc;") or die;
	
	
	echo '<div id="solo">
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
		while($linha = mysql_fetch_array($sql))
		{
			echo '<div id="h">';
			echo '	<div id="c1">';
			echo '		<a href="../../Solo/Profile/profile.php?id='.$linha[9].'"><p class="p_name">'.$linha[3].'</p></a>';			
			echo '		<p class="p_job">'.$linha[7].'</p>';
			echo '	</div>';
			echo '	<a href="../../Solo/videos/index.php?id='.$linha[9].'"><img id="c2" src="'.$linha[6].'" /></a>';
			//echo '	<a href="#"><div id="c3"></div></a>';                                
			echo '</div>';      

	 	}
		
		
		
                        		                                        
                     echo'   </div>';  
					 echo '</div>
                <div id="mulheres">
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
                        <div id="raking_mulheres">';    
					 
		$sql = mysql_query("select e.cd_video, count(e.cd_video) as 'Estrela', v.nm_video, u.nm_usuario, u.nm_estado, u.nm_cidade, v.nm_destino_print, te.nm_estilo,v.dt_video, u.cd_usuario from estrela e inner join videos V on e.cd_video=v.cd_video inner join usuarios U on v.cd_usuario = u.cd_usuario inner join usuarios_estilos UE on u.cd_usuario = ue.cd_usuario inner join tipos_estilos TE on ue.cd_estilo = te.cd_estilo where (cd_sexo = 0) and (e.dt_estrela Between '".$dataInicio."' and '".$dataFim."' ) group by cd_video order by count(e.cd_video) desc;") or die;      
		
		while($linha = mysql_fetch_array($sql))
		{
			echo '<div id="h">';
			echo '	<div id="c1">';
			echo '		<a href="../../Solo/Profile/profile.php?id='.$linha[9].'"><p class="p_name">'.$linha[3].'</p></a>';			
			echo '		<p class="p_job">'.$linha[7].'</p>';
			echo '	</div>';
			echo '	<a href="../../Solo/videos/index.php?id='.$linha[9].'"><img id="c2" src="'.$linha[6].'" /></a>';
			//echo '	<a href="#"><div id="c3"></div></a>';                                
			echo '</div>';     

	 	}
                
                        echo'                         
                        </div>
                </div>        
        </div>';
		
		$sql = mysql_query("select e.cd_video, count(e.cd_video) as 'Estrela', v.nm_video, u.nm_usuario, u.nm_estado, u.nm_cidade, v.nm_destino_print, te.nm_estilo,v.dt_video, u.cd_usuario from estrela e inner join videos V on e.cd_video=v.cd_video inner join usuarios U on v.cd_usuario = u.cd_usuario inner join usuarios_estilos UE on u.cd_usuario = ue.cd_usuario inner join tipos_estilos TE on ue.cd_estilo = te.cd_estilo where (cd_sexo = 2) and (e.dt_estrela Between '".$dataInicio."' and '".$dataFim."' ) group by cd_video order by count(e.cd_video) desc") or die;      
		echo '<div id="banda">
        		<div id="title_banda"><p class="p_title_bandas">Bandas</p></div>
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
                        <div id="raking_bandas">';
		while($linha = mysql_fetch_array($sql))
		{
			echo '<div id="h">';
			echo '	<div id="c1">';
			echo '		<a href="../../Banda/Profile/bandprofile.php?id='.$linha[9].'"><p class="p_name">'.$linha[3].'</p></a>';			
			echo '		<p class="p_job">'.$linha[7].'</p>';
			echo '	</div>';
			echo '	<a href="../../Banda/videos/index.php?id='.$linha[9].'"><img id="c2" src="'.$linha[6].'" /></a>';
			//echo '	<a href="#"><div id="c3"></div></a>';                                
			echo '</div>';     

	 	}
		
		
                       echo ' 		   
                        </div>
                </div>
        </div>';
		
	
	
	mysql_close($conecta);


?>