<?php

namespace SisCol\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use SisCol\Http\Requests\ColegioFormRequest;
use Illuminate\Support\Facades\Redirect;
use SisCol\Colegio;

class ColegioController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request){
         if($request)
         {
             $query=trim($request->get('searchText'));
             $tipodebuscar= trim($request->get('tipodebuscar'));
             if($tipodebuscar==null){
             $colegio=DB::table('colegio')
             ->where('Nombre_colegio','LIKE','%'.$query.'%') 
             ->where('condicion_colegio','=','1') 
             -> orderBy('cod_colegio','asc') 
             -> paginate(5);
             return view('colegio.instituciones.index',["colegio"=>$colegio,"searchText"=>$query,"tipodebuscar" => $tipodebuscar]);
             }
             else{
                
                    $colegio=DB::table('colegio')
                    ->where($tipodebuscar,'LIKE','%'.$query.'%') 
                    ->where('condicion_colegio','=','1') 
                    -> orderBy('cod_colegio','asc') 
                    -> paginate(5);
                    return view('colegio.instituciones.index',["colegio"=>$colegio,"searchText"=>$query,"tipodebuscar" => $tipodebuscar]);
                    
             }
         }
    }
    public function create(){
        return view("colegio.instituciones.create");
 }
 public function store(ColegioFormRequest $request){
        $colegio= new Colegio;
        $colegio -> cod_colegio =$this->codigomaximo();
        $colegio -> Nombre_colegio =$request -> get('Nombre_colegio');
        $colegio -> Dirección =$request -> get('Dirección');
        $colegio -> condicion_colegio = 1;
        $colegio -> save();
        return Redirect :: to ('colegio/instituciones');
 }
 public function codigomaximo(){
    $codmax = DB::table("colegio")->select('cod_colegio')->get();
    //echo $codmax;
    $numeromax = 0;
    foreach($codmax as $cod){
            if($cod->cod_colegio > $numeromax){
            $numeromax = $cod->cod_colegio;
            }
            else{
                $numeromax = $numeromax;
            }
    }
    $nuevoidgrado = $numeromax +1;
    return $nuevoidgrado;
    }
 public function show($id){
        return view("colegio.instituciones.show",["colegio" => Colegio :: findOrFail($id),"codigo" => $id]);
      
 }
 public function vernivel($id){
    return view("colegio.niveleducativo.index",["colegio" => Colegio ::  findOrFail($id),"codigo" => $id]);
}
public function getValidarColegio(Request $request){
    // if($request -> ajax()){
         $nivel=DB::table('colegio')->select("cod_colegio") ->get();
       /* if($nivel == null){
            $nivel == 1;
        }*/
         //echo implode($nivel);
         return response()-> json($nivel);
    // }
 }
 public function edit($id){
     return view("colegio.instituciones.edit",["colegio" => Colegio ::  findOrFail($id),"codigo" => $id]);
 }
 public function update(ColegioFormRequest $request,$id){
        $colegio = Colegio :: findOrFail($id);
        $colegio -> cod_colegio =$request -> get('cod_colegio');
        $colegio -> Nombre_colegio =$request -> get('Nombre_colegio');
        $colegio -> Dirección =$request -> get('Dirección');
        $colegio->update();
        return Redirect :: to ('colegio/instituciones');
 
 }
 public function destroy($id){
     $colegio = Colegio :: findOrFail($id) ;
     $colegio -> condicion_colegio = 0;
     $colegio-> update();
     return Redirect :: to ('colegio/instituciones');
 }
}
