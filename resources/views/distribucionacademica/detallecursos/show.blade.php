@extends('layouts.admin')
@section ('contenido')
{{Form::Open(array('action'=> array('DetalleCursoController@index','null','null',$curso,'null','null'),'method'=>'POST'))}}
                         {{ csrf_field() }}
                         <h3>Se Realizó Con Éxito <h3>
                         <button class="btn btn-microsoft">Ver Asignaciones</button></a>
                         {{Form::close()}}
@endsection