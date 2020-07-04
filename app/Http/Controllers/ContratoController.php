<?php

namespace SisCol\Http\Controllers;


use Illuminate\Http\Request;
use SisCol\Contrato;
use SisCol\Colegio;
use SisCol\Docente;
use Illuminate\Support\Facades\Redirect;
use SisCol\Http\Requests\ContratoFormRequest;
use Illuminate\Support\Facades\Storage;

use DB;
class ContratoController extends Controller
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

    public function getValidaridcontrato(Request $request){
        // if($request -> ajax()){
             $nivel=DB::table('datoscontrato')->select("CodContrato") ->get();
           /* if($nivel == null){
                $nivel == 1;
            }*/
             //echo implode($nivel);
             return response()-> json($nivel);
        // }
     }
   public function index(Request $request,$codcolegio){
    if($codcolegio =='null'){
        if($request != null )
        {
            $query=trim($request->get('searchText'));
            $tipodebuscar= trim($request->get('tipodebuscar'));
            if($tipodebuscar==null){
            $contrato=DB::table('datoscontrato as d')
            -> join('colegio as c','d.cod_colegio','=','c.cod_colegio')
            -> join('docente as p','p.DNIDocente','=','d.DNIDocente') 
            ->select('d.CodContrato','d.cod_colegio','c.Nombre_colegio','p.DNIDocente','p.NombreDocente','p.ApellidosDocente','d.DetallesContrato','d.updated_at','d.created_at')
            ->where('d.CodContrato','LIKE','%'.$query.'%') 
            -> where('d.condicion', '=','1')
            -> orderBy('d.CodContrato','asc') 
            -> paginate(9999999);
            return view('personaldocente.contratos.index',["colegio"=>'null',"contrato"=>$contrato,"searchText"=>$query,"tipodebuscar"=>$tipodebuscar]);
        }else{
            $contrato=DB::table('datoscontrato as d')
            -> join('colegio as c','d.cod_colegio','=','c.cod_colegio')
            -> join('docente as p','p.DNIDocente','=','d.DNIDocente') 
            ->select('d.CodContrato','d.cod_colegio','c.Nombre_colegio','p.DNIDocente','p.NombreDocente','p.ApellidosDocente','d.DetallesContrato','d.updated_at','d.created_at')
            ->where($tipodebuscar,'LIKE','%'.$query.'%') 
            -> where('d.condicion', '=','1')
            -> orderBy('d.CodContrato','asc') 
            -> paginate(9999999);
            return view('personaldocente.contratos.index',["colegio"=>'null',"contrato"=>$contrato,"searchText"=>$query,"tipodebuscar"=>$tipodebuscar]);
        }
        }
    }
    else{
        if($request==null){
            $contrato=DB::table('datoscontrato as d')
            -> join('colegio as c','d.cod_colegio','=','c.cod_colegio')
            -> join('docente as p','p.DNIDocente','=','d.DNIDocente') 
            ->select('d.CodContrato','d.cod_colegio','c.Nombre_colegio','p.DNIDocente','p.NombreDocente','p.ApellidosDocente','d.DetallesContrato','d.updated_at','d.created_at')
            ->where('d.cod_colegio','LIKE',$codcolegio) 
            -> where('d.condicion', '=','1')
            -> orderBy('d.CodContrato','asc') 
            -> paginate(999999);
            return view('personaldocente.contratos.index',["colegio"=>$codcolegio,"contrato"=>$contrato,"searchText"=>'',"tipodebuscar"=>'d.CodContrato']);
        }else{
            $query=trim($request->get('searchText'));
            $tipodebuscar= trim($request->get('tipodebuscar'));
            if($tipodebuscar==null){
            $contrato=DB::table('datoscontrato as d')
            -> join('colegio as c','d.cod_colegio','=','c.cod_colegio')
            -> join('docente as p','p.DNIDocente','=','d.DNIDocente') 
            ->select('d.CodContrato','d.cod_colegio','c.Nombre_colegio','p.DNIDocente','p.NombreDocente','p.ApellidosDocente','d.DetallesContrato','d.updated_at','d.created_at')
            ->where('d.CodContrato','LIKE','%'.$query.'%') 
            ->where('d.cod_colegio','LIKE',$codcolegio) 
            -> where('d.condicion', '=','1')
            -> orderBy('d.CodContrato','asc') 
            -> paginate(9999999);
            return view('personaldocente.contratos.index',["colegio"=>$codcolegio,"contrato"=>$contrato,"searchText"=>$query,"tipodebuscar"=>$tipodebuscar]);
     
            
       
        
        }
    }

    }}
   public function create($codcolegio){
       if($codcolegio=='null'){
           $colegio= DB::table('colegio') -> where('condicion_colegio', '=','1') ->get();
        $docente= DB::table('docente') -> where('condicion', '=','1') ->get();
       }
       else{
        $colegio= DB::table('colegio') -> where('cod_colegio', '=',$codcolegio) -> where('condicion_colegio', '=','1') ->get();
        $docente= DB::table('docente') -> where('condicion', '=','1') ->get();
       }
        return view("personaldocente.contratos.create",["colegio" => $colegio,"docente" => $docente]);
}
public function store(ContratoFormRequest $request){
       $contrato= new Contrato;
       //$contrato -> CodContrato =$request -> get('CodContrato');
       $contrato -> CodContrato =$this->codigomaximo();
       $contrato -> DNIDocente =$request -> get('DNIDocente');
       $contrato -> DetallesContrato =$request -> get('DetallesContrato');
       $contrato -> cod_colegio =$request -> get('cod_colegio');
       $contrato -> condicion = 1;
       $contrato -> save();
       return Redirect::action('ContratoController@index',array('colegio' => $contrato -> cod_colegio));
}
public function codigomaximo(){
    $codmax = DB::table("datoscontrato")->select('CodContrato')->get();
    //echo $codmax;
    $numeromax = 0;
    foreach($codmax as $cod){
            if($cod->CodContrato > $numeromax){
            $numeromax = $cod->CodContrato;
            }
            else{
                $numeromax = $numeromax;
            }
    }
    $nuevoidgrado = $numeromax +1;
    return str_pad($nuevoidgrado,8,"0", STR_PAD_LEFT);
    }
public function show($id){
       return view("personaldocente.contratos.show",["contrato" => Contrato :: findOrFail($id)]);
     
}

public function edit($id){
    $contrato= Contrato::findOrFail($id);
    $colegio= DB::table('colegio') -> where('condicion_colegio', '=','1') ->get();
    $docente= DB::table('docente') -> where('condicion', '=','1') ->get();
    return view("personaldocente.contratos.edit",["contrato"=>$contrato,"codigo"=>$id,"colegio" => $colegio,"docente" => $docente ]);
    
}
public function update(ContratoFormRequest $request,$id){
       $contrato = Contrato :: findOrFail($id);
       $contrato -> CodContrato =$request -> get('CodContrato');
       $contrato -> DNIDocente =$request -> get('DNIDocente');
       $contrato -> DetallesContrato =$request -> get('DetallesContrato');
       $contrato -> cod_colegio =$request -> get('cod_colegio');
      
       $contrato -> condicion = 1;
       $contrato -> update();
       return Redirect::action('ContratoController@index',array('colegio' => $contrato -> cod_colegio));

}
public function destroy($id,$codcolegio){
    $contrato = Contrato :: findOrFail($id) -> delete();
   // $contrato -> condicion = 0;
    //$contrato -> update();
   /* $producto = Producto :: findOrFail($id) -> delete();*/
   return Redirect::action('ContratoController@index',array('colegio' => $codcolegio));
}
}
