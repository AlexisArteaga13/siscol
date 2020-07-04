@extends('layouts.app')


@section('content')
	<ol class="breadcrumb">
	  <li><a href="?c=PRODUCTOS">PRODUCTOS</a></li>
	  <li class="active"><?php  'EDITAR Registro'; ?></li>
	</ol>

	{!! Form::model($productos, ['route' => ['productos.update', $productos->id],
                    'method' => 'PUT']) !!}
	    <input type="hidden" name="id" value=" <?php echo $productos->descripcion; ?>" >
	      <div class="form-group">
	        <label>descripcion</label>
	        <input type="text" name="descripcion" value="<?php  echo $productos->descripcion; ?>" class="form-control" placeholder="Ingrese su descripcion" required>
	    </div>
	    
	    <div class="form-group">
	        <label>precio_venta</label>
	        <input type="text" name="precio_venta" value="<?php  echo $productos->precio_venta; ?>" class="form-control" placeholder="Ingrese su precio_venta" required>
	    </div>
	    
	    <div class="form-group">
	        <label>precio_compra</label>
	        <input type="text" name="precio_compra" value="<?php  echo $productos->precio_compra; ?>" class="form-control" placeholder="Ingrese su precio_compra" required>
	    </div>
	    
	    <div class="form-grup">
	    	<label>Unidades</label>
	    	<select name="unidade_id" class="form-control">
	        	@foreach($unidades as $unidade)
					<option value="{{ $unidade['id'] }}">{{ $unidade['Nombre'] }}</option>
	        	@endforeach
	        </select>
	    </div>

	    <div class="form-grup">
	    	<label>Marcas</label>
	    	<select name="marca_id" class="form-control">
	        	@foreach($marcas as $marca)
					<option value="{{ $marca['id'] }}">{{ $marca['Nombre'] }}</option>
	        	@endforeach
	        </select>
	    </div>

	    <div class="form-grup">
	    	<label>Categoria</label>
	    	<select name="categoria_id" class="form-control">
	        	@foreach($categorias as $categoria)
					<option value="{{ $categoria['id'] }}">{{ $categoria['Nombre'] }}</option>
	        	@endforeach
	        </select>
	    </div>
	      
	    <hr />
	    
	        <button class="btn btn-warning" type="submit">ACTUALIZAR</button>
	    

			{!! Form::close() !!}

@endsection
