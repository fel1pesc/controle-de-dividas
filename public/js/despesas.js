$(document).ready(function(){
    $("#form_filtro").submit(function(){
        $.ajax({
            type: "GET",
            url: $("form_filtro").attr('action'),
            data: {resumo_filtro: $("#resumo_filtro").val(), filtro: true},
            success: function(data){
                if(data) {
                    $("#table").html(data);
                }
            }, error: function(){
                alert('Erro ao filtrar! Por favor, recarregue a página.');
            }
        });
        return false;
    });
});