@extends('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-xs-12 col-sm-6">
        <h3>Nuevo Nivel Escolar:</h3>
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
{!!Form :: open(array('url' => 'colegio/niveleducativo','method'=>'POST','autocomplete'=>'on'))!!}
{{Form :: token()}}
<div class="row">
    <!--<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
           !-->
            <input id="cod_nivel_crear" type="hidden" onkeyUp="return ValNumero(this);" name="cod_nivel" maxlength="10" class="form-control"
                placeholder="Código ...">
                <span id="error" class="help-block"></span>
      <!--  </div>
    </div> !-->
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
            <label>Colegio al que pertenece</label>
            <select name="cod_colegio" class="form-control" required >
                @foreach ($colegio as $cat)
                <option value= "{{$cat -> cod_colegio}}" >{{$cat -> Nombre_colegio}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
            <label for="nombre_nivel">Nombre</label>
            <input type="text" name="nombre_nivel" required value="{{old('nombre_nivel')}}" class="form-control"
                placeholder="Nombre del producto ...">
        </div>
    </div></div>
    
<!--<div class="form-group">
    <label for="codigo">Código</label>
    <input type="text" name="codigoproducto" class="form-control" placeholder="Código ...">
</div>
<div class="form-group">
    <label for="nombre">Nombre de Producto</label>
    <input type="text" name="nombrecategoria" class="form-control" placeholder="Nombre ...">
</div> !-->
<div class="form-group">
    <button id="btncrearnivel" class="btn btn-primary" type="submit">Guardar</button>
    <button class="btn btn-danger" onClick="history.go(-1);" type="reset">Atrás</button>

</div>
<script language="javascript" type="text/javascript">

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