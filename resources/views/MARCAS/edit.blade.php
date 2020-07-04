@extends('layouts.app')

@section('content')
	<h1 class="page-header">
	    <?php echo  'EDITAR marcas'; ?>
	</h1>

	<ol class="breadcrumb">
	  <li><a href="?c=marcaS">marcaS</a></li>
	  <li class="active"><?php  'EDITAR Registro'; ?></li>
	</ol>

	{!! Form::model($marcas, ['route' => ['marcas.update', $marcas->id],
                    'method' => 'PUT']) !!}
	    <input type="hidden" name="id" value=" <?php echo $marcas->Nombre; ?>" >
	    
	    <div class="form-group">
	        <label>Nombre</label>
	        <input type="text" name="Nombre" value="<?php  echo $marcas->Nombre; ?>" class="form-control" placeholder="Ingrese su Nombre" required>
	    </div>
	    
	    <hr />
	        <button class="btn btn-warning" type="submit">ACTUALIZAR</button>
		{!! Form::close() !!}

@endsection
