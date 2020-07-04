@extends('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Lista de Grados </h3>
        <div class="row">
            <div class="col-xs-2">
                <a>{{Form::Open(array('action'=> array('GradoController@crear',$codigocolegio,$codnivel),'method'=>'POST'))}}
                    {{ csrf_field() }}

                    <button class="btn btn-success">Nuevo Grado +</button>{{Form::close()}}</a>
            </div>
            <div class="col-xs-2">
                <a>{{Form::Open(array('action'=> array('NivelController@index','null','null',$codigocolegio),'method'=>'POST'))}}
                    {{ csrf_field() }}

                    <button class="btn btn-info">LISTADO DE NIVELES</button>{{Form::close()}}</a>
            </div>
        </div>


        <br>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Código</th>
                    <th>Nombre de Grado</th>
                    <th>Descripción</th>
                    <th>Nivel</th>
                    <th>Colegio</th>
                    <th>Fecha de Actualización:</th>
                    <th>Fecha de Creación</th>
                    <th>Opciones</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </thead>
                @foreach ($grados as $gra)
                <tr>
                    <td>{{ $gra -> cod_grado}}</td>
                    <td>{{ $gra -> nombre_grado}}</td>
                    <td>{{ $gra -> descripción_grado}}</td>
                    <td>{{ $gra -> nombre_nivel}}</td>
                    <td>{{ $gra -> Nombre_colegio}}</td>
                    <td>{{ $gra -> updated_at}}</td>
                    <td>{{ $gra -> created_at}}</td>
                    <td>
                        {!! Form::open(['route' => ['cursos.index',$gra->cod_grado,$codigocolegio,$gra -> nombre_nivel],
                        'method' => 'POST']) !!}
                        <button class="btn btn-pinterest">
                            Ver Cursos
                        </button>
                        {!! Form::close() !!}
                    </td>
                    <td>
                        {!! Form::open(['route' => ['secciones.index',$gra->cod_grado, $codigocolegio,$gra ->
                        nombre_nivel],
                        'method' => 'POST']) !!}
                        <button class="btn btn-vk">
                            Ver Secciones
                        </button>
                        {!! Form::close() !!}
                    </td>
                    <td>


                        {{Form::Open(array('action'=> array('GradoController@edit','id' =>$gra->cod_grado,'cod_col'=>$codigocolegio),'method'=>'POST'))}}
                        {{ csrf_field() }}
                        <button class="btn btn-info">Editar</button></a> {{Form::close()}}
                    </td>
                    <td><a href="" data-target="#modal-delete-{{$gra->cod_grado}}" data-toggle="modal"><button
                                class="btn btn-danger">Eliminar</button></a>

                    </td>

                </tr>

                @include ('distribucionaulas.grados.modal')
                @endforeach
            </table>
        </div>

    </div>
</div>
@endsection