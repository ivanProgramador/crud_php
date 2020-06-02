
<?php

  session_start();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Crud-cadastrar</title>

	<meta charset="utf-8">
</head>
<body>

	<h1>Cadastrar Usuário</h1>


   <?php     
      /*para exibir uma msg de sucesso

        inicia a sessao la em cima
       
        cria um if pra checar se a sessao existe
        traves do isset se a sessao existir coloca um echo com a sessao e o conteudo de sua mensagem
        e depois usa o unset pra destruit a sessao 

      */

      if (isset($_SESSION['msg'])) {

      	  echo $_SESSION['msg'];

      	  unset($_SESSION['msg']);

      }



   ?>

	<form method="post" action="proc_cad_usuario.php">
		<label>Nome:</label>
		<input type="text" name="nome" placeholder="digite o nome completo"><br><br>

		<label>E-mail:</label>

		<input type="email" name="email" placeholder="digite seu E-mail"><br><br>


		<input type="submit" value="cadastrar">


		

	</form>

   <a href="index.php">Listar</a><br>
    
</body>
</html>