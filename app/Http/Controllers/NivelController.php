<?php

namespace SisCol\Http\Controllers;

use Illuminate\Http\Request;
use SisCol\Nivel;
use SisCol\Colegio;
use Illuminate\Support\Facades\Redirect;
use SisCol\Http\Requests\NivelFormRequest;
use Illuminate\Support\Facades\Storage;

use DB;
class NivelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
     /**
    * Update the specified user.
    *@param  string  $tipodebusqueda
    * @param  Request  $request
    * @param  string  $id
    * @param  string  $tipodebusqueda
    */
   public function index($busqueda,$tipodebusqueda, $id){
       
            if($id!=null){
            $query=trim($busqueda);
            $tipodebuscar= trim($tipodebusqueda);
            if($tipodebuscar==null){
            $nivel=DB::table('niveleducativo as n')
            -> join('colegio as c','n.cod_colegio','=','c.cod_colegio')
            ->select('n.cod_nivel','c.Nombre_colegio','n.nombre_nivel','n.updated_at','n.created_at')
            ->where($tipodebuscar,'LIKE','%'.$query.'%') 
            -> where('n.cod_colegio', '=',$id)
            -> where('n.condicion', '=','1')
            -> orderBy('n.nombre_nivel','asc') 
            -> paginate(50000000000000);
            return view('colegio.niveleducativo.index',["nivel"=>$nivel,"searchText"=>$query,'codigocolegio'=>$id,"tipodebuscar"=>$tipodebuscar]);
        } 
        else
                    $nivel=DB::table('niveleducativo as n')
                    -> join('colegio as c','n.cod_colegio','=','c.cod_colegio')
                    ->select('n.cod_nivel','c.Nombre_colegio','n.nombre_nivel','c.cod_colegio','n.updated_at','n.created_at')
                  
                  //  ->where($tipodebuscar,'LIKE','%'.$query.'%') 
                    -> where('n.cod_colegio', '=',$id)
                    -> where('n.condicion', '=','1')
                    -> orderBy('n.nombre_nivel','asc') 
                    -> paginate(5000000000000);
                    return view('colegio.niveleducativo.index',["nivel"=>$nivel,"searchText"=>'','codigocolegio'=>$id,"tipodebuscar"=>$tipodebuscar]);
        }

}
    
public function getValidarNivel(Request $request,$id){
    if($request -> ajax()){
        $nivel=Nivel::ValidarNivel($id);
        return response()-> json($nivel);
    }
}
public function getValidaridNivel(Request $request){
    // if($request -> ajax()){
         $nivel=DB::table('niveleducativo')->select("cod_nivel") ->get();
       /* if($nivel == null){
            $nivel == 1;
        }*/
         //echo implode($nivel);
         return response()-> json($nivel);
    // }
 }
public function getNivel(Request $request, $id){
    if($request -> ajax()){
        $nivel = Nivel::Nivel($id);
        return response() -> json($nivel);    
}
    
        }
   public function create($id){
       $colegio= DB::table('colegio') -> where('condicion_colegio', '=','1') -> where('cod_colegio', '=',$id) ->get();
       return view("colegio.niveleducativo.create",["colegio" => $colegio]);
}
  /**
    * Update the specified user.
    *
    * @param  Request  $request
    * @param  string  $ide
    * 
    */
public function store(NivelFormRequest $request){
       $nivel= new Nivel;
       //$nivel -> cod_nivel =$request -> get('cod_nivel');
       $nivel -> cod_nivel =$this ->codigomaximo();
       $nivel -> nombre_nivel =$request -> get('nombre_nivel');
       $nivel -> cod_colegio =$request -> get('cod_colegio');
       $nivel -> condicion = 1;
       $nivel -> save();
       return Redirect::action('NivelController@show',array('id' =>  $nivel -> cod_colegio));
      
}
public function codigomaximo(){
    $codmax = DB::table("niveleducativo")->select('cod_nivel')->get();
    //echo $codmax;
    $numeromax = 0;
    foreach($codmax as $cod){
            if($cod->cod_nivel > $numeromax){
            $numeromax = $cod->cod_nivel;
            }
            else{
                $numeromax = $numeromax;
            }
    }
    $nuevoidgrado = $numeromax +1;
    return $nuevoidgrado;
    }
public function show($id){
    if($id !=null){
    
   
    
        $nivel=DB::table('niveleducativo as n')
        -> join('colegio as c','n.cod_colegio','=','c.cod_colegio')
        ->select('n.cod_nivel','c.Nombre_colegio','n.nombre_nivel','n.updated_at','n.created_at')
       
        -> where('n.condicion', '=','1')
        -> where('n.cod_colegio', '=',$id)
        -> orderBy('n.nombre_nivel','asc') 
        -> paginate(5);
        return view('colegio.niveleducativo.show',["nivel"=>$nivel,"codigo"=>$id]);
    }
     
}
/**
    * Update the specified user.
    *
    * @param  Request  $request
    * @param  string  $id
    * @param  string  $cod_col
    * 
    */
public function edit($id,$cod_col){
    $nivel= Nivel::findOrFail($id);
    $colegio= DB::table('colegio') -> where('condicion_colegio', '=','1') -> where('cod_colegio', '=',$cod_col) ->get();
      
    return view("colegio.niveleducativo.editar",["nivel"=>$nivel,"cod_nivel"=>$id,"colegio" => $colegio ]);
    
}
 /**
    * Update the specified user.
    *
    * @param  Request  $request
    * @param  string  $id
    * 
    */
public function update(NivelFormRequest $request,$id){
       $nivel = Nivel :: findOrFail($id);
       $nivel -> cod_nivel = $request -> get('cod_nivel') ;
       $nivel -> nombre_nivel =$request -> get('nombre_nivel');
       $nivel -> cod_colegio =$request -> get('cod_colegio');
       $nivel -> condicion = 1;
      
       $nivel -> update();
       return Redirect::action('NivelController@show',array('id' =>  $nivel -> cod_colegio));

}
public function destroy($id){
    $nivel = Nivel :: findOrFail($id);
    $nivel -> condicion = 0;
    $nivel -> update();
   /* $producto = Producto :: findOrFail($id) -> delete();*/
   return Redirect::action('NivelController@show',array('id' =>  $nivel -> cod_colegio));
}
}