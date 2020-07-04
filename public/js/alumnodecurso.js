
/// JAVASCRIPT PARA COMPROBAR EL CÓDIGO DE ALUMNO en el asignar nuevo alumno de curso

$("#cod_alumno_de_curso").keyup(function() {
 
    var palabras = this.value;
               

    //$("#cod_matricula_matricula").append(palabras);
    $.get("../../../../../ajaxvalidarmatricula/"+palabras+"",function(response,grado){
        console.log(response);
        /*$("#cod_sección_matricula_edit").empty();
        $("#cod_sección_matricula_edit").append('<option value="" disabled="true" selected>--Selecciona--</option>');
           */
         if(response == ""){
              // $("#error").empty();
           $("#error").show();
           $('#error').removeClass("alert-success").addClass('alert alert-danger');
           $("#error").text('Código de matrícula inexistente');
          
           $('#btnnuevoalumnocurso').attr("disabled", true);
           
           /* console.log("no coincide");
           
            $('#error').removeClass("alert-warning").addClass('alert-success');
            $("#error").text('Código Válido');
            $("#error").empty();*/
           // $("#btncrearmatr").disable();
         }  
         else{
            $("#error").hide();
            $('#btnnuevoalumnocurso').attr("disabled", false);
         }
        /*for(i=0;i<response.length;i++){
          //  $("#cod_sección_matricula_edit").append("<span id="error" class="help-block"></span>")
            console.log(response[i].cod_sección);
        }*/
    })
});
