
  /// PARA LA ASIGNACIÓN DE CURSOS
  $('#colegio_asignacion').change(function(event){
    
    var colegio = this.value;
     console.log(location.href);
	
    console.log(event.target.value);
    $.get("../../../../../../../../../ajaxgrados/"+colegio+"",function(response,colegio){
        console.log(response);
        $("#cod_nivel_asignacion").empty();
        $("#cod_nivel_asignacion").append('<option value="" disabled="true" selected>--Selecciona--</option>');
         
        for(i=0;i<response.length;i++){
            $("#cod_nivel_asignacion").append("<option value="+response[i].cod_nivel+">"+response[i].nombre_nivel+"</option>")
            console.log(response[i].cod_nivel)
        }
    });
  });
  $('#cod_nivel_asignacion').change(function(event){
   
    var nivel = this.value;
     console.log(location.href);
    console.log(event.target.value);
    $.get("../../../../../../../../../ajaxseccion/"+nivel+"",function(response,colegio){
        console.log(response);
        $("#cod_grado_asignacion").empty();
        $("#cod_grado_asignacion").append('<option value="" disabled="true" selected>--Selecciona--</option>');
           
           
        for(i=0;i<response.length;i++){
            $("#cod_grado_asignacion").append("<option value="+response[i].cod_grado+">"+response[i].nombre_grado+"</option>")
           
        
        }
    }
    ); 
  });
  /// JS de Listado de curso para asignar 
  $('#cod_grado_asignacion').change(function(event){
   
    var grado = this.value;
     console.log(location.href);
    console.log(event.target.value);
    $.get("../../../../../../../../../ajaxcurso/"+grado+"",function(response,grado){
        console.log(response);
        $("#CodCurso_asignacion").empty();
        $("#CodCurso_asignacion").append('<option value="" disabled="true" selected>--Selecciona--</option>');
           
           
        for(i=0;i<response.length;i++){
            $("#CodCurso_asignacion").append("<option value="+response[i].CodCurso+">"+response[i].NombreCurso+"</option>")
           
        
        }
    }
    ); 
    // obtener el valor de las secciones
    $.get("../../../../../../../../../ajaxobtnseccion/"+grado+"",function(response,grado){
      console.log(response);
      $("#cod_seccion_asignacion").empty();
      $("#cod_seccion_asignacion").append('<option value="" disabled="true" selected>--Selecciona--</option>');
         
         
      for(i=0;i<response.length;i++){
          $("#cod_seccion_asignacion").append("<option value="+response[i].cod_sección+">"+response[i].nombre_seccion+"</option>")
         
      
      }
  }
  ); 
  });
  /// ASIGNACION DE CURSOS LISTADOS PARA EL EDITAR 
  $('#colegio_asignacion_edit').change(function(event){
    
    var colegio = this.value;
     console.log(location.href);
	
    console.log(event.target.value);
    $.get("../../../../../ajaxgrados/"+colegio+"",function(response,colegio){
        console.log(response);
        $("#cod_nivel_asignacion_edit").empty();
        $("#cod_nivel_asignacion_edit").append('<option value="" disabled="true" selected>--Selecciona--</option>');
         
        for(i=0;i<response.length;i++){
            $("#cod_nivel_asignacion_edit").append("<option value="+response[i].cod_nivel+">"+response[i].nombre_nivel+"</option>")
            console.log(response[i].cod_nivel)
        }
    });
  });
  $('#cod_nivel_asignacion_edit').change(function(event){
   
    var nivel = this.value;
     console.log(location.href);
    console.log(event.target.value);
    $.get("../../../../../ajaxseccion/"+nivel+"",function(response,colegio){
        console.log(response);
        $("#CodCurso_asignacion_edit").empty();
        $("#cod_grado_asignacion_edit").empty();
        $("#cod_grado_asignacion_edit").append('<option value="" disabled="true" selected>--Selecciona--</option>');
        $("#CodCurso_asignacion_edit").append('<option value="" disabled="true" selected>--Selecciona--</option>');
          
           
        for(i=0;i<response.length;i++){
            $("#cod_grado_asignacion_edit").append("<option value="+response[i].cod_grado+">"+response[i].nombre_grado+"</option>")
           
        
        }
    }
    ); 
  });
  /// JS de Listado de curso para asignar 
  $('#cod_grado_asignacion_edit').change(function(event){
   
    var grado = this.value;
     console.log(location.href);
    console.log(event.target.value);
    $.get("../../../../../ajaxcurso/"+grado+"",function(response,grado){
        console.log(response);
        $("#CodCurso_asignacion_edit").empty();
        $("#CodCurso_asignacion_edit").append('<option value="" disabled="true" selected>--Selecciona--</option>');
           
           
        for(i=0;i<response.length;i++){
            $("#CodCurso_asignacion_edit").append("<option value="+response[i].CodCurso+">"+response[i].NombreCurso+"</option>")
           
        
        }
    }
    ); 
  });
  /// JS de Listado de secciones para asignar 
  $('#cod_grado_asignacion_edit').change(function(event){
   
    var grado = this.value;
     console.log(location.href);
    console.log(event.target.value);
    $.get("../../../../../ajaxobtnseccion/"+grado+"",function(response,grado){
        console.log(response);
        $("#cod_seccion_asignacion_edit").empty();
        $("#cod_seccion_asignacion_edit").append('<option value="" disabled="true" selected>--Selecciona--</option>');
           
           
        for(i=0;i<response.length;i++){
            $("#cod_seccion_asignacion_edit").append("<option value="+response[i].cod_sección+">"+response[i].nombre_seccion+"</option>")
           
        
        }
    }
    ); 
  });