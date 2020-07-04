 /// JS DE LAS MATRÍCULAS 
 $('#colegio_matricula').change(function(event){
   
    var colegio = this.value;
     console.log(location.href);
    console.log(event.target.value);
    $.get("../../../../ajaxgrados/"+colegio+"",function(response,colegio){
        console.log(response);
        $("#cod_nivel_matricula").empty();
        $("#cod_nivel_matricula").append('<option value="" disabled="true" selected>--Selecciona--</option>');
           
           
        for(i=0;i<response.length;i++){
            $("#cod_nivel_matricula").append("<option value="+response[i].cod_nivel+">"+response[i].nombre_nivel+"</option>")
           
        
        }
    }
    ); 
  });
  // JS DE LA CARGA DE SELECT DE EL GRADO DE MATRICULADO
  $('#cod_nivel_matricula').change(function(event){
   
    var nivel = this.value;
     console.log(location.href);
    console.log(event.target.value);
    $.get("../../../../ajaxseccion/"+nivel+"",function(response,colegio){
        console.log(response);
        $("#cod_grado_matricula").empty();
        $("#cod_grado_matricula").append('<option value="" disabled="true" selected>--Selecciona--</option>');
        $("#cod_sección_matricula").empty();
        $("#cod_sección_matricula").append('<option value="" disabled="true" selected>--Selecciona--</option>');
          
        for(i=0;i<response.length;i++){
            $("#cod_grado_matricula").append("<option value="+response[i].cod_grado+">"+response[i].nombre_grado+"</option>")
           
        
        }
    }
    ); 
  });
  // JS DE LA CARGA DE SELECT DE LA SECCIÓN DEL MATRICULADO
  $('#cod_grado_matricula').change(function(event){
   
    var grado = this.value;
     console.log(location.href);
    console.log(event.target.value);
    $.get("../../../../ajaxobtnseccion/"+grado+"",function(response,grado){
        console.log(response);
        $("#cod_sección_matricula").empty();
        $("#cod_sección_matricula").append('<option value="" disabled="true" selected>--Selecciona--</option>');
           
           
        for(i=0;i<response.length;i++){
            $("#cod_sección_matricula").append("<option value="+response[i].cod_sección+">"+response[i].nombre_seccion+"</option>")
           
        
        }
    }
    ); 
  });
  // JAVA SCRIPT PARA LA EDICION DE CAMPOS DE MATRICULAS
  ///////////////
  ///////
  $('#colegio_matricula_edit').change(function(event){
   
    var colegio = this.value;
     console.log(location.href);
    console.log(event.target.value);
    $.get("../../../../ajaxgrados/"+colegio+"",function(response,colegio){
        console.log(response);
        $("#cod_nivel_matricula_edit").empty();
        $("#cod_nivel_matricula_edit").append('<option value="" disabled="true" selected>--Selecciona--</option>');
           
           
        for(i=0;i<response.length;i++){
            $("#cod_nivel_matricula_edit").append("<option value="+response[i].cod_nivel+">"+response[i].nombre_nivel+"</option>")
           
        
        }
    }
    ); 
  });
  // JS DE LA CARGA DE SELECT DE EL GRADO DE MATRICULADO
  $('#cod_nivel_matricula_edit').change(function(event){
   
    var nivel = this.value;
     console.log(location.href);
    console.log(event.target.value);
    $.get("../../../../../ajaxseccion/"+nivel+"",function(response,colegio){
        console.log(response);
        $("#cod_grado_matricula_edit").empty();
        $("#cod_grado_matricula_edit").append('<option value="" disabled="true" selected>--Selecciona--</option>');
        $("#cod_sección_matricula_edit").empty();
        $("#cod_sección_matricula_edit").append('<option value="" disabled="true" selected>--Selecciona--</option>');
          
        for(i=0;i<response.length;i++){
            $("#cod_grado_matricula_edit").append("<option value="+response[i].cod_grado+">"+response[i].nombre_grado+"</option>")
           
        
        }
    }
    ); 
  });
  // JS DE LA CARGA DE SELECT DE LA SECCIÓN DEL MATRICULADO
  $('#cod_grado_matricula_edit').change(function(event){
   
    var grado = this.value;
     console.log(location.href);
    console.log(event.target.value);
    $.get("../../../../../ajaxobtnseccion/"+grado+"",function(response,grado){
        console.log(response);
        $("#cod_sección_matricula_edit").empty();
        $("#cod_sección_matricula_edit").append('<option value="" disabled="true" selected>--Selecciona--</option>');
           
           
        for(i=0;i<response.length;i++){
            $("#cod_sección_matricula_edit").append("<option value="+response[i].cod_sección+">"+response[i].nombre_seccion+"</option>")
           
        
        }
    }
    ); 
  });


  /* 
  ESTE JAVASCRIPT ES PARA LA VALIDACIÓN DE  INPUTS EN LA VISTA DE CREAR MATRÍCULA
  */
  /// JAVASCRIPT PARA COMPROBAR EL CÓDIGO DE MATRICULA
  $("#cod_matricula_matricula").keyup(function() {
 
    var palabras = this.value;
               

    $("#cod_matricula_matricula").append(palabras);
    $.get("../../../../ajaxvalidarmatricula/"+palabras+"",function(response,grado){
        console.log(response);
        /*$("#cod_sección_matricula_edit").empty();
        $("#cod_sección_matricula_edit").append('<option value="" disabled="true" selected>--Selecciona--</option>');
           */
         if(response == ""){
            $("#error").hide();
            $('#btncrearmatr').attr("disabled", false);
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
            $("#error").text('Ya existe una matrícula con ese código');
           
            $('#btncrearmatr').attr("disabled", true);
         }
        /*for(i=0;i<response.length;i++){
          //  $("#cod_sección_matricula_edit").append("<span id="error" class="help-block"></span>")
            console.log(response[i].cod_sección);
        }*/
    })
});

/// JAVASCRIPT PARA COMPROBAR EL CÓDIGO DE ALUMNO
$("#cod_alumno_mat_crear").keyup(function() {
 
    var palabras = this.value;
               
console.log(palabras);
    //$("#cod_alumno_mat_crear").append(palabras);
    $.get("../../../../ajaxvalidaralumno/"+palabras+"",function(response,palabras){
        console.log(response);
       /* $("#cod_sección_matricula_edit").empty();
        $("#cod_sección_matricula_edit").append('<option value="" disabled="true" selected>--Selecciona--</option>');
           */
         if(response == ""){
              // $("#error").empty();
           $("#error_alumno").show();
           $('#error_alumno').removeClass("alert-success").addClass('alert alert-danger');
           $("#error_alumno").text('El DNI aún no está registrado en nuestra BBDD');
          
           $('#btncrearmatr').attr("disabled", true);
           
           /* console.log("no coincide");
           
            $('#error').removeClass("alert-warning").addClass('alert-success');
            $("#error").text('Código Válido');
            $("#error").empty();*/
           // $("#btncrearmatr").disable();
         }  
         else{
            $("#error_alumno").hide();
            $('#btncrearmatr').attr("disabled", false);
         }
        /*for(i=0;i<response.length;i++){
          //  $("#cod_sección_matricula_edit").append("<span id="error" class="help-block"></span>")
            console.log(response[i].cod_sección);
        }*/
    })
});
// variable global del editar 

/*var primervalor = $("#cod_matricula_matricula_editar").val();
console.log(primervalor);*/
 /// JAVASCRIPT PARA COMPROBAR EL CÓDIGO DE MATRICULA en el editar
 $("#cod_matricula_matricula_editar").keyup(function() {
 
    var palabras = this.value;
               

   // $("#cod_matricula_matricula").append(palabras);
    $.get("../../../../../ajaxvalidarmatricula/"+palabras+"",function(response,grado){
       console.log(response);
       /*  $("#cod_sección_matricula_edit").empty();
        $("#cod_sección_matricula_edit").append('<option value="" disabled="true" selected>--Selecciona--</option>');
           */
         if(response == ""){
            $("#error").hide();
            $('#btncrearmatr').attr("disabled", false);
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
            $("#error").text('Ya existe una matrícula con ese código');
           
            $('#btncrearmatr').attr("disabled", true);
         }
        /*for(i=0;i<response.length;i++){
          //  $("#cod_sección_matricula_edit").append("<span id="error" class="help-block"></span>")
            console.log(response[i].cod_sección);
        }*/
    })
});

/// JAVASCRIPT PARA COMPROBAR EL CÓDIGO DE ALUMNO en el editar
$("#cod_alumno_mat_editar").keyup(function() {
 
    var palabras = this.value;
               

    //$("#cod_alumno_mat_crear").append(palabras);
    $.get("../../../../../ajaxvalidaralumno/"+palabras+"",function(response,palabras){
        console.log(response);
       /* $("#cod_sección_matricula_edit").empty();
        $("#cod_sección_matricula_edit").append('<option value="" disabled="true" selected>--Selecciona--</option>');
           */
         if(response == ""){
              // $("#error").empty();
           $("#error_alumno").show();
           $('#error_alumno').removeClass("alert-success").addClass('alert alert-danger');
           $("#error_alumno").text('Código de alumno inválido');
          
           $('#btncrearmatr').attr("disabled", true);
           
           /* console.log("no coincide");
           
            $('#error').removeClass("alert-warning").addClass('alert-success');
            $("#error").text('Código Válido');
            $("#error").empty();*/
           // $("#btncrearmatr").disable();
         }  
         else{
            $("#error_alumno").hide();
            $('#btncrearmatr').attr("disabled", false);
         }
        /*for(i=0;i<response.length;i++){
          //  $("#cod_sección_matricula_edit").append("<span id="error" class="help-block"></span>")
            console.log(response[i].cod_sección);
        }*/
    })
});


/*
// codigo de matrícula
$(document).ready(function() {
  $.get("../../../../ajaxmatricula/",function(response){
      console.log(response);
      var numeromax = 0;
      if(response == null){
          numeromax=0;
      }
      else{
          
          for(i=0;i<response.length;i++){
              var anescolar = response[i].cod_matricula;
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
      $("#cod_matricula_matricula").val(idmatri.padStart(8,"0"))
  })

});*/