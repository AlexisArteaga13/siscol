// codigo de contrato
/*
$(document).ready(function() {
    $.get("../../../ajaxcontrato/",function(response){
        console.log(response);
        var numeromax = 0;
        if(response == null){
            numeromax=0;
        }
        else{
            
            for(i=0;i<response.length;i++){
                var anescolar = response[i].CodContrato;
                anescolar = parseInt(anescolar);
                if(numeromax<anescolar){
                    numeromax = anescolar;
                }
            }
        }
        console.log(numeromax);
        var nuevoid = numeromax +1 ;
        var idmatri= nuevoid.toString();
        
         //   idmatri.padStart(8,"0");
        $("#CodContrato").val(idmatri.padStart(8,"0"))
    })
  
  });*/