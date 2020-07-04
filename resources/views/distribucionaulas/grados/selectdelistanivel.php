<?php 
$conexion=mysqli_connect('127.0.0.1:3306','root','alexis1303','niveleducativo');
$colegio=$_GET['colegio'];

	$sql="SELECT cod_nivel,nombre_nivel
		from niveleducativo 
		where cod_colegio='$colegio'";

	$result=mysqli_query($conexion,$sql);

	$cadena='<label>Nivel de Estudio:</label>

    <select name="cod_nivel" class="form-control dynamic" data-dependent="nivel">
       <option>--Selecciona--</option>';

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option value='.$ver[0].'>'.utf8_encode($ver[1]).'</option>';
	}

	echo  $cadena."</select>";
	

?>