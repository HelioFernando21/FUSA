
            <p class="p_EC">Cidade: <select name="jumpMenu" id="jumpMenu3" >
                           
                           
                           <?php
						   		if ($_GET["id"] != "Valor")
								{
									if ($_GET["id"] == "Todos")
									{
										echo '<option value="Todos">---- TODAS ----</option>'	;
									}
									else
									{
										echo '<option value="Valor">---- Selecione ----</option>';
											$xml = simplexml_load_file("../../XML/cidades".$_GET['id'].".xml");
											// laço dentro da tag dados para cada tag dados que encontrar
												foreach($xml->xpath('//CIDADE') as $dados)
											{
												// armazena na var $registro o conteudo do nó dados
												$registro = simplexml_load_string($dados->asXML());
											
												
													
													   echo '<option value="'.$dados->ID.'">'.$dados->NOME.'</option>';
														
														
											
												   
											   
											}
									}
								}
								else
								{
									echo '<option value="Valor">---- Selecione ----</option>';
								}
								
                           ?>
                           
                  </select>
                </p>