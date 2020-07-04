@extends('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Lista de Docentes <a href="docentes/create"><button class="btn btn-success">Nuevo +</button></a></h3>
        @include('personaldocente.docentes.search')
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>D.N.I.</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Especialidad</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Fecha de Cambio</th>
                    <th>Fecha de Creación</th>
                    <th>Opciones</th>
                    <th></th>
                </thead>
                @foreach ($docente as $cat)
                <tr>
                    <td>{{ $cat -> DNIDocente}}</td>
                    <td>{{ $cat ->NombreDocente}}</td>
                    <td>{{ $cat ->ApellidosDocente}}</td>
                    <td>{{ $cat ->Especialidad}}</td>
                    <td>{{ $cat ->CorreoDocente}}</td>
                    <td>{{ $cat ->TelefonoDocente}}</td>
                    <td>{{ $cat ->DireccionDocente}}</td>
                    <td>{{ $cat -> updated_at}}</td>
                    <td>{{ $cat -> created_at}}</td>
                    
                    <td>
                        <a href="{{URL::action('DocenteController@edit',  $cat -> DNIDocente)}}"><button class="btn btn-info">Editar</button></a>
                    </td>

                    <td><a href="" data-target="#modal-delete-{{$cat -> DNIDocente}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                    
                </td>

                </tr>
                @include ('personaldocente.docentes.modal')
                @endforeach
            </table>
        </div>
        {{$docente -> render()}}
    </div>
</div>
@endsection