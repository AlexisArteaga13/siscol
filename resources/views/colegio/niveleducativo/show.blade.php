@extends('layouts.admin')
@section ('contenido')
{{Form::Open(array('action'=> array('NivelController@index','tipodebusqueda'=> 'null','busqueda'=>'null',$codigo),'method'=>'POST'))}}
                         {{ csrf_field() }}
                         <h3>Se Realizó Con Éxito <h3>
                         <button class="btn btn-microsoft">Ver Niveles</button></a>
                         {{Form::close()}}
@endsection