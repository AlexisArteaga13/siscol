@extends('layouts.admin')
@section ('contenido')
{{Form::Open(array('action'=> array('MatriculaController@index',$colegio),'method'=>'POST'))}}
                         {{ csrf_field() }}
                         @if(session()->has('matriculado'))
        <div class="alert alert-warning">{{ session('matriculado')}}</div>
        @endif
        @if(session()->has('success'))
        <div class="alert alert-success">{{ session('success')}}</div>
        @endif
                         <button class="btn btn-microsoft">Ver Matrículas</button></a>
                         {{Form::close()}}
@endsection