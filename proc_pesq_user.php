<?php

  include_once 'conexao.php';

  $usuarios = filter_input(INPUT_POST,'palavra', FILTER_SANITIZE_STRING);
  
   //BUSCANDO NO BANCO DE DADOS O NME DO USUARIO REFERENTE A PALAVRA

  $result_user = "SELECT * FROM usuarios WHERE nome LIKE '%$usuarios%' LIMIT 20";

  $resultado_user = mysqli_query($conn, $result_user);

  if(($resultado_user)AND ($resultado_user -> num_rows !=0) ){

    while ($row_user = mysqli_fetch_assoc($resultado_user)){

             echo "<li>".$row_user['nome']."</li>";
            

   	
    }
     

  }else{
  	echo "Nenhum usuario encontrado !";
  }


?>