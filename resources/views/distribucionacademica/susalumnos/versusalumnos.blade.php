@extends('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Lista de Alumnos: </h3>
        <div class="row">
            <div class="col-xs-4">
                {{Form::Open(array('action'=> array('VerAlumnosController@nuevoalumnodecurso','id' =>$detalle,$seccion),'method'=>'POST'))}}
                {{ csrf_field() }}
                <button class="btn btn-success">Nuevo Alumno en el curso +</button></a> {{Form::close()}}
            </div>
            <div class="col-xs-1">
                {{Form::Open(array('action'=> array('DetalleCursoController@index',$codcurso,'null','null','null',$seccion),'method'=>'POST'))}}
                {{ csrf_field() }}
                <button class="btn btn-info">LISTADO DE ENCARGOS</button></a> {{Form::close()}}
            </div>
        </div>
    </div>
</div>
<br>
@if(session()->has('msj'))
        <div class="alert alert-warning">{{ session('msj')}}</div>
        @endif
        @if(session()->has('success'))
        <div class="alert alert-success">{{ session('success')}}</div>
        @endif 
        @if(session()->has('msjdelete'))
        <div class="alert alert-success">{{ session('msjdelete')}}</div>
        @endif   
        @if(session()->has('msjexistencia'))
        <div class="alert alert-warning">{{ session('msjexistencia')}}</div>
        @endif   
<div class="row">
    <div class="col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Código Curso</th>
                    <th>Cod. Matrícula</th>
                    <th>Código Alumno</th>
                    <th>Apellidos </th>
                    <th>Nombres</th>
                    <th>Sección</th>
                    <th>Año Escolar</th>
                    <th>Nota 1er Bim.</th>
                    <th>Nota 2do Bim.</th>
                    <th>Nota 3er Bim.</th>
                    <th>Nota 4er Bim.</th>
                    <th>Prom. Final</th>
                    <th>Creado el:</th>
                    <th>Actualizado el:</th>


                </thead>

                @foreach ($alumnos as $gra)
                <tr>
                    <td>{{ $gra -> CodCurso}}</td>
                    <td>{{ $gra -> cod_matricula}}</td>
                    <td>{{ $gra -> CodAlumno}}</td>
                    <td>{{ $gra -> ApellidoAlumno}}</td>
                    <td>{{ $gra -> NombreAlumno}}</td>
                    <td>{{ $gra -> nombre_seccion}}</td>
                    <td>{{ $gra -> nombre_añoescolar}}</td>
                    <td>{{ $gra -> NotaPrimBim}}</td>
                    <td>{{ $gra -> NotaSegunBim}}</td>
                    <td>{{ $gra -> NotaTercerBim}}</td>
                    <td>{{ $gra -> NotaCuartoBim}}</td>
                    <td>{{ $gra -> NotaFinal}}</td>
                    <td>{{ $gra -> created_at}}</td>
                    <td>{{ $gra -> updated_at}}</td>

                    <td><a href="" data-target="#modal-delete-{{$gra->idnota}}" data-toggle="modal"><button
                                class="btn btn-danger">Eliminar</button></a>

                    </td>


                    @include ('distribucionacademica.susalumnos.modal')
                </tr>
                @endforeach
            </table>
        </div>

    </div>
</div>
@endsection