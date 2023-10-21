<?php

    // Delete Aluno
	function delete_aluno($conexao,$matricula){
		
        $query = "DELETE 
		            FROM ALUNO 
		           WHERE MATRICULA = '{$matricula}'";
		           
		mysqli_query($conexao,$query);		
		
        return mysqli_query($conexao,$query);
	} 

    // Insert Aluno 
    function insert_aluno($conexao,$nome,$email,$senha)
    {

        $query = "INSERT INTO ALUNO (NOME,EMAIL,SENHA)
                       VALUES ('{$nome}','{$email}','{$senha}')";

        return mysqli_query($conexao,$query);
    } 

    // Select Update Aluno
	function select_update_aluno($conexao,$matricula){	
		$query = "SELECT * 
		            FROM ALUNO 
		           WHERE MATRICULA = '{$matricula}'";
		
		$resultado = mysqli_query($conexao, $query);
		return mysqli_fetch_assoc($resultado);
	}

    // Update Entrada 
	function update_aluno($conexao,$matricula,$nome,$email,$senha){

		$query = "UPDATE ALUNO 
                     SET NOME = '{$nome}',
                        EMAIL = '{$email}',
                        SENHA = '{$senha}'
		        WHERE MATRICULA = '{$matricula}'";
                
	    return mysqli_query($conexao,$query);
    }

    // Select Usuario
    function select_usuario($conexao, $email, $senha)
    {
        $query = "SELECT *
                    FROM ALUNO
                   WHERE EMAIL = '{$email}'
                     AND SENHA = '{$senha}'";

        $resultado = mysqli_query($conexao, $query);
        $usuario = mysqli_fetch_assoc($resultado);

        return $usuario;
    }

    // Select Aluno
	function select_aluno($conexao){
	    
        $listaAluno = array();

		$query = "SELECT * 
                    FROM ALUNO 
                ORDER BY NOME";

		$resultado = mysqli_query($conexao,$query);
		
        while($registroAluno = mysqli_fetch_assoc($resultado))
        {
            array_push($listaAluno,$registroAluno);
		}

		return $listaAluno;
	} 

?>