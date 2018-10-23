<?php
error_reporting(0);
ob_start();
session_start();
?>
            <p class="p_EC">Cidade: <select name="jumpMenu" id="jumpMenu3" onChange="MM_jumpMenu('parent',this,0)">
                           
                           
                           <?php
						   		$concatenar = "";
						   		$valor = explode(';',$_GET["id"]);
								
						   		if ($valor[0] != "Valor")
								{
									if ($valor[0] == "Todos")
									{
										if ($valor[1] == "Todos")
										{
											echo '<option value="Todos">---- TODAS ----</option>';
										}
										else
										{
											$concatenar .= '<option value="Todos">---- TODAS ----</option>';
										}
									}
									else
									{
										$concatenar .= '<option value="Valor">---- Selecione ----</option>';
											$xml = simplexml_load_file("../../XML/cidades".$valor[0].".xml");
											// laço dentro da tag dados para cada tag dados que encontrar
												foreach($xml->xpath('//CIDADE') as $dados)
											{
												// armazena na var $registro o conteudo do nó dados
												$registro = simplexml_load_string($dados->asXML());
											
												
													if ($valor[1] == $dados->ID)
													{
													   echo '<option value="'.$dados->ID.'">'.$dados->NOME.'</option>';
													}
													else
													{
														$concatenar .= '<option value="'.$dados->ID.'">'.$dados->NOME.'</option>';
													}
														
														
											
												   
											   
											}
									}
								}
								else
								{
									$concatenar .= '<option value="Valor">---- Selecione ----</option>';
								}
								
								echo $concatenar;
                           ?>
                           
                  </select>
                </p>