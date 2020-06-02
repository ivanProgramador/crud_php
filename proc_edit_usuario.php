<?php
/*iniciando uma sessao*/
session_start();



/*include para incluir e once somente uma vez*/
include_once("conexao.php");

/* criando variavel    usando o filter sanitizer pra limpar a variavel */
  $id              =   filter_input(INPUT_POST,'id', FILTER_SANITIZE_NUMBER_INT);
  $nome            =   filter_input(INPUT_POST,'nome', FILTER_SANITIZE_STRING);
  $email           =   filter_input(INPUT_POST,'email', FILTER_SANITIZE_EMAIL);


/*imprimindo os valores recebidos*/


/*  echo"Nome: $nome <br>";*/
/*  echo"E-mail: $email<br>";*/

/*atribuindo querie a uma variavel*/

$result_usuario = "UPDATE usuarios SET nome = '$nome' , email = '$email' , modified = NOW() WHERE id= '$id' ";


/*executando a querie*/

mysqli_query($conn,$result_usuario);



//retornando ao usuario se o valor foi salvo com sucesso

//cometi um erro aqui porque escrevevi so com um f e sao 2 erro"Fatal error: Uncaught Error: Call to undefined function mysqli_afected_rows() in C:\xampp\htdocs\crud\proc_edit_usuario.php:35 Stack trace: #0 {main} thrown in C:\xampp\htdocs\crud\proc_edit_usuario.php on line 35"

//erro reparado

if (mysqli_affected_rows($conn)) {
	
	$_SESSION['msg'] = "<p style= 'color:#00FF00;'>usuario editado com sucesso</p>";
	header("Location: index.php");


}else{
    $_SESSION['msg'] = "<p style= 'color:red;'>usuario nao foi editado com sucesso</p>";
	header("Location: editar.php?id ='$id' ");
}

?>