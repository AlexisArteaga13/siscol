@extends('layouts.admin')
@section ('contenido')
{{Form::Open(array('action'=> array('CursoController@index',$grado,$curso,$nivel,$nivel),'method'=>'POST'))}}
                         {{ csrf_field() }}
                         <h3>Se Realizó Con Éxito <h3>
                         <button onClick="true" class="btn btn-microsoft">Ver Cursos</button></a>
                         {{Form::close()}}
@endsection