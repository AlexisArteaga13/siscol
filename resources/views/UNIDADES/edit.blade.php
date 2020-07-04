<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body style="background-color: #80A4EB">

	<h1 class="page-header">
	    <?php echo  'EDITAR unidades'; ?>
	</h1>

	<ol class="breadcrumb">
	  <li><a href="?c=unidadeS">unidadeS</a></li>
	  <li class="active"><?php  'EDITAR Registro'; ?></li>
	</ol>

	<form id="frm-alumno" action="/unidades/{{ $unidades['id'] }}/update" method="post" enctype="multipart/form-data">

		{{ csrf_field() }}
	    <input type="hidden" name="id" value=" <?php echo $unidades->Nombre; ?>" >
	    
	    <div class="form-group">
	        <label>Nombre</label>
	        <input type="text" name="Nombre" value="<?php  echo $unidades->Nombre; ?>" class="form-control" placeholder="Ingrese su Nombre" required>
	    </div>
	    
	    <hr />
	        <button class="btn btn-warning" type="submit">ACTUALIZAR</button>
	</form>

</body>
</html>