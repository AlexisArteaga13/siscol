@extends('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Lista de Contratos</h3><a>
                    {{Form::Open(array('action'=> array('ContratoController@create','colegio' =>$colegio),'method'=>'POST'))}}
                         {{ csrf_field() }}
                       <button
                                class="btn btn-success">NUEVO CONTRATO +</button></a> {{Form::close()}}
                    
     
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Código</th>
                    <th>Nombre Colegio</th>
                    <th>Nombres Docente</th>
                    <th>Detalles</th>
                    <th>Fecha de Cambio</th>
                    <th>Fecha de Creación</th>
                    <th>Opciones</th>
                    <th></th>
                </thead>
                @foreach ($contrato as $cat)
                <tr>
                    <td>{{ $cat -> CodContrato}}</td>
                    <td>{{ $cat -> Nombre_colegio}}</td>
                    <td>{{ $cat ->NombreDocente}} {{ $cat ->ApellidosDocente}}</td>                  
                    <td>{{ $cat ->DetallesContrato}}</td>
                    <td>{{ $cat -> updated_at}}</td>
                    <td>{{ $cat -> created_at}}</td>
                    <td>
                        <a href="{{URL::action('ContratoController@edit', $cat -> CodContrato)}}"><button class="btn btn-info">Editar</button></a>
                    </td>

                    <td><a href="" data-target="#modal-delete-{{$cat -> CodContrato}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                    
                </td>
                </tr>
                @include ('personaldocente.contratos.modal')
                   @endforeach
            </table>
        </div>
      
    </div>
</div>
@endsection