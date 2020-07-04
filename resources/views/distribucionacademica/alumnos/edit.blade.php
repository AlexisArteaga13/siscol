@extends('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-xs-12 col-sm-6">
        <h3>Editar Alumno: {{ $alumno -> NombreAlumno}}</h3>
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors -> all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {!!Form :: model($alumno, ['method'=>'PATCH','route'=>['alumnos.update',$codigo]])!!}
        {{Form :: token()}}
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="CodAlumno">D.N.I.:</label>
                    <input type="text" name="CodAlumno" class="form-control" value="{{$codigo}}"
                        placeholder="Código ...">
                </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="NombreAlumno">Nombres </label>
                    <input type="text" name="NombreAlumno" required value="{{$alumno -> NombreAlumno}}"
                        class="form-control" placeholder="Nombre ...">
                </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="ApellidoAlumno">Apellidos </label>
                    <input type="text" name="ApellidoAlumno" required value="{{$alumno -> ApellidoAlumno}}"
                        class="form-control" placeholder="Apellidos ...">
                </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="TelefonoHogarAlumno">Teléfono</label>
                    <input type="text" name="TelefonoHogarAlumno" required value="{{$alumno -> TelefonoHogarAlumno}}" class="form-control"
                        placeholder="Especialidad ...">
                </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="CorreoAlumno">Correo</label>
                    <input type="text" name="CorreoAlumno" value="{{$alumno -> CorreoAlumno}}" class="form-control"
                        placeholder="Correo ...">
                </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="DireccionAlumno">Dirección</label>
                    <input type="text" name="DireccionAlumno" value="{{$alumno -> DireccionAlumno}}" class="form-control"
                        placeholder="Telefono ...">
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