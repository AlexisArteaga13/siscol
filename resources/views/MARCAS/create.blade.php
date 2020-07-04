@extends('layouts.app')

@section('content')
	<h1 class="page-header">
	    <?php // echo $cliente->id != null ? $cliente->Nombre : 'Nuevo Registro'; ?>
	</h1>

	<ol class="breadcrumb">
	  <li><a href="?c=marcas">marcas</a></li>
	  <li class="active"><?php  // echo $cliente->id != null ? $cliente->Nombre : 'Nuevo Registro'; ?></li>
	</ol>

	{!! Form::open(['route' => ['marcas.store'], 
                                    'method' => 'POST']) !!}
	    <input type="hidden" name="id" value="<?php // echo $cliente->Nombre; ?>" >

	      <div class="form-group">
	        <label>Nombre</label>
	        <input type="text" name="Nombre" value="<?php // echo $cliente->Nombre; ?>" class="form-control" placeholder="Ingrese su Nombre" required>
	    </div>
	    <hr />
	    <div class="text-right">
	        <button class="btn btn-primary">Guardar</button>
	    </div>
		{!! Form::close() !!}
@endsection