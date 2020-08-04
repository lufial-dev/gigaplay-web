var intervalo;

function scrollDireita(scroller_id){
  intervalo = setInterval(function(){ document.getElementById(scroller_id).scrollLeft += 2 }  , 5);
};
function scrollEsquerda(scroller_id){
  intervalo = setInterval(function(){ document.getElementById(scroller_id).scrollLeft -= 2 }  , 5);
};
function clearScroll(){
  clearInterval(intervalo);
};

function detalhesShow(conteudo){
    $("#detalhes-titulo").html(conteudo.titulo);
    $("#detalhes-genero").html(conteudo.genero_id);
    $("#detalhes-descricao").html(conteudo.descricao);
    
}