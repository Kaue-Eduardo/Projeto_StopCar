<?php

    include ("connection-MySql.php");
    include ("crud-aluno.php");
    include ("header-desktop.php");

    // Função
    $registroAluno = select_update_aluno($conexao,$_GET["matricula"]);
    
?>

  <style>
      .myDiv {
                padding: 20px 50px;
                text-align: left; }
  </style>
	<div class="myDiv">
  
  <h3><center>Formulário de Cadastrado de Alunos</center></h3>

	<form action="update-aluno.php" method="post">

    <div class="form-group">
      <label for="exampleFormControlSelect1">Matrícula:</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" name="matricula"  value="<?=$registroAluno['MATRICULA']?>" readonly>
    </div>


    <div class="form-group">
      <label for="exampleFormControlSelect1">Nome:</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" name="nome"  value="<?=$registroAluno['NOME']?>" >
    </div>
    
    <br>

    <div class="form-group">
      <label for="exampleFormControlInput1">E-mail:</label>
      <input type="email" class="form-control" id="exampleFormControlInput1" name="email" value="<?=$registroAluno['EMAIL']?>">
    </div>

    <br>

    <div class="form-group">
      <label for="exampleFormControlInput1">Senha:</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" name="senha" value="<?=$registroAluno['SENHA']?>">
    </div>

    <br>
    
    <input class="btn btn-success" type="submit" value="Salvar"/>

  </form>
  
</div>