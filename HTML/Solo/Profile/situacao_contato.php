<?php
ob_start();
session_start();
?>
<script type="text/javascript" src="../../../JavaScript/jquery-1.7.2.min.js"></script>
<?php
						error_reporting(0);
						session_start();
						$contato =  $_GET["id"];
						
						if ($_SESSION["tipo"] != "")
						{
							if ($_SESSION["tipo"] == 1)
							{
								if ($_SESSION["codigo"] != $contato )
								{
									
									$conecta = mysql_connect("localhost","root","root");
									$banco = mysql_select_db("banco_tcc_fusa");	
									
									
									
									 $sql = mysql_query("SELECT count(*), cd_situacao_contato FROM contatos where (cd_receptor_contato = ".$contato.") and (cd_remetente_contato = ".$_SESSION["codigo"].")  group by cd_situacao_contato ;") or die;
		
									while($linha = mysql_fetch_array($sql))
									{
										$qtContatos = $linha[0];
										$QtSituacaoContato = $linha[1];	
										
									
						
									}
									
												
					
									mysql_close($conecta);
									
									if ( $qtContatos == "" )
									{
										echo '<a href="#" onclick="verificar_contato(this.name)" name="+;'.$contato.';s"><div id="add_user"> <p class="pAdd"> + </p> </div></a>';
									}
									else
									{
										if( $QtSituacaoContato == 1 )
										{
											echo '<a href="#" onclick="verificar_contato(this.name)" name="-;'.$contato.';s"><div id="add_user"> <p class="pAdd"> - </p> </div></a>';
										}
										
									}
								}
							}
							else
							{
								if ($_SESSION["tipo"] == 2)
								{
										$conecta = mysql_connect("localhost","root","root");
											$banco = mysql_select_db("banco_tcc_fusa");	
											 $sql = mysql_query("SELECT cd_situacao_contato FROM contatos where (cd_receptor_contato = ".$contato.") and (cd_remetente_contato = ".$_SESSION["codigo"].") ;") or die;
				
											while($linha = mysql_fetch_array($sql))
											{
																							
												$QtSituacaoContato = $linha[0];
								
											}
											
															
							
											mysql_close($conecta);
											
											if ( $QtSituacaoContato == "" )
											{
												$conecta = mysql_connect("localhost","root","root");
												$banco = mysql_select_db("banco_tcc_fusa");	
												$sql = mysql_query("SELECT count(*) FROM usuarios  where (cd_status = 1) and (cd_usuario = ".$contato.");") or die;
				
												while($linha = mysql_fetch_array($sql))
												{
													$qtContatosBanda = $linha[0];
															
								
												}
											
																			
												mysql_close($conecta);
												
												if ( $qtContatosBanda == 1)
												{
													
													echo '<a href="#" onclick="adicionar_banda_integrante()" name="+;'.$contato.';b"><div id="add_user"> <p class="pAdd"> + </p> </div></a>';
													
													//echo '<a  href="#" onclick="adicionar_banda_integrante()" id="add_banda_integrante">add3</a>';
													
													//include("exemplo/index.php");
												}
											}
											else
											{
												if( $QtSituacaoContato == 3 )
												{
													
														echo '<a href="#" onclick="verificar_contato(this.name)" name="-;'.$contato.';b"><div id="add_user"> <p class="pAdd"> - </p> </div></a>';
												}
												
											}
										
									}
									else
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
							}
						}
						
?>

