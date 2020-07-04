@extends('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-xs-12 col-sm-6">
        <h3>Editar Docente: {{ $docente -> DNIDocente}}</h3>
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors -> all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {!!Form :: model($docente, ['method'=>'PATCH','route'=>['docentes.update',$codigo]])!!}
        {{Form :: token()}}
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
            <label for="DNIDocente">D.N.I.:</label>
            <input type="text" name="DNIDocente" required class="form-control" value="{{$codigo}}" placeholder="Código ...">
        </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
            <label for="NombreDocente">Nombres </label>
            <input type="text" name="NombreDocente" required  value="{{$docente->NombreDocente}}" class="form-control" placeholder="Nombre ...">
        </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
            <label for="ApellidosDocente">Apellidos </label>
            <input type="text" name="ApellidosDocente" required  value="{{$docente->ApellidosDocente}}" class="form-control" placeholder="Apellidos ...">
        </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
            <label for="Especialidad">Especialidad</label>
            <input type="text" name="Especialidad" required  value="{{$docente->Especialidad}}" class="form-control" placeholder="Especialidad ...">
        </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
            <label for="CorreoDocente">Correo</label>
            <input type="text" name="CorreoDocente" value="{{$docente->CorreoDocente}}" class="form-control" placeholder="Correo ...">
        </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
            <label for="TelefonoDocente">Teléfono</label>
            <input type="text" name="TelefonoDocente" value="{{$docente->TelefonoDocente}}" class="form-control" placeholder="Telefono ...">
        </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
            <label for="DireccionDocente">	Dirección</label>
            <input type="text" name="DireccionDocente"  value="{{$docente->DireccionDocente}}"class="form-control" placeholder="Dirección ...">
        </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <button class="btn btn-danger" onClick="history.go(-1);" type="reset">Atrás</button>
            </div>
        </div>
        {!! Form::close()!!}
    </div>
</div>
@endsection