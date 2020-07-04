@extends('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-xs-12 col-sm-6">
        <h3>Nuevo Colegio:</h3>
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors -> all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {!!Form :: open(array('url' => 'colegio/instituciones','method'=>'POST','autocomplete'=>'off'))!!}
        {{Form :: token()}}
        <div class="form-group">
            <label for="cod_colegio">Código del Colegio:</label>
            <input type="text" name="cod_colegio" required class="form-control" placeholder="Código ...">
        </div>
        <div class="form-group">
            <label for="Nombre_colegio">Nombre del Colegio</label>
            <input type="text" name="Nombre_colegio" required class="form-control" placeholder="Nombre ...">
        </div>
        <div class="form-group">
            <label for="Dirección">	Dirección</label>
            <input type="text" name="Dirección" required class="form-control" placeholder="Dirección ...">
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <button class="btn btn-danger" onClick="history.go(-1);" type="reset">Atrás</button>

        </div>
        {!! Form::close()!!}
    </div>
</div>
@endsection