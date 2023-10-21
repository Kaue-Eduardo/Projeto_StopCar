<?php

    include ("connection-MySql.php");
    include ("crud-aluno.php");
    include ("header-desktop.php");
    
?>

  <style>
      .myDiv {
                padding: 20px 100px;
                text-align: left; }
  </style>
	<div class="myDiv">
  <br>
  <h3><center>Formulário de Cadastrado de Alunos</center></h3>

	<form action="insert-aluno.php" method="post">

    <div class="form-group">
      <label for="exampleFormControlSelect1">Nome:</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" name="nome"  placeholder="Informe o Nome Completo do Aluno(a)" required>
    </div>
    
    <br>

    <div class="form-group">
      <label for="exampleFormControlInput1">E-mail:</label>
      <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="Informe o E-mail do Aluno(a)" required>
    </div>

    <br>

    <div class="form-group">
      <label for="exampleFormControlInput1">Senha:</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" name="senha" placeholder="Informe a Senha do Aluno(a)" required>
    </div>

    <br>
    
    <input class="btn btn-success" type="submit" value="Inserir"/>
    <input class="btn btn-secondary" type="reset" value="Limpar"/>

  </form>
  
</div>