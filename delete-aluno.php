<?php 
	
    include ("header-desktop.php");
    include ("connection-MySql.php");
    include ("crud-aluno.php");

	delete_aluno($conexao,$_POST['matricula']);
	header("Location: select-aluno.php?removido=true");
	die();

?>