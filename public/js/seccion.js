//// KEYLOG PARA QUE NO SE REPITAN LOS CODIGOS DE secciones
$("#cod_seccion_crear").keyup(function() {
 
    var palabras = this.value;
    console.log(palabras);        

    //$("#cod_matricula_matricula").append(palabras);
    $.get("../../../ajaxvalidarseccion/"+palabras+"",function(response,grado){
        console.log(response);
        /*$("#cod_sección_matricula_edit").empty();
        $("#cod_sección_matricula_edit").append('<option value="" disabled="true" selected>--Selecciona--</option>');
           */
         if(response == ""){
            $("#error").hide();
            $('#btncrearseccion').attr("disabled", false);
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
            $("#error").text('Ya existe una sección con ese código');
           
            $('#btncrearseccion').attr("disabled", true);
         }
        /*for(i=0;i<response.length;i++){
          //  $("#cod_sección_matricula_edit").append("<span id="error" class="help-block"></span>")
            console.log(response[i].cod_sección);
        }*/
    })
});