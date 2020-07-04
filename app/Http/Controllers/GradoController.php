<?php

namespace SisCol\Http\Controllers;


use Illuminate\Http\Request;
use SisCol\Grado;
use SisCol\Nivel;
use SisCol\Colegio;
use Illuminate\Support\Facades\Redirect;
use SisCol\Http\Requests\GradoFormRequest;
use Illuminate\Support\Facades\Storage;

use DB;
class GradoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
    * Update the specified user.
    *@param  string  $codnivel
    * @param  Request  $request
    * @param  string  $codcolegio
    * 
    */
    public function index($codnivel,$codcolegio) {
        if($codnivel == 'null'){
            $grado=DB::table('gradoestudio as g')
            -> join('niveleducativo as n','g.cod_nivel','=','n.cod_nivel')
            -> join('colegio as c','n.cod_colegio','=','c.cod_colegio')
            ->select('g.cod_grado','g.nombre_grado','g.descripción_grado','n.cod_nivel','n.nombre_nivel','c.cod_colegio','c.Nombre_colegio','g.updated_at','g.created_at')
            ->where('n.cod_colegio','=',$codcolegio) 
            -> where('g.condicion', '=','1')
            -> orderBy('g.nombre_grado','asc') 
            ->paginate(500)
            ;
            
            return view('distribucionaulas.grados.index',["grados"=>$grado,"codigocolegio"=>$codcolegio,"codnivel"=>$codnivel]);
        
    }
    else{
        if(!is_numeric($codnivel)){
            $grado=DB::table('gradoestudio as g')
            -> join('niveleducativo as n','g.cod_nivel','=','n.cod_nivel')
            -> join('colegio as c','n.cod_colegio','=','c.cod_colegio')
            ->select('g.cod_grado','g.nombre_grado','g.descripción_grado','n.cod_nivel','n.nombre_nivel','c.cod_colegio','c.Nombre_colegio','g.updated_at','g.created_at')
                ->where('n.cod_colegio','=',$codcolegio) 
            ->where('n.nombre_nivel','=',$codnivel) 
            -> where('g.condicion', '=','1')
            -> orderBy('g.nombre_grado','asc') 
            ->get();
        }
        else{
        $grado=DB::table('gradoestudio as g')
        -> join('niveleducativo as n','g.cod_nivel','=','n.cod_nivel')
        -> join('colegio as c','n.cod_colegio','=','c.cod_colegio')
        ->select('g.cod_grado','g.nombre_grado','g.descripción_grado','n.cod_nivel','n.nombre_nivel','c.cod_colegio','c.Nombre_colegio','g.updated_at','g.created_at')
            ->where('n.cod_colegio','=',$codcolegio) 
        ->where('g.cod_nivel','=',$codnivel) 
        -> where('g.condicion', '=','1')
        -> orderBy('g.nombre_grado','asc') 
        ->get();
    }
        //,'OR','n.nombre_nivel','=',$codnivel
        return view('distribucionaulas.grados.index',["grados"=>$grado,"codigocolegio"=>$codcolegio,"codnivel"=>$codnivel]);
    }
}
   /**
    * Update the specified user.
    
    * @param  string  $codcolegio2
    * @param  string  $codigonivel
    */
   public function crear($codcolegio2,$codigonivel){
      if($codigonivel=="null"){
       $colegio= DB::table('colegio') -> where('condicion_colegio', '=','1') -> where('cod_colegio','=',$codcolegio2) ->get();
       $nivel= DB::table('niveleducativo') -> where('condicion', '=','1')-> where('cod_colegio','=',$codcolegio2) ->get();
       return view('distribucionaulas.grados.crear',["nivel" => $nivel,"colegio"=>$colegio,"codigocolegio"=>$codcolegio2,"panivel"=>0]);
    }
    else{
        $colegio= DB::table('colegio') -> where('condicion_colegio', '=','1') -> where('cod_colegio','=',$codcolegio2) ->get();
       $nivel= DB::table('niveleducativo') -> where('condicion', '=','1')-> where('cod_nivel','=',$codigonivel) ->get();
       return view('distribucionaulas.grados.crear',["nivel" => $nivel,"colegio"=>$colegio,"codigocolegio"=>$codcolegio2,"panivel"=>1]);
    }
}
/**
    * Update the specified user.
    *
    * @param  Request  $request
    * 
    * 
    */
public function store(GradoFormRequest $request){
       $grado= new Grado;
      // echo $this->codigomaximo();
      // $grado -> cod_grado =$request -> get('cod_grado');
      $grado -> cod_grado = $this->codigomaximo();
       $grado -> nombre_grado =$request -> get('nombre_grado');
       $grado -> descripción_grado =$request -> get('descripción_grado');
       $grado -> cod_nivel =$request -> get('cod_nivel');
       $grado -> cod_colegio =$request -> get('cod_colegio');
       $grado -> condicion = 1;
      $grado -> save();
        return Redirect::action('GradoController@show',array('id' =>  $grado -> cod_colegio));
}
public function codigomaximo(){
$codmax = DB::table("gradoestudio")->select('cod_grado')->get();
//echo $codmax;
$numeromax = 0;
foreach($codmax as $cod){
        if($cod->cod_grado > $numeromax){
        $numeromax = $cod->cod_grado;
        }
        else{
            $numeromax = $numeromax;
        }
}
$nuevoidgrado = $numeromax +1;
return $nuevoidgrado;
}



/**
    * Update the specified user.
    *
    * @param  string $id
    * 
    * 
    */
public function show($id){
       return view("distribucionaulas.grados.show",["grado" =>$id]);
     
}
public function getValidarGrado(Request $request,$id){
    if($request -> ajax()){
        $grado=Grado::ValidarGrado($id);
        return response()-> json($grado);
    }
}
public function getValidaridGrado(Request $request){
    // if($request -> ajax()){
         $nivel=DB::table('gradoestudio')->select("cod_grado") ->get();
       /* if($nivel == null){
            $nivel == 1;
        }*/
         //echo implode($nivel);
         return response()-> json($nivel);
    // }
 }
public function getValidarNuevoGrado(Request $request,$id){
    if($request -> ajax()){
        $grado=Grado::ValidarGrado($id);
        return response()-> json($grado);
    }
}
public function seleccion(){
    $colegio= DB::table('colegio') -> where('condicion_colegio', '=','1') ->get();
    $nivel= DB::table('niveleducativo') -> where('condicion', '=','1') ->get();
    return view('distribucionaulas.grados.crear',["nivel" => $nivel,"colegio"=>$colegio]);
}
function fetch($id)
{
    $colegio=$id;
   
    $data = DB::table('niveleducativo') 
    -> where ('cod_colegio','=', $colegio)
    ->get();
    $output = $colegio ;
    foreach($data as $row)
    {
        $output = '<option value="'.$row->cod_nivel.'">'.$row->cod_nivel.'</option>';
    }
    echo $output;

}
public function edit($id,$codcolegio3){
    $grado= Grado::findOrFail($id);
    $colegio= DB::table('colegio') -> where('condicion_colegio', '=','1') -> where('cod_colegio','=',$codcolegio3) ->get();
       $nivel= DB::table('niveleducativo') -> where('condicion', '=','1')-> where('cod_colegio','=',$codcolegio3) ->get();
     return view("distribucionaulas.grados.edit",["grado"=>$grado,"cod_grado"=>$id,"colegio" => $colegio,"nivel" => $nivel ]);
    
}
/**
    * Update the specified user.
    *
    * @param  Request  $request
    * @param  string  $id
    * 
    */
public function update(GradoFormRequest $request,$id){
       $grado = Grado :: findOrFail($id);
       $grado -> cod_grado =$request ->get('cod_grado');
       $grado -> nombre_grado =$request -> get('nombre_grado');
       
       $grado -> descripción_grado =$request -> get('descripción_grado');
       $grado -> cod_nivel =$request -> get('cod_nivel');
       $grado -> cod_colegio =$request -> get('cod_colegio');
      
       $grado -> update();
       return Redirect::action('GradoController@show',array('id' =>  $grado -> cod_colegio));

}
public function destroy($id){
    $grado = Grado :: findOrFail($id);
    $grado -> delete();
   /* $producto = Producto :: findOrFail($id) -> delete();*/
   return Redirect::action('GradoController@show',array('id' =>  $grado -> cod_colegio));

}
}