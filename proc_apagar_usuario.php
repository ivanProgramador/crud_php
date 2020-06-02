<?php
   session_start();
   include_once("conexao.php");

   $id = filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT);

   if(!empty($id)){



   $result_usuario = "DELETE FROM usuarios WHERE id= '$id' ";

   mysqli_query($conn, $result_usuario);

   if (mysqli_affected_rows($conn)) {

           $_SESSION['msg'] = "<p style= 'color:#00FF00;'>usuario apagado com sucesso ! </p>";

           header("location: index.php");

   	  
   }else{

   	        $_SESSION['msg'] = "<p style= 'color:#00FF00;'>usuario não foi apagado ! </p>";

           header("location: index.php");
   }

}
else{

  $_SESSION['msg'] = "<p style= 'color:#00FF00;'>Selecione um usuario ! </p>";

           header("location: index.php");

}
?>