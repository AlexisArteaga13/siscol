<?php

namespace SisCol\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use SisCol\Http\Requests\AlumnoFormRequest;
use Illuminate\Support\Facades\Redirect;
use SisCol\Alumno;

class AlumnoController extends Controller
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
             $alumno=DB::table('alumno')
             ->where('NombreAlumno','LIKE','%'.$query.'%') 
             ->where('condicion','=','1') 
             -> orderBy('NombreAlumno','asc') 
             -> paginate(5);
             return view('distribucionacademica.alumnos.index',["alumno"=>$alumno,"searchText"=>$query,"tipodebuscar" => $tipodebuscar]);
             }
             else{
                $alumno=DB::table('alumno')
                ->where($tipodebuscar,'LIKE','%'.$query.'%') 
                ->where('condicion','=','1') 
                -> orderBy('NombreAlumno','asc') 
                -> paginate(5);
                return view('distribucionacademica.alumnos.index',["alumno"=>$alumno,"searchText"=>$query,"tipodebuscar" => $tipodebuscar]);
                    
             }
         }
    }
    public function getValidarAlumno(Request $request,$id){
        if($request -> ajax()){
            $alumno=Alumno::ValidarAlumno($id);
            return response()-> json($alumno);
        }
    }
    public function create(){
        return view("distribucionacademica.alumnos.create");
 }
 public function store(AlumnoFormRequest $request){
        $alumno= new Alumno;
        $alumno -> CodAlumno =$request -> get('CodAlumno');
        $alumno -> NombreAlumno =$request -> get('NombreAlumno');
        $alumno -> ApellidoAlumno =$request -> get('ApellidoAlumno');
        $alumno -> TelefonoHogarAlumno =$request -> get('TelefonoHogarAlumno');
        $alumno -> CorreoAlumno =$request -> get('CorreoAlumno');
        $alumno -> DireccionAlumno =$request -> get('DireccionAlumno');
        $alumno -> condicion = 1;
        $alumno -> save();
        return Redirect :: to ('distribucionacademica/alumnos');
 }
 public function show($id){
        return view("distribucionacademica.alumnos.show",["alumno" => Alumno :: findOrFail($id),"codigo" => $id]);
      
 }
 public function edit($id){
     return view("distribucionacademica.alumnos.edit",["alumno" => Alumno :: findOrFail($id),"codigo" => $id]);
 }
 public function update(AlumnoFormRequest $request,$id){
        $alumno = Alumno :: findOrFail($id);
        $alumno -> CodAlumno =$request -> get('CodAlumno');
        $alumno -> NombreAlumno =$request -> get('NombreAlumno');
        $alumno -> ApellidoAlumno =$request -> get('ApellidoAlumno');
        $alumno -> TelefonoHogarAlumno =$request -> get('TelefonoHogarAlumno');
        $alumno -> CorreoAlumno =$request -> get('CorreoAlumno');
        $alumno -> DireccionAlumno =$request -> get('DireccionAlumno');
        $alumno->update();
        return Redirect :: to ('distribucionacademica/alumnos');
 }
 public function destroy($id){
    $alumno = Alumno :: findOrFail($id);
     $alumno -> condicion = 0;
     $alumno-> update();
     return Redirect :: to ('distribucionacademica/alumnos');
 }
}
