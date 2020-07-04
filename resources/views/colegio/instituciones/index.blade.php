@extends('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Lista de Colegios <a href="instituciones/create"><button class="btn btn-success">Nuevo +</button></a></h3>
        @include('colegio.instituciones.search')
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Fecha de Cambio</th>
                    <th>Fecha de Creación</th>
                    <th>Opciones</th>
                    <th></th>
                </thead>
                @foreach ($colegio as $cat)
                <tr>
                    <td>{{ $cat -> cod_colegio}}</td>
                    <td>{{ $cat -> Nombre_colegio}}</td>
                    <td>{{ $cat -> Dirección}}</td>
                    <td>{{ $cat -> updated_at}}</td>
                    <td>{{ $cat -> created_at}}</td>
                    <td>
                         {{Form::Open(array('action'=> array('NivelController@index','tipodebusqueda'=> 'null','busqueda'=>'null',$cat->cod_colegio),'method'=>'POST'))}}
                         {{ csrf_field() }}
                         <button class="btn btn-microsoft">Ver Niveles</button></a>
                         {{Form::close()}}
                    </td>
                    <td>
                    
                        <a href="{{URL::action('ColegioController@edit', $cat->cod_colegio)}}"><button class="btn btn-info">Editar</button></a>
                    </td>

                    <td><a href="" data-target="#modal-delete-{{$cat->cod_colegio}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                    
                </td>

                </tr>
                @include ('colegio.instituciones.modal')
                @endforeach
            </table>
        </div>
        {{$colegio -> render()}}
    </div>
</div>
@endsection