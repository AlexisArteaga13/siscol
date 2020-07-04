@extends('layouts.app')

@section('content')

	<ol class="breadcrumb">
	  <li><a href="?c=PRODUCTOS">PRODUCTOS</a></li>
	  <li class="active"><?php  // echo $cliente->id != null ? $cliente->descripcion : 'Nuevo Registro'; ?></li>
	</ol>

	{!! Form::open(['route' => ['productos.store'], 
                                    'method' => 'POST']) !!}
	    <input type="hidden" name="id" value="<?php // echo $cliente->descripcion; ?>" >
	      <div class="form-group">
	        <label>descripcion</label>
	        <input type="text" name="descripcion" value="<?php // echo $cliente->descripcion; ?>" class="form-control" placeholder="Ingrese su descripcion" required>
	    </div>
	    
	    <div class="form-group">
	        <label>precio_venta</label>
	        <input type="text" name="precio_venta" value="<?php // echo $cliente->precio_venta; ?>" class="form-control" placeholder="Ingrese su precio_venta" required>
	    </div>
	    
	    <div class="form-group">
	        <label>precio_compra</label>
	        <input type="text" name="precio_compra" value="<?php // echo $cliente->precio_compra; ?>" class="form-control" placeholder="Ingrese su precio_compra" required>
	    </div>
	    <div class="form-grup">
	    	<label>Unidad</label>
	    	<select name="unidade_id" class="form-control">
	    		<option valuer=""> --Escoja la unidad </option>
	        	@foreach($unidades as $unidade)
					<option value="{{ $unidade['id'] }}">{{ $unidade['Nombre'] }}</option>
	        	@endforeach
	        </select>
	    </div>
	    <div class="form-grup">
	    	<label>Marca</label>
	    	<select name="marca_id" class="form-control">
	    		<option valuer=""> --Escoja la marca </option>
	        	@foreach($marcas as $marca)
					<option value="{{ $marca['id'] }}">{{ $marca['Nombre'] }}</option>
	        	@endforeach
	        </select>
	    </div>

	    <div class="form-grup">
	    	<label>Categoria</label>
	    	<select name="categoria_id" class="form-control">
	    		<option valuer=""> --Escoja la categoria </option>
	        	@foreach($categorias as $categoria)
					<option value="{{ $categoria['id'] }}">{{ $categoria['Nombre'] }}</option>

	        	@endforeach

	        </select>

	    </div>
	      
	    <hr />
	    <div class="text-right">
	        
	        <button class="btn btn-primary">Guardar</button>
	    </div>
		{!! Form::close() !!}

		@endsection