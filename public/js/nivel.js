// JS PARA CARGA DE CODIGO AUTOINCREMENTAR
/*
$(document).ready(function() {
    $.get("../../../../../../../ajaxnivel/",function(response){
        console.log(response);
        var numeromax = 0;
        if(response == null){
            numeromax=0;
        }
        else{
            
            for(i=0;i<response.length;i++){
                var anescolar = response[i].cod_nivel;
                anescolar = parseInt(anescolar);
                if(numeromax<anescolar){
                    numeromax = anescolar;
                }
            }
        }
        console.log(numeromax);
        $("#cod_nivel_crear").val(numeromax+1)
    })

});*/