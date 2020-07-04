@extends('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Lista de Alumnos: <a href="alumnos/create"><button class="btn btn-success">Nuevo +</button></a></h3>
        @include('distribucionacademica.alumnos.search')
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
                    <th>Teléfono</th>
                    <th>Correo</th>
                   
                    <th>Dirección</th>
                    <th>Fecha de Cambio</th>
                    <th>Fecha de Creación</th>
                    <th>Opciones</th>
                    <th></th>
                </thead>
                @foreach ($alumno as $cat)
                <tr>
                    <td>{{ $cat -> CodAlumno}}</td>
                    <td>{{ $cat ->NombreAlumno}}</td>
                    <td>{{ $cat ->ApellidoAlumno}}</td>
                    <td>{{ $cat ->TelefonoHogarAlumno}}</td>
                    <td>{{ $cat ->CorreoAlumno}}</td>
                    <td>{{ $cat ->DireccionAlumno}}</td>
                   
                    <td>{{ $cat -> updated_at}}</td>
                    <td>{{ $cat -> created_at}}</td>
                    
                    <td>
                        <a href="{{URL::action('AlumnoController@edit', $cat -> CodAlumno)}}"><button class="btn btn-info">Editar</button></a>
                    </td>

                    <td><a href="" data-target="#modal-delete-{{$cat -> CodAlumno}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                    
                </td>

                </tr>
                @include ('distribucionacademica.alumnos.modal')
                @endforeach
            </table>
        </div>
        {{$alumno -> render()}}
    </div>
</div>
@endsection