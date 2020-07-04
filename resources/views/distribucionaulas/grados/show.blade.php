@extends('layouts.admin')
@section ('contenido')
{{Form::Open(array('action'=> array('GradoController@index','null',$grado),'method'=>'POST'))}}
                         {{ csrf_field() }}
                         <h3>Se Realizó Con Éxito <h3>
                         <button class="btn btn-microsoft">Ver Grados</button></a>
                         {{Form::close()}}
@endsection