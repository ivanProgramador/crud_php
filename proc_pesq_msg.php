<?php

   include_once 'conexao_pdo.php';

   $assunto = filter_input(INPUT_GET,'term', FILTER_SANITIZE_STRING);

   $result_msg_cont = "SELECT assunto FROM mensagens_contatos WHERE assunto LIKE '%".$assunto%."%' ORDER BY assunto ASC LIMIT 7";
   
   //seleciona os registros

  $resultado_msg_cont = $conn -> prepare ($result_msg_cont);
    
  $resultado_msg_cont -> execute();

  while ($row_msg_cont = $resultado_msg_cont -> fetch(PDO::FETCH_ASSOC)) {

  	$data[] = $row_msg_cont['assunto'];
  	
  	  }

  	  echo json_encode($data);




?>