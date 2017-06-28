<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Simulação Habitacional</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/estilos.css">
    
    <!--Estabelece acesso aos arquivos do banco de dados-->
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
    
    
        <!-----------------------------CADASTRAMENTO DE CLIENTES---------------------------------->
        <h2 class="st_1">Cadastramento de Cliente:</h2>
        <section id="cadstr_clientes">
            <!----------Formulário------------------------------------------------>
            <fieldset>
            <form action="" method="post">
                <label for="icpf">CPF: </label>
                <input type="number" name="cpf" id="icpf" placeholder="Apenas números">
                <label for="inome">Nome: </label>
                <input type="text" name="nome" id="inome" maxlength="50">
                <label for="iidade">Idade: </label>
                <input type="number" name="idade" id="iidade" placeholder="Em anos">
                <label for="irenda">Renda : </label>
                <input type="text" name="renda" id="irenda" placeholder="Valor em reais">
                <input type="submit" name="publicar" value="Publicar">
            </form>
            </fieldset>
        
            <?php
                if(isset($_POST['publicar'])){
                    $cliente['cpf'] = strip_tags(trim($_POST['cpf']));
                    $cliente['nome'] = strip_tags(trim($_POST['nome']));
                    $cliente['idade'] = strip_tags(trim($_POST['idade']));
                    $cliente['renda'] = strip_tags(trim($_POST['renda']));
                    
                    /*Cadastro dos dados do cliente no banco de dados*/
                    if(DBCadastrar('clientes', $cliente)) //TRUE: Se cadasrou; FALSE: Não conseguiu cadastrar!
                        echo "Cliente Cadastrado <br> <a class='voltar' href='index.html'>Voltar</a>";
                    else
                        echo "Erro no cadastro<br>";
                }            
            ?>
        </section>
    </body>
</html>