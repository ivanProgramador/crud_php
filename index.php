<?php
    session_start();
    include_once 'conexao.php';
 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<a href="cad_usuario.php">Cadastrar</a><br>
	<a href="index.php">Listar</a><br>
  <h2>tipos possiveis de pesquisa neste sistema</h2>
  <h3><a href="pesquisar.php">1 - Pesquisa Comum</a></h3>
  <h3><a href="pesquisa_ass.php">2 - Pesquisa assincrona</a></h3>
  



	<h1>Listar Usuarios</h1>
    <?php

      if (isset($_SESSION['msg'])) {
      	  echo $_SESSION['msg'];
          unset($_SESSION['msg']);

      }

     /*controle de paginaçao define quantos resultados por pagina serao exibidos FILTER_SANITIZE_NUMBER_INT faz parte da versao mais atual de php*/

     $pagina_atual = filter_input(INPUT_GET, 'pagina',FILTER_SANITIZE_NUMBER_INT);



     $pagina = (!empty($pagina_atual))? $pagina_atual: 1;



     /*setar a quantidade de itens por pagina*/

     $qnt_result_pg = 3;



     /*calcular o inicio da visu*/

     $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;




      /*o erro que aconteceu foi porque eu coloquei o nome da tabela errado*/
      $result_usuarios = "SELECT * FROM usuarios LIMIT $inicio,$qnt_result_pg";


      $resultado_usuarios = mysqli_query($conn, $result_usuarios);


      while ($row_usuario = mysqli_fetch_assoc($resultado_usuarios)) {

         echo "ID:  ".$row_usuario["id"]."<br>";
         echo "Nome: ".$row_usuario["nome"]."<br>";
         echo "Email: ".$row_usuario["email"]."<br>"; 
         echo "<a href='edit_usuario.php?id=".$row_usuario['id']."'>Editar</a><br>";
    
         echo "<a href='proc_apagar_usuario.php?id=".$row_usuario['id']."'>Apagar</a><br><hr>";           




       }


     // paginaçao somar a quantidade de usuarios ele usa o count p´ra contar quantos ids existem
     // e depois ele joga o valor pra dentro do num_result que um alias como se ele dicesse que eur receber o resultado como num_result basicamente o codigo abaixo diz: selecione  
     // e conte os ids como number_result da tabela usuarios, como eu tenho 12 cadastros 12 ids serao contados
     // e a variavel num_result recebera o numero 12.  

     $result_pg = "SELECT COUNT(id) AS num_result FROM usuarios";

     // executando a consulta e colocando o resultado dentro da variavel   $resultado_pg 

      $resultado_pg = mysqli_query($conn,$result_pg);

      //neste momento a avriavel $resultado_pg tem dentro de si os id´s, nomes e emails cadastrados, mais pra poder visualizar isso
      //e preciso jogar tudo em um array que vai organizar as informaçoes e impri-las conforme a necessidade
      // esta e a funçao da  mysqli_fetch_assoc();

      $row_pg = mysqli_fetch_assoc($resultado_pg);
      
      // agora o resultado pg que contem o resultado da querie executada e transformado em um array e o resultado da aquantidade 
      // posiçoes dentro dele e igual a 13 que eexatemente a quantidade de registro no banco de dados
                    //  |
                    //  v

     // echo $row_pg['num_result'];


      //encontrando a quantidade de paginas , pra saber quantas paginas vao ser exibidas com base nos dados que preciso mostrar
      // o $row_pg que e um array que contem a quantidade de ids que existem no banco vale 13 e a veriavel  $qnt_result_pg que e responsavel por dizer
      //quantos itens mostrar por pagina terao de participar de uma formula o num_result(contem os elementos) a $qnt_result_pg contem a quantia por pagina que //deve ser exibida entao e so dividir os itens que existem pelas paginas, e como nao pode existir item quaebrado usei a funlçao ceil() pra arredondar. 

      $quantidade_pg = ceil($row_pg['num_result']/ $qnt_result_pg);

      //limitar os links antes e depois

      $max_links = 2;


      //este link alem de referenciar o arquivo listar.php ainda isntancia a variavel pagina com o numero 1 para
      // o caso do usuario querer voltar ao inicio ele ir direto pra pagina 1

      echo "<a href='index.php?pagina=1'>Primeira </a>";


      for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina  -1; $pag_ant ++){

         if($pag_ant >= 1){


             	 echo "<a href='index.php?pagina=$pag_ant'> $pag_ant</a>";

             	   }


      }


    






      //mostra a pagina que o cliente esta
      echo " $pagina";


      for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep ++){

      	if($pag_dep < $quantidade_pg){
             echo "<a href='index.php?pagina=$pag_dep'> $pag_dep</a>";
            }
      	
      }


      //este link tambem referencia e instancia porem ao inves de taribuir um numero ele atribui um resultado que e o produto da divisao de itens pelo numero de paginas entao sempre qqque aumentar a quantidade de itens ele aumenta o numero de paginas automaticamente, por isso o numero da pagina ao invers de ser numero assmune o valor de uma variavel. 



      echo "<a href='index.php?pagina=$quantidade_pg'> Ultima</a>";













     


    ?>











   


    </body>
</html>