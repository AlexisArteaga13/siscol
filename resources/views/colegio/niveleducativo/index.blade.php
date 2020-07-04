@extends('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Lista de Niveles </h3>
        <div class="row ">
            <div class="col-xs-2">
                <a>{{Form::Open(array('action'=> array('NivelController@create',$codigocolegio),'method'=>'POST'))}}
                    {{ csrf_field() }}

                    <button class="btn btn-success">Nuevo +</button>{{Form::close()}}</a>
            </div>
            @if(Auth::user()->TIPOUSU == 'superadmin'){
            <div class="col-xs-1">
            <a>{{Form::Open(array('action'=> array('ColegioController@index'),'method'=>'GET'))}}
                {{ csrf_field() }}

                <button class="btn btn-info">VER LISTA DE COLEGIOS</button>{{Form::close()}}</a>
             @endif
                </div>
        </div>
        <br>
    </div>
</div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Código</th>
                    <th>Colegio</th>
                    <th>Nombre</th>
                    <th>Fecha de Actualización</th>
                    <th>Fecha de Creación</th>
                    <th></th>
                    <th>Opciones</th>

                    <th></th>
                </thead>
                @foreach ($nivel as $prod)
                <tr>
                    <td>{{ $prod -> cod_nivel}}</td>
                    <td>{{ $prod -> Nombre_colegio}}</td>
                    <td>{{ $prod -> nombre_nivel}}</td>
                    <td>{{ $prod -> updated_at}}</td>
                    <td>{{ $prod -> created_at}}</td>
                    <td>
                        {!! Form::open(['route' => ['grado.index',$prod->cod_nivel, $codigocolegio],
                        'method' => 'POST']) !!}
                        <button class="btn btn-sm btn-vk">
                            Ver Grados
                        </button>
                        {!! Form::close() !!}
                    </td>
                    <td>


                        {{Form::Open(array('action'=> array('NivelController@edit','id' =>$prod->cod_nivel,'cod_col'=>$codigocolegio),'method'=>'POST'))}}
                        {{ csrf_field() }}
                        <button class="btn btn-info">Editar</button></a> {{Form::close()}}
                    </td>
                    <td><a href="" data-target="#modal-delete-{{$prod->cod_nivel}}" data-toggle="modal"><button
                                class="btn btn-danger">Eliminar</button></a>

                    </td>

                </tr>

                @include ('colegio.niveleducativo.modal')
                @endforeach
            </table>
        </div>
        {{$nivel -> render()}}
    </div>
</div>
@endsection