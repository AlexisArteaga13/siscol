@extends('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-xs-12 col-sm-6">
        <h3>Editar Colegio: {{ $colegio -> Nombre_colegio}}</h3>
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors -> all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {!!Form :: model($colegio, ['method'=>'PATCH','route'=>['instituciones.update',$codigo]])!!}
        {{Form :: token()}}
        <div class="form-group">
           
            <input type="hidden" name="cod_colegio"  class="form-control" value="{{$codigo}}"  placeholder="Código ...">
        </div>
        <div class="form-group">
            <label for="Nombre_colegio">Nombre de Colegio</label>
            <input type="text" name="Nombre_colegio" required class="form-control" value="{{$colegio -> Nombre_colegio}}" placeholder="Nombre ...">
        </div>
        <div class="form-group">
            <label for="Dirección">Dirección</label>
            <input type="text" name="Dirección" required class="form-control" value="{{$colegio ->Dirección}}" placeholder="Dirección ...">
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <button class="btn btn-danger" onClick="history.go(-1);" type="reset">Atrás</button>

        </div>
        {!! Form::close()!!}
    </div>
</div>
@endsection