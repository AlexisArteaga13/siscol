@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">CATEGORIAS</div>

                <div class="panel-body">                    
                    {!! Form::model($categorias, ['route' => ['categorias.update', $categorias->id],
                    'method' => 'PUT']) !!}

                        @include('categorias.partials.form')
                        
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
