<?php

namespace SisCol\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use SisCol\Http\Requests\AnEscolarFormRequest;
use Illuminate\Support\Facades\Redirect;
use SisCol\AnEscolar;
class AnEscolarController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request){
         if($request)
         {
             $query=trim($request->get('searchText'));
             $anescolar=DB::table('añoescolar')
             ->where('nombre_añoescolar','LIKE','%'.$query.'%') 
             ->where('condicion_año','=','1') 
             -> orderBy('cod_AñoEscolar','asc') 
             -> paginate(5);
             return view('colegio.anescolar.index',["anescolar"=>$anescolar,"searchText"=>$query]);
             
         }
    }
    public function create(){
        return view("colegio.anescolar.create");
 }
 public function store(AnEscolarFormRequest $request){
        $anescolar= new AnEscolar;
       // $anescolar -> cod_AñoEscolar =$request -> get('cod_AñoEscolar');
       $anescolar -> cod_AñoEscolar =$this->codigomaximo();
        $anescolar -> nombre_añoescolar =$request -> get('nombre_añoescolar');
        $anescolar -> descripción_añoescolar =$request -> get('descripción_añoescolar');
        $anescolar -> condicion_año = 1;
        $anescolar -> situacion = "1";
        $anescolar -> save();
        return Redirect :: to ('colegio/anescolar');
 }
 public function codigomaximo(){
    $codmax = DB::table("añoescolar")->select('cod_AñoEscolar')->get();
    //echo $codmax;
    $numeromax = 0;
    foreach($codmax as $cod){
            if($cod->cod_AñoEscolar > $numeromax){
            $numeromax = $cod->cod_AñoEscolar;
            }
            else{
                $numeromax = $numeromax;
            }
    }
    $nuevoidgrado = $numeromax +1;
    return $nuevoidgrado;
    }
 public function show($id){
        return view("colegio.anescolar.show",["anescolar" => AnEscolar :: findOrFail($id)]);
      
 }
 public function getValidarAnEstudio(Request $request){
   // if($request -> ajax()){
        $nivel=DB::table('añoescolar')->select("cod_AñoEscolar")->where('condicion_año','=','1') ->get();
      /* if($nivel == null){
           $nivel == 1;
       }*/
        //echo implode($nivel);
        return response()-> json($nivel);
   // }
}
 public function edit($id){
     return view("colegio.anescolar.edit",["anescolar" => AnEscolar ::  findOrFail($id),"codigo" => $id]);
 }
 public function update(AnEscolarFormRequest $request,$id){
        $anescolar = AnEscolar :: findOrFail($id);
        $anescolar -> cod_AñoEscolar =$request -> get('cod_AñoEscolar');
        $anescolar -> nombre_añoescolar =$request -> get('nombre_añoescolar');
        $anescolar -> descripción_añoescolar =$request -> get('descripción_añoescolar');
        $anescolar -> situacion =$request -> get('situacion');
        $anescolar -> update();
        return Redirect :: to ('colegio/anescolar');
 
 }
 public function destroy($id){
     $anescolar = AnEscolar :: findOrFail($id) ;
     $anescolar -> condicion_año = 0;
     $anescolar -> update();
     return Redirect :: to ('colegio/anescolar');
 }
}
