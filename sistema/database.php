<?php
/*****************************************FUNÇÕES DE MANIPULAÇÃO DO BANDO DE DADOS**************************************/

	function DBConectar(){
		$link = mysqli_connect(DB_HOSTNAME,DB_USUARIO,DB_SENHA,DB_BANCODEDADOS);// mysqli_connect(host,username,password,dbname,port,socket);
                                                                                //Parâmetros definidos em "config.php";
		return $link;
		
	}
	
	function DBDesconectar($link){
		mysqli_close($link); //mysqli_close(connection);
	}
	
	
	/*Executa Pedidos(Querys)-------------------------------*/
	function DBExecutar($query){
		$link = DBConectar();
		$resultado = mysqli_query($link,$query) or die(mysqli_error($link));
		DBDesconectar($link);
		return $resultado;
	}
	
	/*Cadastrar registros-------------------------------------*/
	function DBCadastrar($table, array $dados){
		
		$campos = implode(', ', array_keys($dados));
		$valores = "'".implode("', '", $dados)."'";
        $query = "INSERT INTO {$table} ( {$campos} ) VALUES( {$valores})";
		
		return DBExecutar($query);
	}
	
	/*Ler registros -----------------------------------------*/
	function DBLer($table, $condicao = null, $campos = '*'){
		$query = "SELECT {$campos} FROM {$table} {$condicao}";
		$resultado = DBExecutar($query);
		if(!mysqli_num_rows($resultado))
			return false;
		else{
			while($res = mysqli_fetch_assoc($resultado)){
				$dados[] = $res;
			} 
		}
		return $dados;
	}
	
	/*Altera registros -------------------------------------*/
    function DBUpdate($table, $dados, $where = null){

        $query = "UPDATE {$table} SET {$dados} WHERE {$where}";
		
		return DBExecutar($query);
    }

	/*Deleta registros --------------------------------------*/
    function DBDeletar($table, $dados, $where = null){
		//$query = " DELETE FROM tabela WHERE campo = 'valor' "
		$query = " DELETE FROM {$table} WHERE {$where} = '{$dados}' ";
		echo $query;
		return DBExecutar($query);
	}
?>