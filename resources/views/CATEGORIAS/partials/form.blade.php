   
<div class="form-group">
	        <label>Nombre</label>
			
			{{ Form::text('Nombre', null, ['class' => 'form-control', 'id' => 'Nombre']) }}
</div>

<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>

