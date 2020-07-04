//// KEYLOG PARA QUE NO SE REPITAN LOS CODIGOS DE secciones
$("#cod_curso_crear").keyup(function() {
 
    var palabras = this.value;
    console.log(palabras);        

    //$("#cod_matricula_matricula").append(palabras);
    $.get("../../../ajaxvalidarcurso/"+palabras+"",function(response,grado){
        console.log(response);
        /*$("#cod_sección_matricula_edit").empty();
        $("#cod_sección_matricula_edit").append('<option value="" disabled="true" selected>--Selecciona--</option>');
           */
         if(response == ""){
            $("#error").hide();
            $('#btncrearcurso').attr("disabled", false);
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
            $("#error").text('Ya existe un curso con ese código');
           
            $('#btncrearcurso').attr("disabled", true);
         }
        /*for(i=0;i<response.length;i++){
          //  $("#cod_sección_matricula_edit").append("<span id="error" class="help-block"></span>")
            console.log(response[i].cod_sección);
        }*/
    })
});


// js creacion de curso
$('#colegio_de_curso').change(function(event){
   
  var colegio = this.value;
     console.log(location.href);
	
    console.log(event.target.value);
    $.get("../../../../../../ajaxgrados/"+colegio+"",function(response,colegio){
        console.log(response);
        $("#cod_nivel_de_curso").empty();
        $("#cod_nivel_de_curso").append('<option value="" disabled="true" selected>--Selecciona--</option>');
         
        for(i=0;i<response.length;i++){
            $("#cod_nivel_de_curso").append("<option value="+response[i].cod_nivel+">"+response[i].nombre_nivel+"</option>")
            console.log(response[i].cod_nivel)
        }
    });
});
$('#cod_nivel_de_curso').change(function(event){
   
  var nivel = this.value;
   console.log(location.href);
  console.log(event.target.value);
  $.get("../../../../../../ajaxseccion/"+nivel+"",function(response,colegio){
      console.log(response);
      $("#cod_grado_curso").empty();
      $("#cod_grado_curso").append('<option value="" disabled="true" selected>--Selecciona--</option>');
         
         
      for(i=0;i<response.length;i++){
          $("#cod_grado_curso").append("<option value="+response[i].cod_grado+">"+response[i].nombre_grado+"</option>")
         
      
      }
  }
  ); 
});