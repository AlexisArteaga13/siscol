@extends('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Lista de Encargos de Cursos:</h3>
        <div class="row">
            <div class="col-xs-3">
                <a>{{Form::Open(array('action'=> array('DetalleCursoController@create',$codigocolegio,$codgrado,$codnivel,$codcurso),'method'=>'POST'))}}
                    {{ csrf_field() }}

                    <br> <button class="btn btn-success">Nuevo Encargo de Curso +</button>{{Form::close()}}</a>
            </div>
            <div class="col-xs-1">
                <a>{{Form::Open(array('action'=> array('CursoController@index',$codgrado,$codigocolegio,$codnivel),'method'=>'POST'))}}
                    {{ csrf_field() }}

                    <br> <button class="btn btn-info">LISTAR CURSOS</button>{{Form::close()}}</a>
            </div>
        </div>
    </div>
</div>

<br>

<div class="row">
    <div class="col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Código del Curso</th>
                    <th>Nombre del Curso</th>
                    <th>Profesor Responsable</th>
                    <th>Seccion De Estudio</th>
                    <th>Nivel De Estudio</th>
                    <th>Grado De Estudio</th>
                    <th>Colegio</th>
                    <th>Fecha de Cambio</th>
                    <th>Fecha de Creación</th>
                    <th>Opciones</th>
                    <th></th>
                </thead>
                @foreach ($curso as $cat)
                <tr>
                    <td>{{ $cat -> CodCurso}}</td>
                    <td>{{ $cat -> NombreCurso}}</td>
                    <td>{{ $cat ->NombreDocente}} {{ $cat ->ApellidosDocente}}</td>
                    <td>{{ $cat ->nombre_seccion}}</td>
                    <td>{{ $cat ->nombre_nivel}}</td>
                    <td>{{ $cat ->nombre_grado}}</td>
                    <td>{{ $cat ->Nombre_colegio}}</td>
                    <td>{{ $cat -> updated_at}}</td>
                    <td>{{ $cat -> created_at}}</td>
                    <td>
                        {{Form::Open(array('action'=> array('VerAlumnosController@versusalumnos','id' =>$cat->id_detalle,$cat -> CodCurso,$cat ->NombreDocente,$cat->cod_sección),'method'=>'GET'))}}
                        {{ csrf_field() }}
                        <button class="btn btn-dropbox">Lista de Alumnos</button></a> {{Form::close()}}
                    </td>
                    <td>
                        {{Form::Open(array('action'=> array('DetalleCursoController@edit','id' =>$cat->id_detalle,'cod_col'=>$codigocolegio),'method'=>'POST'))}}
                        {{ csrf_field() }}
                        <button class="btn btn-info">Editar</button></a> {{Form::close()}}
                    </td>

                    <td><a href="" data-target="#modal-delete-{{$cat->id_detalle}}" data-toggle="modal"><button
                                class="btn btn-danger">Eliminar</button></a>

                    </td>

                </tr>
                @include ('distribucionacademica.detallecursos.modal')
                @endforeach
            </table>
        </div>

    </div>
</div>
@endsection