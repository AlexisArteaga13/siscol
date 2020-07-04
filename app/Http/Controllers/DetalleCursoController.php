<?php

namespace SisCol\Http\Controllers;


use Illuminate\Http\Request;
use SisCol\Grado;
use SisCol\Nivel;
use SisCol\Colegio;
use SisCol\Curso;
use SisCol\Docente;
use SisCol\DetalleCurso;
use Illuminate\Support\Facades\Redirect;
use SisCol\Http\Requests\DetalleCursoFormRequest;
use Illuminate\Support\Facades\Storage;
use DB;
class DetalleCursoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    
   public function index($codcurso,$docente,$codcolegio,$codgrado,$namenivel){        
           
            if($codcurso =='null'){
                if($docente=='null'){
            $curso=DB::table('cursosdeprofesor as detail')
            -> join('curso as cur','detail.CodCurso','=','cur.CodCurso')
            -> join('gradoestudio as g','g.cod_grado','=','detail.cod_grado')
            -> join('niveleducativo as n','n.cod_nivel','=','detail.cod_nivel')
            -> join('seccion as secc','secc.cod_sección','=','detail.seccion')
            -> join('colegio as c','detail.cod_colegio','=','c.cod_colegio')
            -> join('docente as doc','detail.DNIDocente','=','doc.DNIDocente')
            ->select('detail.id_detalle','detail.CodCurso','secc.cod_sección','cur.NombreCurso','secc.nombre_seccion','doc.DNIDocente','doc.ApellidosDocente','doc.NombreDocente','g.cod_grado','g.nombre_grado','n.cod_nivel','n.nombre_nivel','c.cod_colegio','c.Nombre_colegio','detail.updated_at','detail.created_at')
            
            -> where('detail.cod_colegio', '=',$codcolegio)
            -> where('detail.condicion', '=','1')
            -> orderBy('cur.NombreCurso','asc') 
            ->paginate(500000);
            return view('distribucionacademica.detallecursos.index',["curso"=>$curso,"codigocolegio"=>$codcolegio,"codgrado"=>$codgrado,"codnivel"=>$namenivel,"codcurso"=>$codcurso]);
        }else{
            $curso=DB::table('cursosdeprofesor as detail')
            -> join('curso as cur','detail.CodCurso','=','cur.CodCurso')
            -> join('gradoestudio as g','g.cod_grado','=','detail.cod_grado')
            -> join('niveleducativo as n','n.cod_nivel','=','detail.cod_nivel')
            -> join('colegio as c','detail.cod_colegio','=','c.cod_colegio')
            -> join('seccion as secc','secc.cod_sección','=','detail.seccion')
            -> join('docente as doc','detail.DNIDocente','=','doc.DNIDocente')
            ->select('detail.id_detalle','cur.CodCurso','secc.cod_sección','cur.NombreCurso','doc.DNIDocente','secc.nombre_seccion','doc.ApellidosDocente','doc.NombreDocente','g.cod_grado','g.nombre_grado','n.cod_nivel','n.nombre_nivel','c.cod_colegio','c.Nombre_colegio','detail.updated_at','detail.created_at')
            -> where('detail.cod_colegio', '=',$codcolegio)
            -> where('detail.DNIDocente', '=',$docente)
            -> where('detail.condicion', '=','1')
            -> orderBy('cur.NombreCurso','asc') 
            ->paginate(500000);
            return view('distribucionacademica.detallecursos.index',["curso"=>$curso,"codigocolegio"=>$codcolegio,"codgrado"=>$codgrado,"codnivel"=>$namenivel,"codcurso"=>$codcurso]);
         }
    }
    
    else{
        if($codcolegio != 'null'){
        $curso=DB::table('cursosdeprofesor as detail')
            -> join('curso as cur','detail.CodCurso','=','cur.CodCurso')
            -> join('gradoestudio as g','g.cod_grado','=','detail.cod_grado')
            -> join('niveleducativo as n','n.cod_nivel','=','detail.cod_nivel')
            -> join('colegio as c','detail.cod_colegio','=','c.cod_colegio')
            -> join('seccion as secc','secc.cod_sección','=','detail.seccion')
            -> join('docente as doc','detail.DNIDocente','=','doc.DNIDocente')
            ->select('detail.id_detalle','detail.CodCurso','secc.cod_sección','cur.NombreCurso','doc.DNIDocente','secc.nombre_seccion','doc.ApellidosDocente','doc.NombreDocente','g.cod_grado','g.nombre_grado','n.cod_nivel','n.nombre_nivel','c.cod_colegio','c.Nombre_colegio','detail.updated_at','detail.created_at')
            -> where('detail.cod_colegio', '=',$codcolegio)
           
            -> where('detail.CodCurso','=',$codcurso)
            -> where('detail.condicion', '=','1')
            -> orderBy('cur.NombreCurso','asc') 
            ->paginate(500000);
            return view('distribucionacademica.detallecursos.index',["curso"=>$curso,"codigocolegio"=>$codcolegio,"codgrado"=>$codgrado,"codnivel"=>$namenivel,"codcurso"=>$codcurso]);
           }
           else{
            $curso=DB::table('cursosdeprofesor as detail')
            -> join('curso as cur','detail.CodCurso','=','cur.CodCurso')
            -> join('gradoestudio as g','g.cod_grado','=','detail.cod_grado')
            -> join('niveleducativo as n','n.cod_nivel','=','detail.cod_nivel')
            -> join('colegio as c','detail.cod_colegio','=','c.cod_colegio')
            -> join('seccion as secc','secc.cod_sección','=','detail.seccion')
            -> join('docente as doc','detail.DNIDocente','=','doc.DNIDocente')
            ->select('detail.id_detalle','detail.CodCurso','secc.cod_sección','cur.NombreCurso','doc.DNIDocente','secc.nombre_seccion','doc.ApellidosDocente','doc.NombreDocente','g.cod_grado','g.nombre_grado','n.cod_nivel','n.nombre_nivel','c.cod_colegio','c.Nombre_colegio','detail.updated_at','detail.created_at')
            
           
            -> where('detail.CodCurso','=',$codcurso)
            -> where('detail.condicion', '=','1')
            -> orderBy('cur.NombreCurso','asc') 
            ->paginate(500000);
            return view('distribucionacademica.detallecursos.index',["curso"=>$curso,"codigocolegio"=>$codcolegio,"codgrado"=>$codgrado,"codnivel"=>$namenivel,"codcurso"=>$codcurso]);
          
           }
        }
   }
   public function create($id,$codgrado,$namenivel,$codcurso){
       if($codcurso == "null" && $id !="null"){
        $anestudio=DB::table('añoescolar')->where('condicion_año','=',"1")->get();
        $curso= DB::table('curso') -> where('condicion', '=','1')-> where('cod_colegio', '=',$id) ->get();
        $docente= DB::table('datoscontrato as cont') -> join('docente as doc','cont.DNIDocente','=','doc.DNIDocente')-> where('doc.condicion', '=','1')-> where('cont.cod_colegio', '=',$id) ->get();
        $grado= DB::table('gradoestudio') -> where('condicion', '=','1')-> where('cod_colegio', '=',$id) ->get();
       $colegio= DB::table('colegio') -> where('condicion_colegio', '=','1')-> where('cod_colegio', '=',$id) ->get();
       $nivel= DB::table('niveleducativo') -> where('condicion', '=','1') -> where('cod_colegio', '=',$id)->get();
       $seccion= DB::table('seccion') -> where('condicion', '=','1') -> where('cod_colegio', '=',$id)->get();
       return view("distribucionacademica.detallecursos.create",["anestudio"=>$anestudio,"curso"=>$curso,"seccion"=>$seccion,"docente"=>$docente,"grado" => $grado,"colegio" => $colegio,"nivel" => $nivel,"codigocolegio"=>$id,"pdetalle"=>0]);
}
else{
    if($id=="null"){
        $anestudio=DB::table('añoescolar')->where('condicion_año','=',"1")->get();
        $curso= DB::table('curso') -> where('condicion', '=','1')-> where('cod_colegio', '=',$id) ->get();
        $docente= DB::table('datoscontrato as cont') -> join('docente as doc','cont.DNIDocente','=','doc.DNIDocente')-> join("curso as cur","cur.cod_colegio","=","cont.cod_colegio")-> where('doc.condicion', '=','1')-> where('cur.CodCurso',"=",$codcurso) ->get();
        $grado= DB::table('gradoestudio') -> where('condicion', '=','1')-> where('cod_colegio', '=',$id) ->get();
       $colegio= DB::table('colegio as col')->join("curso as cur","cur.cod_colegio","=","col.cod_colegio") -> where('condicion_colegio', '=','1')-> where('cur.CodCurso', '=',$codcurso) ->get();
       $nivel= DB::table('niveleducativo') -> where('condicion', '=','1') -> where('cod_colegio', '=',$id)->get();
       $seccion= DB::table('seccion') -> where('condicion', '=','1') -> where('cod_colegio', '=',$id)->get();
       return view("distribucionacademica.detallecursos.create",["anestudio"=>$anestudio,"curso"=>$curso,"seccion"=>$seccion,"docente"=>$docente,"grado" => $grado,"colegio" => $colegio,"nivel" => $nivel,"codigocolegio"=>$id,"pdetalle"=>0]);

    }
    else{

    
    $anestudio=DB::table('añoescolar')->where('situacion','=',"1")->get();
    $curso= DB::table('curso') -> where('condicion', '=','1')-> where('CodCurso','=',$codcurso) ->get();
    $docente= DB::table('datoscontrato as cont') -> join('docente as doc','cont.DNIDocente','=','doc.DNIDocente')-> where('doc.condicion', '=','1')-> where('cont.cod_colegio', '=',$id) ->get();
    $grado= DB::table('gradoestudio') -> where('condicion', '=','1')-> where('cod_grado', '=',$codgrado) ->get();
    $colegio= DB::table('colegio') -> where('condicion_colegio', '=','1')-> where('cod_colegio', '=',$id) ->get();
   $nivel= DB::table('niveleducativo') -> where('condicion', '=','1') -> where('cod_nivel', '=',$namenivel,"OR","nombre_nivel",'=',$namenivel)->get();
   $seccion= DB::table('seccion as secc') -> join('gradoestudio as gra','gra.cod_grado','=','secc.cod_grado')-> where('secc.condicion', '=','1') -> where('gra.cod_grado', '=',$codgrado)->get();
   return view("distribucionacademica.detallecursos.create",["anestudio"=>$anestudio,"seccion"=>$seccion,"curso"=>$curso,"docente"=>$docente,"grado" => $grado,"colegio" => $colegio,"nivel" => $nivel,"codigocolegio"=>$id,"pdetalle"=>1]);
}
}
}
public function store(DetalleCursoFormRequest $request){
       $curso= new DetalleCurso;
       echo $this->obtneranencurso();
       $curso -> CodCurso =$request -> get('CodCurso');
       $curso -> seccion =$request -> get('cod_seccion');
       $curso -> cod_grado =$request -> get('cod_grado');
       $curso -> cod_nivel =$request -> get('cod_nivel');
       $curso -> cod_colegio =$request -> get('cod_colegio');
       $curso -> DNIDocente =$request -> get('DNIDocente');
       //$curso -> cod_AñoEscolar =$request -> get('anescolar');
       $curso -> cod_AñoEscolar =$this->obtneranencurso();
       $curso-> condicion = 1;
       $curso -> save();
       return Redirect::action('DetalleCursoController@show',array('id' =>  $curso -> cod_colegio));
}
public function obtneranencurso(){
    $anescolar = DB::table("añoescolar")->where("situacion","=","1")->get();
    //echo $codmax;
    $idaño;
    foreach($anescolar as $cod){
        echo $cod->cod_AñoEscolar;
    }
    return $cod->cod_AñoEscolar;
    //return $nuevoidgrado;
    }
public function show($id){
    return view("distribucionacademica.detallecursos.show",["curso" =>$id]);
     
}
public function edit($id,$codcolegio){
    $detallecurso= DetalleCurso::findOrFail($id);
   // $anestudio=DB::table('añoescolar')->where('condicion','=',1)->get();"anestudio"=>$anestudio,
    $seccion=DB::table('seccion')->where('condicion','=',1) ->where('cod_colegio','=',$codcolegio)->get();
    $curso= DB::table('curso') -> where('condicion', '=','1')-> where('cod_colegio','=',$codcolegio) ->get();
    $docente= DB::table('datoscontrato as cont') -> join('docente as doc','cont.DNIDocente','=','doc.DNIDocente')-> where('doc.condicion', '=','1')-> where('cont.cod_colegio', '=',$codcolegio) ->get();
    $grado= DB::table('gradoestudio') -> where('condicion', '=','1') -> where('cod_colegio','=',$codcolegio) ->get();
    $colegio= DB::table('colegio') -> where('condicion_colegio', '=','1')  -> where('cod_colegio','=',$codcolegio)->get();
    $nivel= DB::table('niveleducativo') -> where('condicion', '=','1') -> where('cod_colegio','=',$codcolegio) ->get();
    return view("distribucionacademica.detallecursos.edit",["seccion"=>$seccion,"docente"=>$docente,"detallecurso"=>$detallecurso,"curso"=>$curso,"grado"=>$grado,"cod_curso"=>$id,"colegio" => $colegio,"nivel" => $nivel ]);
}
public function obteneranestudio(Request $request){
    // if($request -> ajax()){
         $nivel=DB::table('añoescolar')->select("cod_AñoEscolar")->where('situacion','=','1') ->get();
       /* if($nivel == null){
            $nivel == 1;
        }*/
         //echo implode($nivel);
         return response()-> json($nivel);
    // }
 }
 public function obteneranestudiocontrol(){
    // if($request -> ajax()){
         $nivel=DB::table('añoescolar')->select("cod_AñoEscolar")->where('situacion','=','1') ->get();
       /* if($nivel == null){
            $nivel == 1;
        }*/
         //echo implode($nivel);
         return implode($nivel);
    // }
 }
public function update(DetalleCursoFormRequest $request,$id){
       $curso = DetalleCurso :: findOrFail($id);
       $curso -> CodCurso =$request -> get('CodCurso');
       $curso -> seccion =$request -> get('seccion');
       $curso -> cod_grado =$request -> get('cod_grado');
       $curso -> cod_nivel =$request -> get('cod_nivel');
       $curso -> cod_colegio =$request -> get('cod_colegio');
       $curso -> DNIDocente =$request -> get('DNIDocente');
       $curso -> cod_AñoEscolar =$request -> get('anescolar');
       $curso-> condicion = 1;
       $curso -> update();
       return Redirect::action('DetalleCursoController@show',array('id' =>  $curso -> cod_colegio));

}
public function destroy($id){
    $curso = DetalleCurso :: findOrFail($id);
    $curso -> condicion = 0;
    $curso -> update();
   /* $producto = Producto :: findOrFail($id) -> delete();*/
   return Redirect::action('DetalleCursoController@show',array('id' =>  $curso -> cod_colegio));

}
}