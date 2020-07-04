@extends('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Lista de Usuarios</h3>
        @include('usuarios.search')
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>DNI</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Tipo De Usuario</th>
                    <th>Código de Colegio</th>
                    <th>Fecha de Creación</th>
                    <th>Fecha de Actualización</th>
                    <th>Opciones</th>
                    <th></th>
                </thead>
                @if(Auth::user()->TIPOUSU == 'admincol')

                    @foreach ($usuario as $cat)
                @if ($cat ->TIPOUSU == 'docente' & $cat -> colegioadmin ==  Auth::user() -> colegioadmin)
                <tr>
                    <td>{{ $cat ->DNI}}</td>
                    <td>{{ $cat -> name}}</td>
                    <td>{{ $cat -> email}}</td>
                    <td>{{ $cat -> TIPOUSU}}</td>
                    <td>{{ $cat -> colegioadmin}}</td>
                    <td>{{ $cat -> updated_at}}</td>
                    <td>{{ $cat -> created_at}}</td>
                   
                    <td>
                    
                        <a href="{{URL::action('InicioController@edit', $cat->id)}}"><button class="btn btn-info">Editar</button></a>
                    </td>

                    <td><a href="" data-target="#modal-delete-{{$cat->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                    
                </td>

                </tr>
                
                @include ('usuarios.modal')
                @endif
                @endforeach
                @else
                @foreach ($usuario as $cat)
                
                <tr>
                    <td>{{ $cat ->DNI}}</td>
                    <td>{{ $cat -> name}}</td>
                    <td>{{ $cat -> email}}</td>
                    <td>{{ $cat -> TIPOUSU}}</td>
                    <td>{{ $cat -> colegioadmin}}</td>
                    <td>{{ $cat -> updated_at}}</td>
                    <td>{{ $cat -> created_at}}</td>
                   
                    <td>
                    
                        <a href="{{URL::action('InicioController@edit', $cat->id)}}"><button class="btn btn-info">Editar</button></a>
                    </td>

                    <td><a href="" data-target="#modal-delete-{{$cat->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                    
                </td>

                </tr>
                
                @include ('usuarios.modal')
               
                @endforeach
                @endif
                
                
                
            </table>
        </div>
        {{$usuario -> render()}}
    </div>
</div>
@endsection