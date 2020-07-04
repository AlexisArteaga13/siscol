<?php

namespace SisCol\Http\Controllers;

use Illuminate\Http\Request;
use SisCol\Grado;
use SisCol\Nivel;
use SisCol\Colegio;
use SisCol\seccion;
use Illuminate\Support\Facades\Redirect;
use SisCol\Http\Requests\SeccionFormRequest;
use Illuminate\Support\Facades\Storage;

use DB;
class SeccionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getNivel(Request $request,$id){
        if($request -> ajax()){
            $nivel=Nivel::Nivel($id);
            return response()-> json($nivel);
        }
    }
   public function index($codgrado,$codcolegio,$codnivel){        
           
            if($codgrado=='null'){
            $seccion=DB::table('seccion as s')
            -> join('gradoestudio as g','g.cod_grado','=','s.cod_grado')
            -> join('niveleducativo as n','g.cod_nivel','=','n.cod_nivel')
            -> join('colegio as c','n.cod_colegio','=','c.cod_colegio')
            ->select('s.cod_sección','s.nombre_seccion','g.cod_grado','g.nombre_grado','n.cod_nivel','n.nombre_nivel','c.cod_colegio','c.Nombre_colegio','g.updated_at','g.created_at')
            -> where('s.cod_colegio', '=',$codcolegio)
            -> where('s.condicion', '=','1')
            -> orderBy('s.nombre_seccion','asc') 
            -> paginate(5000);
            return view('distribucionaulas.secciones.index',["seccion"=>$seccion,"codigocolegio"=>$codcolegio,"codnivel"=>$codnivel,"codgrado"=>$codgrado]);
        }else{
            $seccion=DB::table('seccion as s')
            -> join('gradoestudio as g','g.cod_grado','=','s.cod_grado')
            -> join('niveleducativo as n','g.cod_nivel','=','n.cod_nivel')
            -> join('colegio as c','n.cod_colegio','=','c.cod_colegio')
            ->select('s.cod_sección','s.nombre_seccion','g.cod_grado','g.nombre_grado','n.cod_nivel','n.nombre_nivel','c.cod_colegio','c.Nombre_colegio','g.updated_at','g.created_at')
            -> where('s.cod_grado', '=',$codgrado)
            -> where('s.cod_colegio', '=',$codcolegio)
            -> where('s.condicion', '=','1')
            -> orderBy('s.nombre_seccion','asc') 
            -> paginate(5000);
            return view('distribucionaulas.secciones.index',["seccion"=>$seccion,"codigocolegio"=>$codcolegio,"codnivel"=>$codnivel,"codgrado"=>$codgrado]);
        }
        
   }
   public function create($id,$codnivel,$codgrado){
       if($codnivel != 'null' && $codgrado != 'null'){
        $grado= DB::table('gradoestudio') -> where('condicion', '=','1')-> where('cod_grado', '=',$codgrado) ->get();
       $colegio= DB::table('colegio') -> where('condicion_colegio', '=','1')-> where('cod_colegio', '=',$id) ->get();
       $nivel= DB::table('niveleducativo as ni' )->join("gradoestudio as gra","ni.cod_nivel","=","gra.cod_nivel") -> where('ni.condicion', '=','1')-> where('gra.cod_grado', '=',$codgrado)->get();
       return view("distribucionaulas.secciones.create",["grado" => $grado,"colegio" => $colegio,"nivel" => $nivel,"codigocolegio"=>$id,"pseccion"=>1]);

    }
    else{
        $grado= DB::table('gradoestudio') -> where('condicion', '=','1')-> where('cod_colegio', '=',$id) ->get();
        $colegio= DB::table('colegio') -> where('condicion_colegio', '=','1')-> where('cod_colegio', '=',$id) ->get();
        $nivel= DB::table('niveleducativo') -> where('condicion', '=','1') -> where('cod_colegio', '=',$id)->get();
        return view("distribucionaulas.secciones.create",["grado" => $grado,"colegio" => $colegio,"nivel" => $nivel,"codigocolegio"=>$id,"pseccion"=>0]);
    }
}
public function getSeccion(Request $request, $id){
    if($request -> ajax()){
        $grado = Grado::Grados($id);
        return response() -> json($grado);    
}
}
public function getSeccionesorigi(Request $request, $id){
    if($request -> ajax()){
        $seccion = seccion::Seccion($id);
        return response() -> json($seccion);    
}
    }
    public function getValidarSeccion(Request $request, $id){
        if($request -> ajax()){
            $seccion = seccion::ValidarSeccion($id);
            return response() -> json($seccion);    
    }}
public function store(SeccionFormRequest $request){
       $seccion= new seccion;
       //$seccion -> cod_sección =$request -> get('cod_sección');
       $seccion -> cod_sección =$this->codigomaximo();
       $seccion -> nombre_seccion =$request -> get('nombre_seccion');
       $seccion -> cod_grado =$request -> get('cod_grado');
       $seccion -> cod_nivel =$request -> get('cod_nivel');
       $seccion -> cod_colegio =$request -> get('cod_colegio');
       $seccion-> condicion = 1;
       $seccion -> save();
       return Redirect::action('SeccionController@show',array('id' =>  $seccion -> cod_colegio,"grado"=>$seccion -> cod_grado,"nivel"=>$seccion -> cod_nivel));
}
public function codigomaximo(){
    $codmax = DB::table("seccion")->select('cod_sección')->get();
    //echo $codmax;
    $numeromax = 0;
    foreach($codmax as $cod){
            if($cod->cod_sección > $numeromax){
            $numeromax = $cod->cod_sección;
            }
            else{
                $numeromax = $numeromax;
            }
    }
    $nuevoidgrado = $numeromax +1;
    return $nuevoidgrado;
    }
 
public function show($id,$codgrado,$codnivel){
    return view("distribucionaulas.secciones.show",["seccion" =>$id,"grado"=>$codgrado,"nivel"=>$codnivel]);
     
}
public function getValidaridseccion(Request $request){
    // if($request -> ajax()){
         $nivel=DB::table('seccion')->select("cod_sección") ->get();
       /* if($nivel == null){
            $nivel == 1;
        }*/
         //echo implode($nivel);
         return response()-> json($nivel);
    // }
 }
public function edit($id,$codcolegio){
    $seccion= seccion::findOrFail($id);
    $grado= DB::table('gradoestudio') -> where('condicion', '=','1') -> where('cod_colegio','=',$codcolegio) ->get();
    $colegio= DB::table('colegio') -> where('condicion_colegio', '=','1')  -> where('cod_colegio','=',$codcolegio)->get();
    $nivel= DB::table('niveleducativo') -> where('condicion', '=','1') -> where('cod_colegio','=',$codcolegio) ->get();
    return view("distribucionaulas.secciones.edit",["seccion"=>$seccion,"grado"=>$grado,"cod_sección"=>$id,"colegio" => $colegio,"nivel" => $nivel ]);
    
}
public function update(SeccionFormRequest $request,$id){
       $seccion = seccion :: findOrFail($id);
       $seccion -> cod_sección =$request -> get('cod_sección');
       $seccion -> nombre_seccion =$request -> get('nombre_seccion');
       $seccion -> cod_grado =$request -> get('cod_grado');
       $seccion -> cod_nivel =$request -> get('cod_nivel');
       $seccion -> cod_colegio =$request -> get('cod_colegio');
       $seccion-> condicion = 1;
       $seccion -> update();
       return Redirect::action('SeccionController@show',array('id' =>  $seccion -> cod_colegio,"grado"=>$seccion -> cod_grado,"nivel"=>$seccion -> cod_nivel ));


}
public function destroy($id){
    $seccion = seccion :: findOrFail($id);
    $seccion -> condicion = 0;
    $seccion -> update();
   /* $producto = Producto :: findOrFail($id) -> delete();*/
   return Redirect::action('SeccionController@show',array('id' =>  $seccion -> cod_colegio,"grado"=>'null',"nivel"=>''));

}
}