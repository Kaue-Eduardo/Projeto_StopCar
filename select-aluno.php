<?php

    include ("connection-MySql.php");
    include ("crud-aluno.php");
    include ("header-desktop.php");

?>
	<br><br><h3><center>Lista de Aluno(s)</center></h3>

	<?php
	
	if(array_key_exists("removido", $_GET) && $_GET["removido"]=="true"){
	?>
		<center><h3><b><p class="text-danger"> Atenção: Registro Aluno Excluído!!!</b></p></h3></center>	
	<?php
	} ?>

	<style>
      .myDiv {
                padding: 20px 100px;
                text-align: left; }
  	</style>


	<div class="myDiv">
	<table class="table table-hover">
		
		<tr>
			<th><b> MATRICULA </b></th>
			<th><b> NOME </b></th>
			<th><b> EMAIL </b></th>
			<th><b> SENHA </b></th>
            <th><b> EDITAR </b></th>
            <th><b> EXCLUIR </b></th>
		</tr>
<?php

    // Crud Aluno
	$listaRegistroAluno = select_Aluno($conexao);
    
    // Laço de repetição
    foreach($listaRegistroAluno as $registroAluno):
?>
		<tr>
			<td><?= $registroAluno['MATRICULA'] ?></td>
			<td><?= $registroAluno['NOME'] ?></td>
			<td><?= $registroAluno['EMAIL'] ?></td>
			<td><?= $registroAluno['SENHA'] ?></td>
            <td><a class = "btn btn-warning" href="form-update-aluno.php?matricula=<?=$registroAluno['MATRICULA']?>">Editar</a></td>
            <td>
				<form action="delete-aluno.php" method = "post">
					<input type="hidden" name="matricula" value="<?=$registroAluno['MATRICULA']?>">
					<button class="btn btn-danger">Excluir</button> 
				</form>
			</td>
		</tr>

<?php
    endforeach
?>

    </table>      
	</div>

    <?php include("footer-desktop.php");?>