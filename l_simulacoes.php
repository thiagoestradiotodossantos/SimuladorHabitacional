<! DOCTYPE html>

<html lang="pt-br">
    <head>
        <title>Simulação Habitacional</title>
        <meta charset="utf-8">
        
        <link rel="stylesheet" type="text/css" href="css/estilos.css">

        <?php
	       require 'sistema/config.php';
	       require 'sistema/database.php';
        ?>
    </head>
    
    <body>
        <header class="cabeçario_2">
            <h2 class="titulo_2">Imobiliária Lothus - Simulação Habitacional MCMV</h2>
            <nav class="menu_2">
                <ul>
                    <il><a href="index.html">Início</a></il>
                    <il><a href="c_clientes.php">Cadastro de Cliente</a></il>
                    <il><a href="c_imoveis.php">Cadastro de Imóveis</a></il>
                    <il><a href="simulacoes.php">Simular Financiamento</a></il>
                    <il><a href="l_clientes.php">Lista de Clientes</a></il>
                    <il><a href="l_imoveis.php">Lista de Imóveis</a></il>
                    <il><a href="l_simulacoes.php">Lista de Simulações</a></il>
                </ul>
            </nav>                    
        </header>
<!---------------LISTA DE SIMULAÇÕES----------------------------------------------------->
        <h2 class="st_2">Lista de Simulações</h2>
        <section id="list_simulacoes">
            
            
        <table border="1">
            <thead>
                <tr> <td width="300">Nome do Cliente</td> <td>Imóvel (Unidade)</td> <td width="70">Entrada</td> <td>Subsídio</td> <td>Juros</td> <td>Número de Parcelas</td> <td width="100">Status</td></tr>
            </thead>
            
            <tbody>
                <?php
                    $simulacoes = DBLer('simulacoes'); /*Leitura do DB*/
                    if($simulacoes){
                        foreach($simulacoes as $simulacao){
                            
                            /*Aquisição das identificações de cliente e imóvel*/
                            $clienteid = $simulacao['clienteid'];
                            
                            $imovelid = $simulacao['imovelid'];
                            
                            /*Aquisição dos dados de cliente e imóvel */
                            $nome = DBLer("clientes", "WHERE cpf = $clienteid", "nome");
                            $nome = $nome[0]['nome'];
                            
                            $idade = DBLer("clientes", "WHERE cpf = $clienteid", "idade");
                            $idade = $idade[0]['idade'];
                            
                            $renda = DBLer("clientes", "WHERE cpf = $clienteid", "renda");
                            $renda = $renda[0]['renda'];
                            
                            $preco = DBLer("imoveis", "WHERE unidade = $imovelid", "preco");
                            $preco = $preco[0]['preco'];
                            
                            $nparcelas = DBLer("simulacoes", "WHERE clienteid = $clienteid", "nparcelas");
                            $nparcelas = $nparcelas[0]['nparcelas'];
      
                            /*Verificação dos quesitos eliminatórios e simulação (else)*/
                            if( ($idade<18 || $idade>=65) || ($renda<500 || $renda>=3499.99) || ($preco>180000) ){
                                $Entrada = 0;
                                $Subsidio = 0;
                                $juros = 0;
                                $Estado = "NEGADO";
                            }
                            else{
                                
                                /*Encontando das constantes*/
                                if($idade>=18 && $idade<=25)
                                    $perIdade = 0.03;
                                if($idade>25 && $idade<=34)
                                    $perIdade = 0.025;
                                if($idade>34 && $idade<=64)
                                    $perIdade = 0.02;
                                
                                if($renda>=500 && $renda<1500){
                                    $perRenda = 0.03;
                                    $juros = 0.02;
                                }
                                if($renda>=1500 && $renda<2500){
                                    $perRenda = 0.025;
                                    $juros = 0.015;
                                }
                                if($renda>=2500 && $renda<3500){
                                    $perRenda = 0.015;
                                    $juros = 0.01;
                                }
                                
                                /*Efetuando os cálculos*/
                                $Entrada = $renda*5;
                                $Subsidio = ($perIdade + $perRenda)*$preco;
                                $Valorafinanciar = $preco - $Subsidio - $Entrada;
                                $Valorprestacao = ($Valorafinanciar*(1+($juros)^($nparcelas/12)))/$nparcelas;
             
                                /*Verificando estado do Financiamento*/
                                if($Valorprestacao>($renda/2))
                                    $Estado = "INVIAVEL";
                                else
                                    $Estado = "SIMULACAO";                                
                            }
       
                            /*Enviando valores ao banco de dados*/
                            $up = DBUpdate("simulacoes", "entrada = $Entrada", "clienteid =$clienteid");
                            
                            $up = DBUpdate("simulacoes", "subsidio = $Subsidio", "clienteid =$clienteid");
                            
                            $up = DBUpdate("simulacoes", "juros = $juros", "clienteid =$clienteid");
                            
                            $up = DBUpdate("simulacoes", "estado = '$Estado'", "clienteid =$clienteid");
                             
                            if($nome){  /*Ultima alteração*/
                            echo"
                                <table border>
                                <tr> 
                                <td width="."300".">".$nome."</td> <td  width="."123".">".$imovelid."</td> <td width="."69".">".$Entrada."</td> <td  width="."63".">".$Subsidio."</td> <td width="."40".">".$juros."</td> <td width="."146".">".$nparcelas."</td> <td  width="."100".">".$Estado."</td>  
                                </tr>
                                </table> 
                            ";
                            }
                        }
                     
                    }
                ?>
            </tbody>
        </table>
        </section>
    </body>
