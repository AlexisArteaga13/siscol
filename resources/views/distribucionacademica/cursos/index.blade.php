@extends('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Lista de Cursos:</h3>
            <div class="row">
                <div class="col-xs-2">
                    <a>{{Form::Open(array('action'=> array('CursoController@create',$codigocolegio,$codgrado,$codnivel),'method'=>'POST'))}}
                        {{ csrf_field() }}

                        <button class="btn btn-success">Nuevo Curso +</button>{{Form::close()}}</a>
    </div>
<div class="col-xs-1">
<a>{{Form::Open(array('action'=> array('GradoController@index',$codnivel,$codigocolegio),'method'=>'POST'))}}
                        {{ csrf_field() }}

                        <button class="btn btn-info">VER LISTADO DE GRADOS</button>{{Form::close()}}</a>
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
                    <th>Código</th>
                    <th>Nombre Curso</th>
                    <th>Descripción</th>
                    <th>Código nivel</th>
                    <th>Nivel De Estudio</th>
                    <th>Código Grado</th>
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
                    <td>{{ $cat ->NombreCurso}}</td>
                    <td>{{ $cat ->descripcionCurso}}</td>
                    <td>{{ $cat ->cod_nivel}}</td>
                    <td>{{ $cat ->nombre_nivel}}</td>
                    <td>{{ $cat ->cod_grado}}</td>
                    <td>{{ $cat ->nombre_grado}}</td>
                    <td>{{ $cat ->Nombre_colegio}}</td>
                    <td>{{ $cat -> updated_at}}</td>
                    <td>{{ $cat -> created_at}}</td>

                    <td>
                        {{Form::Open(array('action'=> array('DetalleCursoController@index',$cat->CodCurso,'docente' =>'null',$codigocolegio,$cat->cod_grado,$cat->cod_nivel),'method'=>'POST'))}}
                        {{ csrf_field() }}
                        <button class="btn btn-soundcloud">Ver Asignaciones</button></a> {{Form::close()}}
                    </td>
                    <td>
                        {{Form::Open(array('action'=> array('CursoController@edit','id' =>$cat->CodCurso,'cod_col'=>$codigocolegio),'method'=>'POST'))}}
                        {{ csrf_field() }}
                        <button class="btn btn-info">Editar</button></a> {{Form::close()}}
                    </td>

                    <td><a href="" data-target="#modal-delete-{{$cat -> CodCurso,$cat->nombre_nivel}}" data-toggle="modal"><button
                                class="btn btn-danger">Eliminar</button></a>

                    </td>

                </tr>
                @include ('distribucionacademica.cursos.modal')
                @endforeach
            </table>
        </div>

    </div>
</div>
@endsection