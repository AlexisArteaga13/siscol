@extends('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Lista de Años En Registro: <a href="anescolar/create"><button class="btn btn-success">Nuevo +</button></a></h3>
        @include('colegio.anescolar.search')
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Situación</th>
                    <th>Fecha de Cambio</th>
                    <th>Fecha de Creación</th>
                    <th>Opciones</th>
                    <th></th>
                </thead>
                @foreach ($anescolar as $cat)
                <tr>
                    <td>{{ $cat -> cod_AñoEscolar}}</td>
                    <td>{{ $cat -> nombre_añoescolar}}</td>
                    <td>{{ $cat -> descripción_añoescolar}}</td>
                    <?php if($cat ->situacion == 1)
                    {
                       echo '<th>En curso</th>' ;
                    }
                    else{
                        echo '<th>Ya cursado</th>' ;
                    }
                    ?>
                    
                    
                    <td>{{ $cat -> updated_at}}</td>
                    <td>{{ $cat -> created_at}}</td>
                    <td>
                        <a href="{{URL::action('AnEscolarController@edit', $cat-> cod_AñoEscolar)}}"><button class="btn btn-info">Editar</button></a>
                    </td>
                    <td><a href="" data-target="#modal-delete-{{$cat-> cod_AñoEscolar}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                    
                </td>

                </tr>
                @include ('colegio.anescolar.modal')
                @endforeach
            </table>
        </div>
        {{$anescolar -> render()}}
    </div>
</div>
@endsection