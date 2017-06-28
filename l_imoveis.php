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
        <!------------------------------------LISTA DE Imóveis------------------------------------------------>
        <h2 class="st_2">Lista de Imóveis</h2>
        <section id="list_clientes">
            
            
        <table border="1">
            <thead>
                <tr> <td width="200">Nome do Empreendimento</td> <td>Unidade</td> <td width="80">Preço</td> <td>Excluir Cadastro</td></tr>
            </thead>
            
            <tbody>
                <?php        
                    $imoveis = DBLer('imoveis');
                    if($imoveis){
                        foreach($imoveis as $imovel){
                            echo"
                                <table border>
                                <tr> 
                                <td width="."200".">".$imovel['nome']."</td> <td width="."60".">".$imovel['unidade']."</td> <td width="."80".">".$imovel['preco']."</td> <td width="."118"."><a href='excluir.php?EXCLUAimovel=".$imovel['unidade']."'>Excluir</a></td>  
                                </tr>
                                </table> 
                            ";
                            // 'href='excluir.php?EXCLUAimovel=' "envia" à 'excluir.php' o id (unidade) do imovel a ser excluído do DB;
                        }
                    }
                            
                ?>
            </tbody>
        </table>
        </section>        
    </body>
</html>