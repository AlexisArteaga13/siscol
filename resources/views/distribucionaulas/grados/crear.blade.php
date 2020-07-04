@extends('layouts.admin')
@section ('contenido')
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<div class="row">
    <div class="col-xs-12 col-sm-6">
        <h3>Nuevo Grado Escolar:</h3>
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
{!!Form :: open(array('url' => 'distribucionaulas/grados','method'=>'POST','autocomplete'=>'on'))!!}
{{Form :: token()}}
<div class="row">
   <!-- <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
            <label for="cod_grado">Código</label>
            <input required id="cod_grado_crear" type="text" name="cod_grado" onkeyUp="return ValNumero(this);" maxlength="10" required value="{{old('cod_grado')}}" class="form-control"
                placeholder="Código ...">
                <span id="error" class="help-block"></span>
        </div>
    </div> !-->
    <input required id="cod_grado_crear" type="hidden" name="cod_grado" onkeyUp="return ValNumero(this);" maxlength="10"  value="{{old('cod_grado')}}" class="form-control"
                placeholder="Código ...">
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
            <label for="nombre_grado">Nombre</label>
            <input required type="text"   name="nombre_grado" required value="{{old('nombre_grado')}}" class="form-control"
                placeholder="Nombre ...">
        </div>
    </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
            <label for="descripción_grado">Descripción</label>
            <input required type="text" name="descripción_grado" maxlength="50" required value="{{old('descripción_grado')}}"
                class="form-control" placeholder="Código ...">
        </div>
    </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
            <label>Colegio al que pertenece</label>
            <select required id="colegio" name="cod_colegio" class="form-control dynamic"  data-dependent="colegio">
                @if($panivel==0)
                    <option value="" disabled ="true" selected>--Selecciona--</option>
                    @foreach ($colegio as $cat)
                    <option value="{{$cat -> cod_colegio}}">{{$cat -> Nombre_colegio}}</option>
                    @endforeach
                @endif
                @if($panivel == 1)
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

            <select required id="cod_nivel" name="cod_nivel" class="form-control">
            @if($panivel==0)
            <option disabled="true" selected>--Selecciona--</option>
            @endif
            @if($panivel == 1)
                @foreach ($nivel as $cat)
                <option value="{{$cat -> cod_nivel}}">{{$cat -> nombre_nivel}}</option>
                @endforeach
                @endif
          
            </select>
            
        </div> 
       
    </div>
</div>

<div class="form-group">
    <button id="btncreargrado" class="btn btn-primary" type="submit">Guardar</button>
    <button class="btn btn-danger" onClick="history.go(-1);" type="reset">Atrás</button>

</div>

<!--

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