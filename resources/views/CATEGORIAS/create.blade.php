@extends('layouts.app')

@section('content')


	<ol class="breadcrumb">
	  <li><a href="?c=categorias">categorias</a></li>
	  <li class="active"><?php  // echo $cliente->id != null ? $cliente->Nombre : 'Nuevo Registro'; ?></li>
	</ol>

    {!! Form::open(['route' => ['categorias.store'], 
                                    'method' => 'POST']) !!}

                                    <input type="hidden" name="id" value="<?php // echo $cliente->Nombre; ?>" >

<div class="form-group">
  <label>Nombre</label>
  <input type="text" name="Nombre" value="<?php // echo $cliente->Nombre; ?>" class="form-control" placeholder="Ingrese su Nombre" required>
</div>
<hr />


        <button class="btn btn-sm btn-danger">
                                            GUARDAR
        </button>
    {!! Form::close() !!}
@endsection