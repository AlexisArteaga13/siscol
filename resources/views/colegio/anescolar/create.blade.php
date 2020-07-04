@extends('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-xs-12 col-sm-6">
        <h3>Nuevo Año Escolar:</h3>
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors -> all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {!!Form :: open(array('url' => 'colegio/anescolar','method'=>'POST','autocomplete'=>'off'))!!}
        {{Form :: token()}}
        <div class="form-group">
            
            <input type="hidden" name="cod_AñoEscolar" id="cod_AñoEscolar" class="form-control" placeholder="Código ...">
        </div>
        <div class="form-group">
            <label for="nombre_añoescolar">Nombre del Año</label>
            <input type="text" name="nombre_añoescolar" required class="form-control" placeholder="Nombre ...">
        </div>
        <div class="form-group">
            <label for="descripción_añoescolar">Descripción</label>
            <input type="text" name="descripción_añoescolar"  class="form-control" placeholder="Dirección ...">
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <button class="btn btn-danger" onClick="history.go(-1);" type="reset">Atrás</button>
            
        </div>
        {!! Form::close()!!}
    </div>
</div>
@endsection