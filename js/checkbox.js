//ativo
$("input[name='ativo']").click(function(){
  var id = $(this).attr("data-id");
  var ativo = $(this).is(":checked") == true ? 1 : 0;
  $.post("../php/checkbox.php", {ativo:ativo, id:id, acao:"ativo"}, function(retorno){
    if(retorno != 0){
      alert("Erro:"+retorno);
    }
    location.reload();
  });
});

//Destaque
$("input[name='destaque']").click(function(){
  var id = $(this).attr("data-id");
  var destaque = $(this).is(":checked") == true ? 1 : 0;
  $.post("../php/checkbox.php", {destaque:destaque, id:id, acao:"destaque"}, function(retorno){
    if(retorno != 0){
      alert("Erro:"+retorno);
    }
    location.reload();
  });

});

//delete
$("button[name='lixeira']").click(function(){
  //variaveis
  var id = $(this).attr("data-id");
  
  $.post("../php/checkbox.php", {id:id, acao:"deleta"}, function(retorno){
    if(retorno != 0){
      console.log("Erro:"+retorno);
    }
    location.reload();
  });

});

//restaura
$("button[name='restaura']").click(function(){
  var id = $(this).attr("data-id");
  $.post("../php/checkbox.php", {id:id,  acao:"restaura"}, function(retorno){
    if(retorno != 0){
      alert("Erro:"+retorno);
    }
    location.reload();
  });
});
