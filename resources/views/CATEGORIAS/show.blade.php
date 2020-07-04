<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	
    <a class="btn btn-primary btn-warning" href="?c=INICIO">ATRAS</a>
    <a class="btn btn-primary pull-right" href="?c=categoriaS&a=Crud">Agregar</a>
<br><br><br>

<table class="table  table-striped  table-hover" id="tabla">
    <thead>
        <tr>
        <th style="width:120px; background-color: #5DACCD; color:#fff">Nombre</th>
            <th style="width:60px; background-color: #5DACCD; color:#fff"></th>
            <th style="width:60px; background-color: #5DACCD; color:#fff"></th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <td><?php echo $categorias->Nombre; ?></td>
            <td>
                <a  class="btn btn-warning" href="?c=categoriaS&a=Crud&id=<//?php echo $r->id; ?>">Editar</a>
            </td>
            <td>
                <a  class="btn btn-danger" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=categoriaS&a=Eliminar&id=<//?php echo $r->id; ?>">Eliminar</a>
            </td>
        </tr>
    </tbody>
</table> 

</body>
</html>