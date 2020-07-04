@extends('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-xs-12 col-sm-6">
        <h3>Nuevo Alumno Del Curso:</h3>
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors -> all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <!--@if(session()->has('msj'))
        <div class="alert alert-danger">{{ session('msj')}}</div>
         @endif!-->
        {!!Form :: open(array('url' => 'distribucion/guardarnuevoalumno', 'method'=>'POST','autocomplete'=>'off'))!!}
        {{Form :: token()}}
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <!--<label for="CorreoAlumno">Cod. Asignación</label>!-->
                    <input type="hidden" name="id_detalle" value="{{$id_detalle}}" class="form-control btn-block"
                        placeholder="Código de Matrícula...">
                </div>
            </div>
        </div>
        <input type="hidden" name="seccion" value="{{$seccion}}" class="form-control btn-block"
            placeholder="Código de Matrícula...">
        
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="CorreoAlumno">Ingrese Código de Matrícula Del Alumno:</label>
                    <input id="cod_alumno_de_curso" type="text" name="cod_matricula" value="{{old('cod_matricula')}}"
                        class="form-control" placeholder="Código de Matrícula...">
                    <span id="error" class="help-block"></span>
                </div>
            </div>
        </div>



        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <button id="btnnuevoalumnocurso" class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" onClick="history.go(-1);" type="reset">Atrás</button>
            </div>
        </div>
        {!! Form::close()!!}
    </div>
</div>
@endsection