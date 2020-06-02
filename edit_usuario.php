<?php

  session_start();

  /*include para incluir e once somente uma vez*/
   include_once("conexao.php");

   $id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);


   // esta query fara uma busca seletiva no banco de dados por um id especifico no caso id 2
   // e o resultado da busca sera atribuido a variavel $result_usuario
   $result_usuario ="SELECT * FROM usuarios WHERE id='$id'";

   //aqui eu chamo a mysqli_query pra executar a instrçao sql selecionando toda a linha correspondente ao id 2 
   $resultado_usuario = mysqli_query($conn,$result_usuario);

   //aqui eu chamo uma funcçao que torna os dados em array pra eu poder ver os resultados
   // etraibuo os mesmos a uma variavel

   $row_usuario = mysqli_fetch_assoc($resultado_usuario);






?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Crud-cadastrar</title>

	<meta charset="utf-8">
</head>
<body>

	<h1>Editar Usuario</h1>


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

	<form method="post" action="proc_edit_usuario.php">

    <input type="hidden" name="id" value="   <?php echo $row_usuario['id'];?>">

    <!--pra mostrar o nome dentro do campo e so pegar a variavel que tornei um array e referenciar o dados que voce precisa
        botar m cho em php dentro do value que mostra dentro do campo
    -->


		<label>Nome:</label>
		<input type="text" name="nome"   value="<?php echo $row_usuario['nome'];?>"><br><br>

		<label>E-mail:</label>

		<input type="email" name="email"   value="<?php echo $row_usuario['email'];?>"><br><br>


		<input type="submit" value="Editar">


		

	</form>

   <a href="index.php">Listar</a><br>
    
</body>
</html>