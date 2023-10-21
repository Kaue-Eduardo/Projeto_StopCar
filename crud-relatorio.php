<?php
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