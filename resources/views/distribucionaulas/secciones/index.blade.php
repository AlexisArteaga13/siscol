@extends('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Lista de Secciones </h3>
        <div class="row">
            <div class="col-xs-2">
                <a>{{Form::Open(array('action'=> array('SeccionController@create',$codigocolegio,$codnivel,$codgrado),'method'=>'POST'))}}
                    {{ csrf_field() }}

                    <button class="btn btn-success">Nuevo +</button>{{Form::close()}}</a>
            </div>
            <div class="col-xs-1">
                <a>{{Form::Open(array('action'=> array('GradoController@index',$codnivel,$codigocolegio),'method'=>'POST'))}}
                    {{ csrf_field() }}

                    <button class="btn btn-info">LISTADO DE GRADOS</button>{{Form::close()}}</a>
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
                    <th>Nombre de Sección</th>
                    <th>Grado</th>
                    <th>Nivel</th>
                    <th>Colegio</th>
                    <th>Fecha de Actualización:</th>
                    <th>Fecha de Creación</th>
                    <th>Opciones</th>

                    <th></th>
                </thead>
                @foreach ($seccion as $gra)
                <tr>
                    <td>{{ $gra -> cod_sección}}</td>
                    <td>{{ $gra -> nombre_seccion}}</td>
                    <td>{{ $gra -> nombre_grado}}</td>
                    <td>{{ $gra -> nombre_nivel}}</td>
                    <td>{{ $gra -> Nombre_colegio}}</td>
                    <td>{{ $gra -> updated_at}}</td>
                    <td>{{ $gra -> created_at}}</td>

                    <td>


                        {{Form::Open(array('action'=> array('SeccionController@edit','id' =>$gra->cod_sección,'cod_col'=>$codigocolegio),'method'=>'POST'))}}
                        {{ csrf_field() }}
                        <button class="btn btn-info">Editar</button></a> {{Form::close()}}
                    </td>
                    <td><a href="" data-target="#modal-delete-{{$gra -> cod_sección}}" data-toggle="modal"><button
                                class="btn btn-danger">Eliminar</button></a>

                    </td>

                </tr>

                @include ('distribucionaulas.secciones.modal')
                @endforeach
            </table>
        </div>
        {{$seccion -> render()}}
    </div>
</div>
@endsection