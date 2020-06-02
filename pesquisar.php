<?php

  include_once 'conexao.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Pesquisar</title>
</head>
<body>
    <a href="index.php">Voltar ao Listar</a>
    <h5>*Pesquisa sincrona cliente clica no botao e espera a resposta do servidor</h5>
	<h1>Pesquisar Usuarios</h1>
	<form method="post" action="">
	<label>Nome:</label>
	<input type="text" name="nome" placeholder="digite o nome"><br><br>
	<input type="submit" name="senPesqUser"  value="pesquisar"><br><br>

	</form>

	<?php
       //este codigo recebe o ocnteudo da variavel a logo apos receber limpa ela pra outro uso

       $senPesqUser = filter_input(INPUT_POST,'senPesqUser',FILTER_SANITIZE_STRING);

       // este if testa se ela foi preenchida , pois ela so e preechida com o acionamento do botao , se sim ele executa o codigo dentro do if

       if ($senPesqUser) {

        //recebe o nome

        $nome = filter_input(INPUT_POST,'nome',FILTER_SANITIZE_STRING);
       
        //a consultan sql trz resultados onde a letra pesquisada existe em qualquer parte da palavra antes ou depois

        $result_usuario = "SELECT * FROM usuarios WHERE nome LIKE '%$nome%'";
        $resultado_usuario = mysqli_query($conn, $result_usuario);

        while ($row_usuario = mysqli_fetch_assoc($resultado_usuario)) {

        	echo "ID: ".$row_usuario['id']."<br>";
        	echo "Nome: ".$row_usuario['nome']."<br>";
        	echo "E-mail: ".$row_usuario['email']."<br>";
        	echo "<a href='edit_usuario.php?id=".$row_usuario['id']."'>Editar</a><br>";
            echo "<a href='proc_apagar_usuario.php?id=".$row_usuario['id']."'>Apagar</a><br><hr>"; 

        	
        }


               





       	}


	?>

</body>
</html>