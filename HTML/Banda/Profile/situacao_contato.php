<?php
ob_start();
/*session_start();*/error_reporting(0);
error_reporting(0);
?>
<script type="text/javascript" src="../../../JavaScript/jquery-1.7.2.min.js"></script>

<style>

#add_user {
	width: 34px;
	height: 93px;
	background-image:url(../../../Design/add.png);
	position:absolute;
	margin-top:-16px;
	margin-left:335px;
}

.pAdd {
	font-size:38px;
	color:#FFF;
	padding-top: 5px;
	margin-left:2px;
}

</style>

<?php
error_reporting(0);
						session_start();
						$contato =  $_GET["id"];
						
						if ($_SESSION["tipo"] != "")
						{
							
							
								if ($_SESSION["tipo"] == 4)
										{
												$conecta = mysql_connect("localhost","root","root");
												$banco = mysql_select_db("banco_tcc_fusa");	
												 $sql = mysql_query("SELECT cd_situacao_proposta,cd_situacao_proposta FROM propostas where (cd_usuario = ".$contato.") and (cd_produtor = ".$_SESSION["codigo"].") and (cd_tipo_proposta = 2)  ") or die;
					
												while($linha = mysql_fetch_array($sql))
												{
																								
													$QtSituacaoContato = $linha[0];
													$cdSituacaoProposta = $linha[1];
									
												}
												
																
								
												mysql_close($conecta);
												
												if ($QtSituacaoContato == "")
												{
													echo '<a href="#" onclick="mostrar_div_produtor()" ><div id="add_user"> <p class="pAdd"> + </p> </div></a>';
												}
												else
												{
													if ($cdSituacaoProposta == 1)
													{
														echo '<a href="#" onclick="excluir_contato_produtor(this.name)" name="'.$_GET["id"].'" ><div id="add_user"> <p class="pAdd"> - </p> </div></a>';
													}
												}
										}
							
						}
						
?>