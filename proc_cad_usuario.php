<?php
/*iniciando uma sessao*/
session_start();



/*include para incluir e once somente uma vez*/
include_once("conexao.php");

/* criando variavel    usando o filter sanitizer pra limpar a variavel */

  $nome            =   filter_input(INPUT_POST,'nome', FILTER_SANITIZE_STRING);
  $email           =   filter_input(INPUT_POST,'email', FILTER_SANITIZE_EMAIL);


/*imprimindo os valores recebidos*/


/*  echo"Nome: $nome <br>";*/
/*  echo"E-mail: $email<br>";*/

/*atribuindo querie a uma variavel*/

$result_usuario = "INSERT INTO usuarios(nome,email,created)values('$nome','$email',NOW())";


/*executando a querie*/

mysqli_query($conn,$result_usuario);



//retornando ao usuario se o valor foi salvo com sucesso

if (mysqli_insert_id($conn)) {
	
	$_SESSION['msg'] = "<p style= 'color:#00FF00;'>usuario cadastrado com sucesso</p>";
	header("Location: index.php");


}else{
    $_SESSION['msg'] = "<p style= 'color:red;'>usuario nao foi cadastrado com sucesso</p>";
	header("Location: index.php");
}

?>