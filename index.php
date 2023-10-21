<?php

    include ("connection-MySql.php");
    include ("crud-aluno.php");

    $pessoa = select_usuario($conexao,$_POST["email"],$_POST["senha"]);

    if($pessoa == null)
    {
        header('Location:form-error.php');
    }
    else{
            $aluno = array();
            $aluno = $pessoa;

            //session_start();
            // $_SESSION["EMAIL"] = $aluno["EMAIL"];
            // $_SESSION["SENHA"] = $aluno["SENHA"];

            header('Location:desktop.php');
    }

?>