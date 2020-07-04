@extends('layouts.admin')
@section ('contenido')
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<div class="row">
    <div class="col-xs-12 col-sm-6">
        <h3>Nueva Sección:</h3>
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors -> all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>
{!!Form :: open(array('url' => 'distribucionaulas/secciones','method'=>'POST','autocomplete'=>'on'))!!}
{{Form :: token()}}
<div class="row">
    <!--<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
            <label for="cod_sección">Código</label>
            <input id="cod_seccion_crear" type="text" name="cod_sección" onkeyUp="return ValNumero(this);" maxlength="10" required value="{{old('cod_sección')}}" class="form-control"
                placeholder="Código ...">
                <span id="error" class="help-block"></span>
        </div>
    </div>!-->
    <input id="cod_seccion_crear" type="hidden" name="cod_sección" onkeyUp="return ValNumero(this);" maxlength="10"  value="{{old('cod_sección')}}" class="form-control"
                placeholder="Código ...">
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
            <label for="nombre_seccion">Nombre</label>
            <input type="text" name="nombre_seccion" required value="{{old('nombre_seccion')}}" class="form-control"
                placeholder="Nombre ...">
        </div>
    </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
            <label>Colegio al que pertenece</label>
            <select id="colegio_de_seccion" name="cod_colegio" required class="form-control dynamic"  data-dependent="colegio">
                @if($pseccion == 0)
                <option>--Selecciona--</option>
                @foreach ($colegio as $cat)
                <option value="{{$cat -> cod_colegio}}">{{$cat -> Nombre_colegio}}</option>
                @endforeach
                @endif
                @if($pseccion==1)
                @foreach ($colegio as $cat)
                <option value="{{$cat -> cod_colegio}}">{{$cat -> Nombre_colegio}}</option>
                @endforeach
                @endif
            </select>
        </div>
    </div>
    <br>

    <div id="nivel_educativo"  class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
      <div name="cod_nivel" class="form-group">
            <label>Nivel de Estudio:</label>

            <select id="cod_nivel_de_seccion" required name="cod_nivel" class="form-control">
              @if($pseccion == 0)  
             <option disabled="true" selected>--Selecciona--</option>
          @endif
          @if($pseccion == 1)
          @foreach ($nivel as $cat)
                <option value="{{$cat -> cod_nivel}}">{{$cat ->nombre_nivel}}</option>
                @endforeach
          
          @endif
            </select>
            
        </div> 
       
    </div>

    <div id="grado"  class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
      <div name="cod_grado" class="form-group">
            <label>Grado de Estudio:</label>

            <select id="cod_grado_de_seccion" required name="cod_grado" class="form-control dynamic" data-dependent="cod_grado">
            @if($pseccion == 0)  
             <option disabled="true" selected>--Selecciona--</option>
          @endif
          @if($pseccion == 1)
          @foreach ($grado as $cat)
                <option value="{{$cat -> cod_grado}}">{{$cat ->nombre_grado}}</option>
                @endforeach
          
          @endif
          
            </select>
            
        </div> 
       
    </div>
</div>

<div class="form-group">
    <button id="btncrearseccion" class="btn btn-primary" type="submit">Guardar</button>
    <button class="btn btn-danger" onClick="history.go(-1);" type="reset">Atrás</button>

</div>

<!--
<script type="text/javascript">
 $(document).ready(function(){
   
     recargarLista();
     $('#colegio').change(function(){
        console.log('aquiesta'),
        recargarLista();
		});
 })
</script>
<script type="text/javascript">
function recargarLista(){
  var colegio=$('#colegio').val();
 
    $.ajax({
        type:"POST",
        url:"selectdelistanivel.php",
        data:"colegio="+colegio,
        
        success:function(r){
            $('#cod_nivel').html(r);
        }
    });
    console.log("su codigo es: "+colegio);
}

</script>
!--><script language="javascript" type="text/javascript">

//*** Este Codigo permite Validar que sea un campo Numerico
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
//*** Fin del Codigo para Validar que sea un campo Numerico

</script>
{!! Form::close()!!}

@endsection