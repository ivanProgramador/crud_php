$(function(){
   
   $("#pesquisa").keyup(function(){

   	  //recuperar o valor digitado no campo

      var pesquisa = $(this).val();
      
      //verificar se aslgo foi digitado

      if(pesquisa != ''){

      	var dados = {

      		palavra:pesquisa
      	}

      	$.post('proc_pesq_user.php', dados,function(retorna){
             
             //mostra dentro de uma ul o rsultado obtido

             $(".resultado").html(retorna);

      	});

      }



   });


});