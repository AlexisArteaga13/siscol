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
    public function _construct(){}
    public function getNivel(Request $request,$id){
        if($request -> ajax()){
            $nivel=Nivel::Nivel($id);
            return response()-> json($nivel);
        }
    }
   public function index(Request $request){
        if($request)
        {
            $query=trim($request->get('searchText'));
            $tipodebuscar= trim($request->get('tipodebuscar'));
            if($tipodebuscar==null){
            $grado=DB::table('gradoestudio as g')
            -> join('niveleducativo as n','g.cod_nivel','=','n.cod_nivel')
            -> join('colegio as c','n.cod_colegio','=','c.cod_colegio')
            ->select('g.cod_grado','g.nombre_grado','g.descripción_grado','n.cod_nivel','n.nombre_nivel','c.cod_colegio','c.Nombre_colegio','g.updated_at','g.created_at')
            ->where('g.nombre_grado','LIKE','%'.$query.'%') 
            -> where('g.condicion', '=','1')
            -> orderBy('g.nombre_grado','asc') 
            -> paginate(5);
            return view('distribucionaulas.grados.index',["grado"=>$grado,"searchText"=>$query,"tipodebuscar"=>$tipodebuscar]);
        }else{
            $grado=DB::table('gradoestudio as g')
            -> join('niveleducativo as n','g.cod_nivel','=','n.cod_nivel')
            -> join('colegio as c','n.cod_colegio','=','c.cod_colegio')
            ->select('g.cod_grado','g.nombre_grado','g.descripción_grado','g.cod_nivel','c.cod_colegio','g.updated_at','g.created_at')
            ->where($tipodebuscar,'LIKE','%'.$query.'%') 
            -> where('g.condicion', '=','1')
            -> orderBy('g.nombre_grado','asc') 
            -> paginate(5);
            return view('distribucionaulas.grados.index',["grado"=>$grado,"searchText"=>$query,"tipodebuscar"=>$tipodebuscar]);
        }
        }
   }
   public function create(){
       $colegio= DB::table('colegio') -> where('condicion_colegio', '=','1') ->get();
       $nivel= DB::table('niveleducativo') -> where('condicion', '=','1') ->get();
       return view("distribucionaulas.grados.create",["colegio" => $colegio,"nivel" => $nivel]);
}
public function store(GradoFormRequest $request){
       $grado= new Grado;
       $grado -> cod_grado =$request -> get('cod_grado');
       $grado -> nombre_grado =$request -> get('nombre_grado');
       $grado -> descripción_grado =$request -> get('descripción_grado');
       $grado -> cod_nivel =$request -> get('cod_nivel');
       $grado -> cod_colegio =$request -> get('cod_colegio');
       $grado -> condicion = 1;
       $grado -> save();
       return Redirect :: to ('distribucionaulas/grados');
}
public function show($id){
       return view("distribucionaulas.grados.show",["grado" => Grado :: findOrFail($id)]);
     
}
public function seleccion(){
    $colegio= DB::table('colegio') -> where('condicion_colegio', '=','1') ->get();
    $nivel= DB::table('niveleducativo') -> where('condicion', '=','1') ->get();
    return view("distribucionaulas.grados.create",["nivel" => $nivel,"colegio"=>$colegio]);
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
public function edit($id){
    $grado= Grado::findOrFail($id);
    $colegio= DB::table('colegio') -> where('condicion_colegio', '=','1') ->get();
    $nivel= DB::table('niveleducativo') -> where('condicion', '=','1') ->get();
    return view("distribucionaulas.grados.edit",["grado"=>$grado,"cod_grado"=>$id,"colegio" => $colegio,"nivel" => $nivel ]);
    
}
public function update(NivelFormRequest $request,$id){
       $nivel = Nivel :: findOrFail($id);
       $grado -> cod_grado =$request -> get('cod_grado');
       $grado -> nombre_grado =$request -> get('nombre_grado');
       $grado -> descripción_grado =$request -> get('descripción_grado');
       $grado -> cod_nivel =$request -> get('cod_nivel');
       $grado -> cod_colegio =$request -> get('cod_colegio');
       $grado -> condicion = 1;
       $nivel -> update();
       return Redirect :: to ('distribucionaulas/grados');

}
public function destroy($id){
    $grado = Grado :: findOrFail($id);
    $grado -> condicion = 0;
    $grado -> update();
   /* $producto = Producto :: findOrFail($id) -> delete();*/
    return Redirect :: to ('distribucionaulas/grados');
}
}