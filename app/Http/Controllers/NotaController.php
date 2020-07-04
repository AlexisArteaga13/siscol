<?php

namespace SisCol\Http\Controllers;


use Illuminate\Http\Request;

use SisCol\Nivel;
use SisCol\Nota;
use SisCol\Curso;

use SisCol\Matricula;

use SisCol\Alumno;
use Illuminate\Support\Facades\Redirect;
use SisCol\Http\Requests\NotaFormRequest;
use Illuminate\Support\Facades\Storage;
use DB;
class NotaController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
    
   public function vistaprincipaldocente($dnidocente){        
    $curso=DB::table('cursosdeprofesor as detail')
    -> join('curso as cur','detail.CodCurso','=','cur.CodCurso')
    -> join('gradoestudio as g','g.cod_grado','=','detail.cod_grado')
    -> join('niveleducativo as n','n.cod_nivel','=','detail.cod_nivel')
    -> join('colegio as c','detail.cod_colegio','=','c.cod_colegio')
    -> join('docente as doc','detail.DNIDocente','=','doc.DNIDocente')
    ->select('detail.id_detalle','detail.CodCurso','cur.NombreCurso','doc.DNIDocente','doc.ApellidosDocente','doc.NombreDocente','g.cod_grado','g.nombre_grado','n.cod_nivel','n.nombre_nivel','c.cod_colegio','c.Nombre_colegio','detail.updated_at','detail.created_at')
    -> where('detail.DNIDocente', '=',$dnidocente)
    -> where('detail.condicion', '=','1')
    -> orderBy('cur.NombreCurso','asc') 
    ->paginate(500000);
    return view('modulos.soydocente.principal',["curso"=>$curso,"dnidocente"=>$dnidocente]);
   }

   public function versecciones($dnidocente,$codcurso,$codgrado){ 
  //  $codgrado = DB::table('gradoestudio')-> select ('cod_grado')-> where('nombre_grado','LIKE',$nombregrado);
    $seccion=DB::table('seccion as s')
            -> join('gradoestudio as g','g.cod_grado','=','s.cod_grado')
            -> join('niveleducativo as n','g.cod_nivel','=','n.cod_nivel')
            -> join('colegio as c','n.cod_colegio','=','c.cod_colegio')
            ->select('s.cod_sección','s.nombre_seccion','g.cod_grado','g.nombre_grado','n.cod_nivel','n.nombre_nivel','c.cod_colegio','c.Nombre_colegio','g.updated_at','g.created_at')
            -> where('s.cod_grado', '=',$codgrado)
            -> where('s.condicion', '=','1')
            -> orderBy('s.nombre_seccion','asc') 
            -> paginate(5000);
            return view('modulos.soydocente.versecciones',["codcurso"=>$codcurso,"grado"=>$codgrado,"seccion"=>$seccion,"dnidocente"=>$dnidocente]);
   }

   public function vernotas($dnidocente,$codcurso,$codseccion){ 
    //  $codgrado = DB::table('gradoestudio')-> select ('cod_grado')-> where('nombre_grado','LIKE',$nombregrado);
      $notas=DB::table('notas as not')
              -> join('matrícula as mat','mat.cod_matricula','=','not.cod_matricula')
              -> join('cursosdeprofesor as n','not.id_detalle','=','n.id_detalle')
              -> join('alumno as al','al.CodAlumno','=','mat.CodAlumno')
              ->select('not.idnota','not.NotaPrimBim','not.NotaSegunBim','not.NotaTercerBim','not.NotaCuartoBim','not.NotaFinal','al.CodAlumno','al.ApellidoAlumno','al.NombreAlumno','mat.cod_AñoEscolar','mat.cod_matricula','mat.cod_sección','n.id_detalle','n.CodCurso','n.DNIDocente')
              -> where('mat.cod_sección','=',$codseccion)
              -> where('n.DNIDocente','=',$dnidocente)
              -> where('n.CodCurso', '=',$codcurso)
              -> orderBy('al.ApellidoAlumno','asc') 
              -> paginate(50000000);
              return view('modulos.soydocente.vernotas',["notas"=>$notas,"codcurso"=>$codcurso,"seccion"=>$codseccion,"dnidocente"=>$dnidocente]);
     }
   /// public function ponernota($dnidocente,$codcurso,$codseccion){ 
      //  $codgrado = DB::table('gradoestudio')-> select ('cod_grado')-> where('nombre_grado','LIKE',$nombregrado);
      //  $notas=DB::table('notas as not')
        //        -> join('matrícula as mat','mat.cod_matricula','=','not.cod_matricula')
          //      -> join('cursosdeprofesor as n','not.id_detalle','=','n.id_detalle')
            //    -> join('alumno as al','al.CodAlumno','=','mat.CodAlumno')
              //  ->select('not.idnota','not.NotaPrimBim','not.NotaSegunBim','not.NotaTercerBim','not.NotaCuartoBim','not.NotaFinal','al.CodAlumno','al.ApellidoAlumno','al.NombreAlumno','mat.cod_AñoEscolar','mat.cod_matricula','mat.cod_sección','n.id_detalle','n.CodCurso','n.DNIDocente')
      //          -> where('mat.cod_sección','=',$codseccion)
        //        -> where('n.DNIDocente','=',$dnidocente)
          //      -> where('n.CodCurso', '=',$codcurso)
      //          -> orderBy('al.ApellidoAlumno','asc') 
        //        -> paginate(50000000);
          //      return view('modulos.soydocente.vernotas',["notas"=>$notas,"codcurso"=>$codcurso,"seccion"=>$codseccion,"dnidocente"=>$dnidocente]);
       //}
  


   public function create($id){
       
        $anescolar= DB::table('añoescolar')  ->get();  
        $seccion= DB::table('seccion') -> where('condicion', '=','1')-> where('cod_colegio', '=',$id) ->get();
       $grado= DB::table('gradoestudio') -> where('condicion', '=','1')-> where('cod_colegio', '=',$id) ->get();
       $colegio= DB::table('colegio') -> where('condicion_colegio', '=','1')-> where('cod_colegio', '=',$id) ->get();
       $nivel= DB::table('niveleducativo') -> where('condicion', '=','1') -> where('cod_colegio', '=',$id)->get();
       return view("distribucionacademica.matriculas.create",["anescolar"=>$anescolar,"seccion"=>$seccion,"grado" => $grado,"colegio" => $colegio,"nivel" => $nivel,"codigocolegio"=>$id]);
}
public function store(NotaFormRequest $request){
       $matricula= new Matricula;
       $matricula -> cod_matricula =$request -> get('cod_matricula');
       $matricula -> cod_AñoEscolar =$request -> get('cod_AñoEscolar');
       $matricula -> detalles_matricula =$request -> get('detalles_matricula');
       $matricula -> cod_sección =$request -> get('cod_sección');
       $matricula -> cod_grado =$request -> get('cod_grado');
       $matricula -> cod_nivel =$request -> get('cod_nivel');
       $matricula -> cod_colegio =$request -> get('cod_colegio');
       $matricula -> CodAlumno =$request -> get('CodAlumno');
       
       $matricula -> save();
       return Redirect::action('MatriculaController@show',array('id' =>  $matricula -> cod_colegio));
}
public function show($id){
    return view("distribucionacademica.matriculas.show",["colegio" =>$id]);
     
}
public function ponernota($id,$alumno,$dnidocente,$codcurso,$codseccion){
   
    return view("modulos.soydocente.ponernota",["nota"=> Nota :: findOrFail($id),"alumno"=>$alumno,"docente"=>$dnidocente, "codcurso"=>$codcurso,"codseccion"=>$codseccion]);
}
public function update(NotaFormRequest $request,$id,$profesor,$curso,$seccion){
       $nota = Nota :: findOrFail($id);
       $nota -> NotaPrimBim =$request -> get('NotaPrimBim');
       $nota -> NotaSegunBim =$request -> get('NotaSegunBim');
       $nota -> NotaTercerBim =$request -> get('NotaTercerBim');
       $nota -> 	NotaCuartoBim =$request -> get('NotaCuartoBim');
       if($nota -> NotaPrimBim !='' &  $nota -> NotaSegunBim !=''  &  $nota -> NotaTercerBim !=''  &  $nota -> NotaCuartoBim !='' ){
        $nota-> NotaFinal = ((double)$nota -> NotaPrimBim + (double)$nota -> NotaSegunBim + (double)$nota -> NotaTercerBim + (double)$nota -> NotaCuartoBim)/4;
       }
       else{
        $nota-> NotaFinal = null;
       }
       $nota -> update();
       return Redirect::action('NotaController@vernotas',array('docente' =>  $profesor,'codcurso'=>$curso, 'seccion'=>$seccion));
    }
public function destroy($id,$codigocolegio){
    $matricula = Matricula :: findOrFail($id)-> delete();
   /* $producto = Producto :: findOrFail($id) -> delete();*/
   return Redirect::action('MatriculaController@show',array('colegio' => $codigocolegio));
}
}