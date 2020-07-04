<?php 
use SisCol\Http\Controllers\GradoController;


class AjaxGrados{

	/*=============================================
	EDITAR USUARIO
	=============================================*/	

	public $colegio;


	
	public function ajaxVerGrados(){

	
		
		$valor1 = $this->colegio;


        $respuesta = GradoController::extraergrados($valor1);
  

	}

	
}


/*=============================================
ACTIVAR USUARIO
=============================================*/	

if(isset($_POST["colegio"])){

	$selectcolegio = new AjaxGrados();
	$selectcolegio -> colegio = $_POST["colegio"];
	$selectcolegio -> ajaxVerGrados();

}




?>