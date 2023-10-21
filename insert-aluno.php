<?php

include ("connection-MySql.php");
include ("crud-aluno.php");
include ("header-desktop.php");

    // Função Insert
	if(insert_aluno($conexao,$_POST["nome"],$_POST["email"],$_POST["senha"]))
                      
		{?>
            <style>
                    .myDiv {
                            padding: 20px 50px;
                            text-align: left; }
            </style>
	        
            <div class="myDiv">
			
                        <h3><p class="text-success"> Aluno(a) Cadastrado c/Sucesso!!!</p></h3>
                        Nome: <?=$_POST["nome"];?><br>
                        <hr>
                        E-mail: <?=$_POST["email"];?><br>
                        <hr>
                        Senha: <?=$_POST["senha"];?><br>
                        <hr>
            </div>
		<?php
	}
	else
		{
			$msg = mysqli_error($conexao);?>
			<?php echo $msg;   ?>
			<h3><p class="text-danger"> Aluno(a) Não Cadastrado!!!</p></h3>
		<?php
		}
	
	include("footer.php");?> 