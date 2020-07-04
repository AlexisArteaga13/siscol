@extends('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-xs-12 col-sm-6">
        <h3>Nuevo Docente:</h3>
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors -> all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {!!Form :: open(array('url' => 'personaldocente/docentes','method'=>'POST','autocomplete'=>'off'))!!}
        {{Form :: token()}}
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="DNIDocente">D.N.I.:</label>
                    <input type="text" name="DNIDocente" required class="form-control" value="{{old('DNIDocente')}}"
                        placeholder="Código ...">
                </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="NombreDocente">Nombres </label>
                    <input type="text" name="NombreDocente" required value="{{old('NombreDocente')}}"
                        class="form-control" placeholder="Nombre ...">
                </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="ApellidosDocente">Apellidos </label>
                    <input type="text" name="ApellidosDocente" required value="{{old('ApellidosDocente')}}"
                        class="form-control" placeholder="Apellidos ...">
                </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="Especialidad">Especialidad</label>
                    <input type="text" name="Especialidad" required value="{{old('Especialidad')}}" class="form-control"
                        placeholder="Especialidad ...">
                </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="CorreoDocente">Correo</label>
                    <input type="text" name="CorreoDocente" value="{{old('CorreoDocente')}}" class="form-control"
                        placeholder="Correo ...">
                </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="TelefonoDocente">Teléfono</label>
                    <input type="text" name="TelefonoDocente" value="{{old('TelefonoDocente')}}" class="form-control"
                        placeholder="Telefono ...">
                </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="DireccionDocente"> Dirección</label>
                    <input type="text" name="DireccionDocente" value="{{old('DireccionDocente')}}" class="form-control"
                        placeholder="Dirección ...">
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