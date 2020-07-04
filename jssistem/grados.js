$('#colegio').change(function(event){
    
    var colegio = this.value;
     console.log(location.href);
    var datos = new FormData();
	datos.append("colegio", colegio);
    console.log(event.target.value);
    $.get("ajaxgrados/"+colegio+"",function(response,colegio){
        console.log(response);
        
    });
  });