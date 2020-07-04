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
use SisCol\Nota;
use Illuminate\Support\Facades\Redirect;
use SisCol\Http\Requests\MatriculaFormRequest;
use SisCol\Http\Requests\NotaFormRequest;
use Illuminate\Support\Facades\Storage;
use DB;
class VerAlumnosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function versusalumnos($id_detalle,$codcurso,$namedoc,$codseccion){
        $alumnos = DB::table('cursosdeprofesor as c')
        ->join('notas as not','not.id_detalle','=','c.id_detalle')
        -> join('matrícula as mat','mat.cod_matricula','=','not.cod_matricula')
        -> join('añoescolar as anes','mat.cod_AñoEscolar','=','anes.cod_AñoEscolar')
        -> join('seccion as secc','mat.cod_sección','=','secc.cod_sección')
        -> join('alumno as al','al.CodAlumno','=','mat.CodAlumno')
        -> select ('not.idnota','not.id_detalle','c.CodCurso','al.CodAlumno','not.cod_matricula','mat.cod_AñoEscolar','anes.nombre_añoescolar','secc.nombre_seccion','al.ApellidoAlumno','al.NombreAlumno','mat.cod_sección','not.NotaPrimBim','not.NotaSegunBim','not.NotaTercerBim','not.NotaCuartoBim','not.NotaFinal','not.updated_at','not.created_at')
        -> where('c.id_detalle','=',$id_detalle)
        ->orderBy('al.ApellidoAlumno')
        ->paginate(99999999)
        ;
        return view('distribucionacademica.susalumnos.versusalumnos',["alumnos"=>$alumnos,"detalle"=>$id_detalle,"codcurso"=>$codcurso,"namedoc"=>$namedoc,"seccion"=>$codseccion]);
    }
    public function nuevoalumnodecurso($id_detalle,$seccion){
        return view('distribucionacademica.susalumnos.crearsualumno',["id_detalle"=>$id_detalle,"seccion"=>$seccion]);
   
    }
    public function store(NotaFormRequest $request){
        $nota= new Nota;
        $nota -> id_detalle =$request->get('id_detalle');
        $iddetalle= $request->get('id_detalle');
        $seccion=$request->get('seccion');
        $codcurso = $request ->get('codcurso');
        $nota -> cod_matricula =$request -> get('cod_matricula');
        $codmatricula = $request ->get('cod_matricula');
        echo $seccion;
        echo $codmatricula;
        $verexistencia= $this->metodoparavalidarprimerregistro($codmatricula,$iddetalle);
        $validar = $this->metodoparacompararseccion($codmatricula,$seccion);
        /*echo $validar;*/
        if($validar == "okey" && $verexistencia == "noexiste"){
            echo $validar;
            $nota -> save();
           return Redirect::action('VerAlumnosController@versusalumnos',array('id' =>  $nota->id_detalle,"null","null","null"))->with('success','FELICITACIONES, ALUMNO REGISTRADO.');
        }
      else{
          if($verexistencia == "existe"){
            return Redirect::action('VerAlumnosController@versusalumnos',array('id' =>  $nota->id_detalle,"null","null","null"))->with('msjexistencia','EL ALUMNO YA ESTÁ MATRICULADO EN ESTE CURSO.');
        
          }
          else{
        return Redirect::action('VerAlumnosController@versusalumnos',array('id' =>  $nota->id_detalle,"null","null","null"))->with('msj','El alumno no fue registrado por no pertenecer a esta sección o ser inválida su matrícula.');
    }
         // return back()->with('msj','El alumno no pertenece a esta sección.');
      }
 }
 public function metodoparavalidarprimerregistro($matricula,$iddetalle){
    if(DB::table("notas")->where("cod_matricula","=",$matricula,"AND","id_detalle","=",$iddetalle)->first()){
        //echo $seccionma."asa";
       // echo "okey";
        return "existe";
    }
    else{
       // echo "aca";
        return "noexiste";
    }
 }
 public function metodoparacompararseccion ($matricula,$seccion){
   
     //echo $seccion;
    $seccionma = DB::table("matrícula")->where("cod_matricula","=",$matricula)->first();
    if(DB::table("matrícula")->where("cod_matricula","=",$matricula,"AND","cod_sección","=",$seccion)->first()){
        //echo $seccionma."asa";
       // echo "okey";
        return "okey";
    }
    else{
       // echo "aca";
        return "error";
    }
}
 public function destroy($id,$iddetalle){
    $nota = Nota :: findOrFail($id)-> delete();
   /* $producto = Producto :: findOrFail($id) -> delete();*/

   return Redirect::action('VerAlumnosController@versusalumnos',array('id' =>  $iddetalle,"null","null","null"))->with('msjdelete','El alumno fue eliminado del curso.');
}
}
