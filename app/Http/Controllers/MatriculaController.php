<?php

namespace SisCol\Http\Controllers;


use Illuminate\Http\Request;
use SisCol\Grado;
use SisCol\Nivel;
use SisCol\Colegio;
use SisCol\Curso;
use SisCol\Docente;
use SisCol\Matricula;
use SisCol\AnEscolar;
use SisCol\Alumno;
use Illuminate\Support\Facades\Redirect;
use SisCol\Http\Requests\MatriculaFormRequest;
use Illuminate\Support\Facades\Storage;
use DB;
class MatriculaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function getValidarMatricula(Request $request,$id){
        if($request -> ajax()){
            $matricula=Matricula::ValidarMatricula($id);
            return response()-> json($matricula);
        }
    }
   public function index($codcolegio){        
           
            if($codcolegio !='null'){
            $matricula=DB::table('matrícula as mat')
            -> join('añoescolar as an','an.cod_AñoEscolar','=','mat.cod_AñoEscolar')
            -> join('seccion as sec','sec.cod_sección','=','mat.cod_sección')
            -> join('gradoestudio as g','g.cod_grado','=','mat.cod_grado')
            -> join('niveleducativo as n','n.cod_nivel','=','mat.cod_nivel')
            -> join('colegio as c','mat.cod_colegio','=','c.cod_colegio')
            -> join('alumno as al','mat.CodAlumno','=','al.CodAlumno')
            ->select('mat.cod_matricula','mat.cod_AñoEscolar','an.nombre_añoescolar','mat.detalles_matricula','mat.cod_sección','sec.nombre_seccion','al.CodAlumno','al.NombreAlumno','al.ApellidoAlumno','g.cod_grado','g.nombre_grado','n.cod_nivel','n.nombre_nivel','c.cod_colegio','c.Nombre_colegio','mat.updated_at','mat.created_at')
            -> where('mat.cod_colegio', '=',$codcolegio)
            -> where('mat.condicion', '=',1)
            -> orderBy('an.cod_AñoEscolar','asc') 
            ->paginate(500000);
            return view('distribucionacademica.matriculas.index',["matricula"=>$matricula,"codigocolegio"=>$codcolegio]);
        }
   }
   public function create($id){
       
        $anescolar= DB::table('añoescolar') -> where('condicion_año', '=','1')-> where('situacion', '=','1') ->get();  
        $seccion= DB::table('seccion') -> where('condicion', '=','1')-> where('cod_colegio', '=',$id) ->get();
       $grado= DB::table('gradoestudio') -> where('condicion', '=','1')-> where('cod_colegio', '=',$id) ->get();
       $colegio= DB::table('colegio') -> where('condicion_colegio', '=','1')-> where('cod_colegio', '=',$id) ->get();
       $nivel= DB::table('niveleducativo') -> where('condicion', '=','1') -> where('cod_colegio', '=',$id)->get();
       return view("distribucionacademica.matriculas.create",["anescolar"=>$anescolar,"seccion"=>$seccion,"grado" => $grado,"colegio" => $colegio,"nivel" => $nivel,"codigocolegio"=>$id]);
}
public function store(MatriculaFormRequest $request){
       $matricula= new Matricula;
      // echo $this->codigomaximo();
       //$matricula -> cod_matricula =$request -> get('cod_matricula');
       $matricula -> cod_matricula =$this->codigomaximo();
       $matricula -> cod_AñoEscolar =$request -> get('cod_AñoEscolar');
       $matricula -> detalles_matricula =$request -> get('detalles_matricula');
       $matricula -> cod_sección =$request -> get('cod_sección');
       $matricula -> cod_grado =$request -> get('cod_grado');
       $matricula -> cod_nivel =$request -> get('cod_nivel');
       $matricula -> cod_colegio =$request -> get('cod_colegio');
       $matricula -> CodAlumno =$request -> get('CodAlumno');
       $matricula -> condicion ="1";
       $cod_AñoEscolar=$request -> get('cod_AñoEscolar');
       $CodAlumno = $request -> get('CodAlumno');
       $validar = $this->metodoparavalidarprimerregistro($cod_AñoEscolar,$CodAlumno);
        if($validar == "noexiste"){
           // echo $validar;
            $matricula -> save();
            return Redirect::action('MatriculaController@show',array('id' => $matricula -> cod_colegio))->with('success','FELICITACIONES, SU MATRÍCULA ES CORRECTA.');
        
        }
        else{
           // echo $validar;
            return Redirect::action('MatriculaController@show',array('id' => $matricula -> cod_colegio))->with('matriculado','SU MATRÍCULA NO PROCEDE, EL ALUMNO YA ESTÁ MATRICULADO EN ESTE AÑO ESCOLAR.');
        }
       }
public function metodoparavalidarprimerregistro($cod_AñoEscolar,$CodAlumno){
    if(DB::table("matrícula")->where("cod_AñoEscolar","=",$cod_AñoEscolar,"AND","CodAlumno","=",$CodAlumno)->first()){
        //echo $seccionma."asa";
       // echo "okey";
        return "existe";
    }
    else{
       // echo "aca";
        return "noexiste";
    }
 }

public function codigomaximo(){
    $codmax = DB::table("matrícula")->select('cod_matricula')->get();
    //echo $codmax;
    $numeromax = 0;
    foreach($codmax as $cod){
            if($cod->cod_matricula > $numeromax){
            $numeromax = $cod->cod_matricula;
            }
            else{
                $numeromax = $numeromax;
            }
    }
    $nuevoidgrado = $numeromax +1;
    return str_pad($nuevoidgrado,8,"0", STR_PAD_LEFT);
    }
public function show($id){
    return view("distribucionacademica.matriculas.show",["colegio" =>$id]);
     
}
public function getValidaridmatricula(Request $request){
    // if($request -> ajax()){
         $nivel=DB::table('matrícula')->select("cod_matricula") ->get();
       /* if($nivel == null){
            $nivel == 1;
        }*/
         //echo implode($nivel);
         return response()-> json($nivel);
    // }
 }
public function edit($id,$codcolegio){
    $matricula= Matricula::findOrFail($id);
    $anescolar= DB::table('añoescolar')  ->get();  
    $seccion= DB::table('seccion') -> where('condicion', '=','1')-> where('cod_colegio', '=',$codcolegio) ->get();
    $alumno= DB::table('datoscontrato as cont') -> join('docente as doc','cont.DNIDocente','=','doc.DNIDocente')-> where('doc.condicion', '=','1')-> where('cont.cod_colegio', '=',$id) ->get();
    $grado= DB::table('gradoestudio') -> where('condicion', '=','1')-> where('cod_colegio', '=',$codcolegio) ->get();
   $colegio= DB::table('colegio') -> where('condicion_colegio', '=','1')-> where('cod_colegio', '=',$codcolegio) ->get();
   $nivel= DB::table('niveleducativo') -> where('condicion', '=','1') -> where('cod_colegio', '=',$codcolegio)->get();
   return view("distribucionacademica.matriculas.edit",["codmatricula"=>$id,"matricula"=>$matricula,"alumno"=>$alumno,"anescolar"=>$anescolar,"seccion"=>$seccion,"grado" => $grado,"colegio" => $colegio,"nivel" => $nivel,"codigocolegio"=>$codcolegio]);
}
public function update(MatriculaFormRequest $request,$id){
       $matricula = Matricula :: findOrFail($id);
       $matricula -> cod_matricula =$request -> get('cod_matricula');
       $matricula -> cod_AñoEscolar =$request -> get('cod_AñoEscolar');
       $matricula -> detalles_matricula =$request -> get('detalles_matricula');
       $matricula -> cod_sección =$request -> get('cod_sección');
       $matricula -> cod_grado =$request -> get('cod_grado');
       $matricula -> cod_nivel =$request -> get('cod_nivel');
       $matricula -> cod_colegio =$request -> get('cod_colegio');
       $matricula -> CodAlumno =$request -> get('CodAlumno');
       $matricula -> update();
       return Redirect::action('MatriculaController@show',array('id' =>  $matricula -> cod_colegio));
    }
public function destroy($id,$codigocolegio){
    $matricula = Matricula :: findOrFail($id);
    $matricula ->condicion = "0";
    $matricula -> update();

   /* $producto = Producto :: findOrFail($id) -> delete();*/
   return Redirect::action('MatriculaController@show',array('colegio' => $codigocolegio));
}
}