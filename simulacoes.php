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
        
<!---------------------------------------Simulação de Financiamento------------------------------------------------>
        <h2 class="st_1">Simular Financiamento:</h2>
        <section id="cadstr_clientes">
            <fieldset>
            <form action="" method="post">
                <label for="iclienteid">Cliente: </label>
                <input type="text" name="clienteid" id="iclienteid" placeholder="CPF do cliente" maxlength="11"> <!--Fazer lista com as opsões-->
                <label for="iimovelid">Imóvel: </label>
                <input type="number" name="imovelid" id="iimovelid" placeholder="Unidade do imóvel" maxlength="5">
                <label for="inparcelas">Número de parcelas: </label>
                <input type="number" name="nparcelas" id="inparcelas" placeholder="Ou número de meses">
                <input type="submit" name="publicar" value="Publicar">
            </form>
            </fieldset>
        <?php
            if(isset($_POST['publicar'])){
                $simulacao['clienteid'] = strip_tags(trim($_POST['clienteid']));
                $simulacao['imovelid'] = strip_tags(trim($_POST['imovelid']));
                $simulacao['nparcelas'] = strip_tags(trim($_POST['nparcelas']));
                    
                if(DBCadastrar('simulacoes', $simulacao))
                    echo "Simulação realizada com sucesso! <br> <a class='ir' href='l_simulacoes.php'>Ver</a>";
                else
                    echo "Erro no cadastro<br>";
              
            }   
        ?>
        </section>
    </body>
</html>        
        
        
        
        
        