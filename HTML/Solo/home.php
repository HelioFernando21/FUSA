<?php
ob_start();
session_start();
error_reporting(0);
?>

<script type="text/javascript" src="../../JavaScript/jquery-1.7.2.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="text/javascript">
$(document).ready(function() {
	$('#carregando').hide();
//alert('oi recados');
	
	});
	
	function convite_aceito(v)
	{
		$(document).ready(function() {
			
			
			$("#banco").load('concluir_convite.php?e='+v);	
			
			$('#carregando').show();
			
			var valor = v.split(";;e;;");
			$("#mudancas").load('convite.php?id='+valor[3]);	
			
			$('#carregando').show();
						
	
		});
	}
	
	function excluir_atualizacao(v,valor)
	{
		
		$(document).ready(function() {
			
			
			$("#banco").load('excluir_atualizacoes.php?e='+v);	
			
			$('#carregando').show();
			
			$("#mudancas").load('atualizacoes.php?id='+valor);

			$('#carregando').show();
			
			
			
	
		});
		
	}
	function opcao(v)
	{
		var valor = v.split(";");
		if (valor[0] == 1)
		{
			$(document).ready(function() {
			
			
			$("#mudancas").load('atualizacoes.php?id='+valor[1]);	
			
			$('#carregando').show();
	
			});
		}
		else
		{
			if (valor[0]==2)
			{
				$("#mudancas").load('convite.php?id='+valor[1]);	
			
				$('#carregando').show();
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
		$(document).ready(function() {
			
			
			$("#banco").load('situacao_atualizacao.php?id='+valor);	
			

	});
	
	}
	

	
</script>
<?php
	echo '<a href="#" name="1;'.$_SESSION["codigo"].'" onClick="opcao(this.name)" >atualizacoes</a>';
	echo '</br>';
	echo '<a href="#" name="2;'.$_SESSION["codigo"].'" onClick="opcao(this.name)" >convites</a>';
	
?>
		<div id="carregando">
			<img src="videos/load.gif" />
		</div>
<div id="mudancas">
	
</div>
<div id="banco">
</div>