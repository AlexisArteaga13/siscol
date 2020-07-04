@extends('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-xs-12 col-sm-6">
        <h3>Editar Año Escolar: {{$codigo}}</h3>
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors -> all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {!!Form :: model($anescolar, ['method'=>'PATCH','route'=>['anescolar.update',$codigo]])!!}
        {{Form :: token()}}
        <div class="form-group">
            
            <input type="hidden" name="cod_AñoEscolar"  class="form-control" value="{{$codigo}}"  placeholder="Código ...">
        </div>

        <div class="form-group">
            <label for="nombre_añoescolar">Nombre de Año</label>
            <input type="text" name="nombre_añoescolar" required class="form-control" value="{{$anescolar -> nombre_añoescolar}}" placeholder="Nombre ...">
        </div>
        <div class="form-group">
            <label for="descripción_añoescolar">Dirección</label>
            <input type="text" name="descripción_añoescolar"  class="form-control" value="{{$anescolar -> descripción_añoescolar}}" placeholder="Dirección ...">
        </div>
        <div class="form-group">
            <label for="cambiodeestado">Situación del año:</label>
            <select name="situacion">
            <option value="1" >En curso</option>
            <option value="0" >Ya cursado</option>
            </select>
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <button class="btn btn-danger" onClick="history.go(-1);" type="reset">Atrás</button>

        </div>
        {!! Form::close()!!}
    </div>
</div>
@endsection