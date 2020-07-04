@extends('layouts.admin')
@section ('contenido')
{{Form::Open(array('action'=> array('SeccionController@index',$grado,$seccion,$nivel),'method'=>'POST'))}}
                         {{ csrf_field() }}
                         <h3>Se Realizó Con Éxito <h3>
                         <button class="btn btn-microsoft">Ver Secciones</button></a>
                         {{Form::close()}}
@endsection