<?php
error_reporting(0);
ob_start();
session_start();
?>   
   
    <?php
                                    
                                    
                                        $conecta = mysql_connect("localhost","root","root");
                                        $banco = mysql_select_db("banco_tcc_fusa");
    
        
                                        
                                        $sql = mysql_query("SELECT count(*), (SELECT count(*) FROM propostas where (cd_usuario = ".$_SESSION["codigo"].") and (cd_situacao_proposta = 0)) ,(SELECT count(*) FROM contatos where (cd_receptor_contato = ".$_SESSION["codigo"].") and (cd_situacao_contato = 2)) ,(SELECT count(*) FROM contatos where (cd_receptor_contato = ".$_SESSION["codigo"].") and (cd_situacao_contato = 0))  FROM atualizacoes where (cd_usuario = ".$_SESSION["codigo"]." ) and (cd_situacao_atualizacao = 0);") or die;
                                        
                                        
                                        while($linha = mysql_fetch_array($sql))
                                        {
                                     		
											$QtPropostas = $linha[1];
											$QtPropostaBanda = $linha[2];
											$QtAmizades = $linha[3];
                                        }
										
										$sql = mysql_query("SELECT count(*) FROM atualizacoes where (cd_usuario = ".$_SESSION["codigo"].") and (cd_situacao_atualizacao = 0)  group by cd_tipo_atualizacao,cd_link;") or die;
                                        
                                        $i = 0;
                                        while($linha = mysql_fetch_array($sql))
                                        {
                                     		$i++;
											
                                        }
                                        
                                        mysql_close($conecta);
										
										echo
										' <div id="number1" class="numb"> <p class="size_number">'.$i.'</p> </div>
                            <div id="number2" class="numb"> <p class="size_number">'.$QtPropostas.'</p> </div>
                            <div id="number3" class="numb"> <p class="size_number">'.$QtPropostaBanda.'</p> </div>
                            <div id="number4" class="numb"> <p class="size_number">'.$QtAmizades.'</p> </div>';
                               ?>