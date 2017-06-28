<!DOCTYPE html>
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
        
        <!CADASTRAMENTO DE IMÓVEIS----------------------------------------->
        <h2 class="st_1">Cadastramento de Imóveis:</h2>
        <section id="cadstr_clientes">
            <fieldset>
            <form action="" method="post">
                <label for="inome">Nome do Empreendimento: </label>
                <input type="text" name="nome" id="inome" placeholder="Nome" maxlength="50">
                <label for="iunidade">Unidade: </label>
                <input type="number" name="unidade" id="iunidade" placeholder="Unidade" maxlength="5"> <!--Supõe-se a Unidade como um código individual de 5 dígitos------------------------------>
                <label for="ipreco">Preço: </label>
                <input type="text" name="preco" id="ipreco" placeholder="Valor em reais">
                <input type="submit" name="publicar" value="Publicar">
            </form>
            </fieldset>
            
        <?php
            if(isset($_POST['publicar'])){
                $imovel['nome'] = strip_tags(trim($_POST['nome']));
                $imovel['unidade'] = strip_tags(trim($_POST['unidade']));
                $imovel['preco'] = strip_tags(trim($_POST['preco']));
                    
            if(DBCadastrar('imoveis', $imovel)) //TRUE: Se cadasrou; FALSE: Não conseguiu cadastrar!
                echo "Imóvel  Cadastrado <br> <a class='voltar' href='index.html'>Voltar</a>";
            else
                echo "Erro no cadastro<br>";
            }   
        ?>
        </section>
    </body>
</html>