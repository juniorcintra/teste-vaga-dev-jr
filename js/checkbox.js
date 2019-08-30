//ativo
$("input[name='ativo']").click(function(){
  var id = $(this).attr("data-id");
  var tbl = $(this).attr("data-tbl");
  var idTbl = $(this).attr("data-idTbl");
  var ativo = $(this).is(":checked") == true ? 1 : 0;
  $.post("controles.php", {ativo:ativo, id:id, tbl:tbl, idTbl:idTbl, desc:desc, acao:"ativo"}, function(retorno){
    if(retorno != 0){
      alert("Erro:"+retorno);
    }
  });
});

//Destaque
$("input[name='destaque']").click(function(){
  var id = $(this).attr("data-id");
  var tbl = $(this).attr("data-tbl");
  var idTbl = $(this).attr("data-idTbl");
  var destaque = $(this).is(":checked") == true ? 1 : 0;
  $.post("controles.php", {destaque:destaque, id:id, tbl:tbl, idTbl:idTbl, desc:desc, acao:"destaque"}, function(retorno){
    if(retorno != 0){
      alert("Erro:"+retorno);
    }
  });
});