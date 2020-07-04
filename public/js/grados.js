function Solo_Numerico(variable){
    Numer=parseInt(variable);
    if (isNaN(Numer)){
        return "";
    }
    //else{
    //  if(Numer.length <= 8){
        return Numer;
   /* }
    else{
      return "Ingresa 8 dígitos"
    }*/
      //}
    }
    
function ValNumero(Control){
    Control.value=Solo_Numerico(Control.value);
}

$('#colegio').change(function(event){
    
    var colegio = this.value;
     console.log(location.href);
    var datos = new FormData();
	datos.append("colegio", colegio);
    console.log(event.target.value);
    $.get("../../../../../../../ajaxgrados/"+colegio+"",function(response,colegio){
        console.log(response);
        $("#cod_nivel").empty();
        for(i=0;i<response.length;i++){
            $("#cod_nivel").append("<option value="+response[i].cod_nivel+">"+response[i].nombre_nivel+"</option>")
            console.log(response[i].cod_nivel)
        }
    });
  });
  // PARA LA SEECCION
  $('#colegio_de_seccion').change(function(event){
    
    var colegio = this.value;
     console.log(location.href);
    var datos = new FormData();
	datos.append("colegio", colegio);
    console.log(event.target.value);
    $("#cod_nivel_de_seccion").empty();
    $.get("../../../../../ajaxgrados/"+colegio+"",function(response,colegio){
        console.log(response);
        $("#cod_nivel_de_seccion").append('<option value="" disabled="true" selected>--Selecciona--</option>');
           
        for(i=0;i<response.length;i++){
            
            $("#cod_nivel_de_seccion").append("<option value="+response[i].cod_nivel+">"+response[i].nombre_nivel+"</option>")
            console.log(response[i].cod_nivel)
        }
    });
  });
  //// SECCION ... PARA EXTRAER EL GRADO
  $('#cod_nivel_de_seccion').change(function(event){
   
    var nivel = this.value;
     console.log(location.href);
    console.log(event.target.value);
    $.get("../../../../../ajaxseccion/"+nivel+"",function(response,colegio){
        console.log(response);
        $("#cod_grado_de_seccion").empty();
        $("#cod_grado_de_seccion").append('<option value="" disabled="true" selected>--Selecciona--</option>');
           
           
        for(i=0;i<response.length;i++){
            $("#cod_grado_de_seccion").append("<option value="+response[i].cod_grado+">"+response[i].nombre_grado+"</option>")
           
        
        }
    }
    ); 
  });
  $('#cod_nivel_de_seccion_edit').change(function(event){
   
    var nivel = this.value;
     console.log(location.href);
    console.log(event.target.value);
    $.get("../../../../ajaxseccion/"+nivel+"",function(response,colegio){
        console.log(response);
        $("#cod_grado_de_seccion").empty();
        $("#cod_grado_de_seccion").append('<option value="" disabled="true" selected>--Selecciona--</option>');
           
           
        for(i=0;i<response.length;i++){
            $("#cod_grado_de_seccion").append("<option value="+response[i].cod_grado+">"+response[i].nombre_grado+"</option>")
           
        
        }
    }
    ); 
  });

  /// PARA EXTRAER EN LOS CURSOS
  $('#cod_nivel_de_curso').change(function(event){
   
    var nivel = this.value;
     console.log(location.href);
    console.log(event.target.value);
    $.get("../../../ajaxseccion/"+nivel+"",function(response,colegio){
        console.log(response);
        $("#cod_grado_curso").empty();
        $("#cod_grado_curso").append('<option value="" disabled="true" selected>--Selecciona--</option>');
           
           
        for(i=0;i<response.length;i++){
            $("#cod_grado_curso").append("<option value="+response[i].cod_grado+">"+response[i].nombre_grado+"</option>")
           
        
        }
    }
    ); 
  });
  $('#cod_nivel_de_curso_edit').change(function(event){
   
    var nivel = this.value;
     console.log(location.href);
    console.log(event.target.value);
    $.get("../../../../ajaxseccion/"+nivel+"",function(response,colegio){
        console.log(response);
        $("#cod_grado_edit").empty();
        $("#cod_grado_edit").append('<option value="" disabled="true" selected>--Selecciona--</option>');
           
           
        for(i=0;i<response.length;i++){
            $("#cod_grado_edit").append("<option value="+response[i].cod_grado+">"+response[i].nombre_grado+"</option>")
           
        
        }
    }
    ); 
  });

 //// KEylog comprobar los valores de clave no se repitan 
 $("#cod_nivel_crear").keyup(function() {
 
    var palabras = this.value;
    console.log(palabras);        

    //$("#cod_matricula_matricula").append(palabras);
    $.get("../../../../../../../ajaxvalidarnivel/"+palabras+"",function(response,grado){
        console.log(response);
        /*$("#cod_sección_matricula_edit").empty();
        $("#cod_sección_matricula_edit").append('<option value="" disabled="true" selected>--Selecciona--</option>');
           */
         if(response == ""){
            $("#error").hide();
            $('#btncrearnivel').attr("disabled", false);
           /* console.log("no coincide");
           
            $('#error').removeClass("alert-warning").addClass('alert-success');
            $("#error").text('Código Válido');
            $("#error").empty();*/
           // $("#btncrearmatr").disable();
         }  
         else{
           // $("#error").empty();
           $("#error").show();
            $('#error').removeClass("alert-success").addClass('alert alert-danger');
            $("#error").text('Ya existe un nivel con ese código');
           
            $('#btncrearnivel').attr("disabled", true);
         }
        /*for(i=0;i<response.length;i++){
          //  $("#cod_sección_matricula_edit").append("<span id="error" class="help-block"></span>")
            console.log(response[i].cod_sección);
        }*/
    })
});



//// KEYLOG PARA QUE NO SE REPITAN LOS CODIGOS DE GRADOS
$("#cod_grado_crear").keyup(function() {
 
    var palabras = this.value;
    console.log(palabras);        

    //$("#cod_matricula_matricula").append(palabras);
    $.get("../../../../../../ajaxvalidargrado/"+palabras+"",function(response,grado){
        console.log(response);
        /*$("#cod_sección_matricula_edit").empty();
        $("#cod_sección_matricula_edit").append('<option value="" disabled="true" selected>--Selecciona--</option>');
           */
         if(response == ""){
            $("#error").hide();
            $('#btncreargrado').attr("disabled", false);
           /* console.log("no coincide");
           
            $('#error').removeClass("alert-warning").addClass('alert-success');
            $("#error").text('Código Válido');
            $("#error").empty();*/
           // $("#btncrearmatr").disable();
         }  
         else{
           // $("#error").empty();
           $("#error").show();
            $('#error').removeClass("alert-success").addClass('alert alert-danger');
            $("#error").text('Ya existe un nivel con ese código');
           
            $('#btncreargrado').attr("disabled", true);
         }
        /*for(i=0;i<response.length;i++){
          //  $("#cod_sección_matricula_edit").append("<span id="error" class="help-block"></span>")
            console.log(response[i].cod_sección);
        }*/
    })
});



