@extends('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Lista de Matrículas:  <a>{{Form::Open(array('action'=> array('MatriculaController@create',$codigocolegio),'method'=>'get'))}}
                         {{ csrf_field() }}
                         
                         <br> <button class="btn btn-success">Nueva Matrícula +</button>{{Form::close()}}</a></h3>
   <br>
    </div>
</div>
@if(session()->has('matriculado'))
        <div class="alert alert-warning">{{ session('matriculado')}}</div>
        @endif
        @if(session()->has('success'))
        <div class="alert alert-success">{{ session('success')}}</div>
        @endif
<div class="row">
    <div class="col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                     <th>Código de Matrícula</th>
                     <th>Alumno Matriculado</th>
                    <th>Año Escolar</th>
                    <th>Detalles</th>
                    <th>Sección De Estudio</th>
                    <th>Grado De Estudio</th>
                    <th>Nivel De Estudio</th>  
                    <th>Colegio</th>
                    <th>Fecha de Cambio</th>
                    <th>Fecha de Creación</th>
                    <th>Opciones</th>
                    <th></th>
                </thead>
                @foreach ($matricula as $cat)
                <tr>
                    <td>{{ $cat -> cod_matricula}}</td>
                    <td>{{ $cat -> NombreAlumno}} {{ $cat ->ApellidoAlumno}}</td>
                    <td>{{ $cat ->nombre_añoescolar}}</td>
                    <td>{{ $cat ->detalles_matricula}}</td>
                    <td>{{ $cat ->nombre_seccion}}</td>
                    <td>{{ $cat ->nombre_grado}}</td>
                    <td>{{ $cat ->nombre_nivel}}</td>
                   
                    <td>{{ $cat ->Nombre_colegio}}</td>
                    <td>{{ $cat -> updated_at}}</td>
                    <td>{{ $cat -> created_at}}</td>
                    <td>
                    {{Form::Open(array('action'=> array('MatriculaController@edit','id' =>$cat->cod_matricula,'cod_col'=>$codigocolegio),'method'=>'POST'))}}
                         {{ csrf_field() }}
                       <button
                                class="btn btn-info">Editar</button></a> {{Form::close()}}
                    </td>

                    <td><a href="" data-target="#modal-delete-{{$cat->cod_matricula}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                    
                </td>

                </tr>
                @include ('distribucionacademica.matriculas.modal')
                @endforeach
            </table>
        </div>
    
    </div>
</div>
@endsection