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
    
    
        <!------------------------------------LISTA DE CLIENTES------------------------------------------------>
        <h2 class="st_2">Lista de clientes</h2>
        <section id="list_clientes">
            
        <!--------------Tabela---------------------->
        <table border="1">
            <thead>
                <tr> <td width="100" >CPF</td> <td width="300">Nome</td> <td width="40">Idade</td> <td width="100">Renda</td> <td>Excluir Cadastro</td></tr>
            </thead>

            <tbody>
                <?php
                    /*Leitura da tabela de clientes no banco de dados*/
                    $clientes = DBLer('clientes');
                    if($clientes){
                        foreach($clientes as $cliente){
                            echo"
                                <table border>
                                <tr> 
                                <td width="."100".">".$cliente['cpf']."</td> <td width="."300".">".$cliente['nome']."</td> <td width="."40".">".$cliente['idade']."</td> <td width="."100".">".$cliente['renda']."</td> <td width="."119"."><a href='excluir.php?EXCLUAcliente=".$cliente['cpf']."'>Excluir</a></td>  
                                </tr>
                                </table> 
                            ";
                            // 'href='excluir.php?EXCLUAcliente=' "envia" à 'excluir.php' o id (cpf) do cliente a ser excluído do DB;
                        }
                    }
                ?>
            </tbody>
        </table>
        </section>        
    </body>
</html>