<?php

namespace SisCol\Http\Controllers;


use Illuminate\Http\Request;
use SisCol\Grado;
use SisCol\Nivel;
use SisCol\Colegio;
use SisCol\Curso;
use Illuminate\Support\Facades\Redirect;
use SisCol\Http\Requests\CursoFormRequest;
use Illuminate\Support\Facades\Storage;
use DB;
class CursoController extends Controller
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
    public function getCurso(Request $request,$id){
        if($request -> ajax()){
            $curso=Curso::Curso($id);
            return response()-> json($curso);
        }
    }
    public function getValidaridCurso(Request $request){
        // if($request -> ajax()){
             $nivel=DB::table('curso')->select("CodCurso") ->get();
           /* if($nivel == null){
                $nivel == 1;
            }*/
             //echo implode($nivel);
             return response()-> json($nivel);
        // }
     }
    public function getValidarCurso(Request $request, $id){
        if($request -> ajax()){
            $curso = Curso::ValidarCurso($id);
            return response() -> json($curso);    
    }}
   public function index($codgrado,$codcolegio,$codnivel){        
           
            if($codgrado=='null'){
            $curso=DB::table('curso as cur')
            -> join('gradoestudio as g','g.cod_grado','=','cur.cod_grado')
            -> join('niveleducativo as n','n.cod_nivel','=','cur.cod_nivel')
            -> join('colegio as c','cur.cod_colegio','=','c.cod_colegio')
            ->select('cur.CodCurso','cur.NombreCurso','cur.descripcionCurso','g.cod_grado','g.nombre_grado','n.cod_nivel','n.nombre_nivel','c.cod_colegio','c.Nombre_colegio','cur.updated_at','cur.created_at')
            -> where('cur.cod_colegio', '=',$codcolegio)
            -> where('cur.condicion', '=','1')
            -> orderBy('cur.CodCurso','asc') 
            -> paginate(5000);
            return view('distribucionacademica.cursos.index',["curso"=>$curso,"codigocolegio"=>$codcolegio,"codgrado"=>$codgrado,"codnivel"=>$codnivel]);
        }else{
            $curso=DB::table('curso as cur')
            -> join('gradoestudio as g','g.cod_grado','=','cur.cod_grado')
            -> join('niveleducativo as n','n.cod_nivel','=','cur.cod_nivel')
            -> join('colegio as c','cur.cod_colegio','=','c.cod_colegio')
            ->select('cur.CodCurso','cur.NombreCurso','cur.descripcionCurso','g.cod_grado','g.nombre_grado','n.cod_nivel','n.nombre_nivel','c.cod_colegio','c.Nombre_colegio','cur.updated_at','cur.created_at')
            -> where('g.cod_grado', '=',$codgrado)
            -> where('cur.cod_colegio', '=',$codcolegio)
            -> where('cur.condicion', '=','1')
            -> orderBy('cur.CodCurso','asc') 
            -> paginate(5000);
            return view('distribucionacademica.cursos.index',["curso"=>$curso,"codigocolegio"=>$codcolegio,"codgrado"=>$codgrado,"codnivel"=>$codnivel]);
       }
        
   }
   public function create($id,$codgrado,$codnivel){
       if($codnivel == 'null' && $codgrado=='null'){
       $grado= DB::table('gradoestudio') -> where('condicion', '=','1')-> where('cod_colegio', '=',$id) ->get();
       $colegio= DB::table('colegio') -> where('condicion_colegio', '=','1')-> where('cod_colegio', '=',$id) ->get();
       $nivel= DB::table('niveleducativo') -> where('condicion', '=','1') -> where('cod_colegio', '=',$id)->get();
       return view("distribucionacademica.cursos.create",["grado" => $grado,"colegio" => $colegio,"nivel" => $nivel,"codigocolegio"=>$id,"pcurso"=>0]);
    }
    else{
        if(!is_numeric($codnivel)){
        $grado= DB::table('gradoestudio') -> where('condicion', '=','1')-> where('cod_grado','=',$codgrado) ->get();
        $colegio= DB::table('colegio') -> where('condicion_colegio', '=','1')-> where('cod_colegio','=',$id) ->get();
        $nivel= DB::table('niveleducativo as ni' )->join("gradoestudio as gra","ni.cod_nivel","=","gra.cod_nivel") -> where('ni.condicion', '=','1')-> where('gra.cod_grado', '=',$codgrado)->get();
        return view("distribucionacademica.cursos.create",["grado" => $grado,"colegio" => $colegio,"nivel" => $nivel,"codigocolegio"=>$id,"pcurso"=>1]);
    
    }
    else{
        $grado= DB::table('gradoestudio') -> where('condicion', '=','1')-> where('cod_grado','=',$codgrado) ->get();
        $colegio= DB::table('colegio') -> where('condicion_colegio', '=','1')-> where('cod_colegio','=',$id) ->get();
        $nivel= DB::table('niveleducativo') -> where('condicion', '=','1') -> where("cod_nivel","=",$codnivel) -> where('cod_colegio','=',$id)->get();
        return view("distribucionacademica.cursos.create",["grado" => $grado,"colegio" => $colegio,"nivel" => $nivel,"codigocolegio"=>$id,"pcurso"=>1]);
    }
}
}
public function store(CursoFormRequest $request){
       $curso= new Curso;
       //$curso -> CodCurso =$request -> get('CodCurso');
       $curso -> CodCurso = $this->codigomaximo();
       $curso -> NombreCurso =$request -> get('NombreCurso');
       $curso -> descripcionCurso =$request -> get('descripcionCurso');
       $curso -> cod_grado =$request -> get('cod_grado');
       $curso -> cod_nivel =$request -> get('cod_nivel');
       $curso -> cod_colegio =$request -> get('cod_colegio');
       $curso-> condicion = 1;
       $curso -> save();
       return Redirect::action('CursoController@show',array('id' =>  $curso -> cod_colegio,"nivel"=>$curso -> cod_nivel,"grado"=>$curso -> cod_grado));
}
public function codigomaximo(){
    $codmax = DB::table("curso")->select('CodCurso')->get();
    //echo $codmax;
    $numeromax = 0;
    foreach($codmax as $cod){
            if($cod->CodCurso > $numeromax){
            $numeromax = $cod->CodCurso;
            }
            else{
                $numeromax = $numeromax;
            }
    }
    $nuevoidgrado = $numeromax +1;
    return $nuevoidgrado;
    }
public function show($id,$codnivel,$codgrado){
    return view("distribucionacademica.cursos.show",["curso" =>$id,"grado"=>$codgrado,"nivel"=>$codnivel]);
     
}

public function edit($id,$codcolegio){
    $curso= Curso::findOrFail($id);
    $grado= DB::table('gradoestudio') -> where('condicion', '=','1') -> where('cod_colegio','=',$codcolegio) ->get();
    $colegio= DB::table('colegio') -> where('condicion_colegio', '=','1')  -> where('cod_colegio','=',$codcolegio)->get();
    $nivel= DB::table('niveleducativo') -> where('condicion', '=','1') -> where('cod_colegio','=',$codcolegio) ->get();
    return view("distribucionacademica.cursos.edit",["curso"=>$curso,"grado"=>$grado,"cod_curso"=>$id,"colegio" => $colegio,"nivel" => $nivel ]);
}
public function update(CursoFormRequest $request,$id){
       $curso = Curso :: findOrFail($id);
       $curso -> CodCurso =$request -> get('CodCurso');
       $curso -> NombreCurso =$request -> get('NombreCurso');
       $curso -> descripcionCurso =$request -> get('descripcionCurso');
       $curso -> cod_grado =$request -> get('cod_grado');
       $curso -> cod_nivel =$request -> get('cod_nivel');
       $curso -> cod_colegio =$request -> get('cod_colegio');
       $curso-> condicion = 1;
       $curso -> update();
       return Redirect::action('CursoController@show',array('id' =>  $curso -> cod_colegio,"nivel"=>$curso -> cod_nivel,"grado"=>$curso -> cod_grado));

}
public function destroy($id){
    $curso = Curso :: findOrFail($id);
    $curso -> condicion = 0;
    $curso ->update();
   /* $producto = Producto :: findOrFail($id) -> delete();*/
   return Redirect::action('CursoController@show',array('id' =>  $curso -> cod_colegio,"grado"=>'null',"nivel"=>'null'));

}
}