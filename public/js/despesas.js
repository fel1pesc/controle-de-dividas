$(document).ready(function(){
    $("#button_filtro").click(function(){
    	$.ajax({
            type: "GET",
            url: $("limpar_form_filtro").attr('href'),
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