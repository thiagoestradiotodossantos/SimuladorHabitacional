<!--ARQUIVO RESPONSÁVEL POR APAGAR REGISTROS DO BANCO DE DADOES (BOTÕES "EXCLUIR")------>
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
            <h2 class="titulo_2">Imobiliária Lothus - Excluir Cadastro de Cliente</h2>                
        </header>

        <?php
            $exclua=NULL;
            if(isset($_GET['EXCLUAcliente'])){  //Se EXCLUAcliente foi enviado;
                $exclua = $_GET['EXCLUAcliente'];
                $tabela = "clientes";
                $campo = "cpf";

                $acao = DBDeletar($tabela, $exclua, $campo);    //Apaga registro cujo 'cpf' == EXCLUAcliente;
                
                if($acao)
                    echo "<br>Registo do cliente apagado com sucesso!<br>";
                else
                    echo "Falha no processo!";
                
                echo "<a href='l_clientes.php'>Voltar</a>";
            }
            elseif(isset($_GET['EXCLUAimovel'])){   //Se EXCLUAimovel foi enviado;
                $exclua = $_GET['EXCLUAimovel'];

                $tabela = "imoveis";
                $campo = "unidade";

                $acao = DBDeletar($tabela, $exclua, $campo);    //Apaga registro cuja 'unidade' == EXCLUAimovel;
                
                if($acao)
                    echo "<br>Registo do imóvel apagado com sucesso!<br>";
                else
                    echo "Falha no processo!";
                
                echo "<a href='l_imoveis.php'>Voltar</a>";              
            }
            else
                $exclua = NULL;
        ?>
    </body>
</html>