$(document).ready(function(){
    $("#button-filtro").click(function(){
    	$.ajax({
            type: "GET",
            url: window.location.origin,
            data: {resumo_filtro: $("#resumo_filtro").val(), filtro: true},
            success: function(data){
                if(data) {
                   $("#table").html(data);
                }
            }, error: function(){
                alert('Erro ao filtrar! Por favor, recarregue a página.');
            }
        });
    });
});