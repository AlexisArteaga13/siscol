<?php

namespace SisCol\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use SisCol\Http\Requests\DocenteFormRequest;
use Illuminate\Support\Facades\Redirect;
use SisCol\Docente;

class DocenteController extends Controller
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
             $docente=DB::table('docente')
             ->where('NombreDocente','LIKE','%'.$query.'%') 
             ->where('condicion','=','1') 
             -> orderBy('NombreDocente','asc') 
             -> paginate(5);
             return view('personaldocente.docentes.index',["docente"=>$docente,"searchText"=>$query,"tipodebuscar" => $tipodebuscar]);
             }
             else{
                $docente=DB::table('docente')
                ->where($tipodebuscar,'LIKE','%'.$query.'%') 
                ->where('condicion','=','1') 
                -> orderBy('NombreDocente','asc') 
                -> paginate(5);
                return view('personaldocente.docentes.index',["docente"=>$docente,"searchText"=>$query,"tipodebuscar" => $tipodebuscar]);
                   
             }
         }
    }
    public function create(){
        return view("personaldocente.docentes.create");
 }
 public function store(DocenteFormRequest $request){
        $docente= new Docente;
        $docente -> DNIDocente =$request -> get('DNIDocente');
        $docente -> NombreDocente =$request -> get('NombreDocente');
        $docente -> ApellidosDocente =$request -> get('ApellidosDocente');
        $docente -> Especialidad =$request -> get('Especialidad');
        $docente -> CorreoDocente =$request -> get('CorreoDocente');
        $docente -> TelefonoDocente =$request -> get('TelefonoDocente');
        $docente -> DireccionDocente =$request -> get('DireccionDocente');
        $docente -> condicion = 1;
        $docente -> save();
        return Redirect :: to ('personaldocente/docentes');
 }
 public function show($id){
        return view("personaldocente.docentes.show",["docente" => Docente :: findOrFail($id),"codigo" => $id]);
      
 }
 public function edit($id){
     return view("personaldocente.docentes.edit",["docente" => Docente :: findOrFail($id),"codigo" => $id]);
 }
 public function update(DocenteFormRequest $request,$id){
        $docente = Docente :: findOrFail($id);
        $docente -> DNIDocente =$request -> get('DNIDocente');
        $docente -> NombreDocente =$request -> get('NombreDocente');
        $docente -> ApellidosDocente =$request -> get('ApellidosDocente');
        $docente -> Especialidad =$request -> get('Especialidad');
        $docente -> CorreoDocente =$request -> get('CorreoDocente');
        $docente -> TelefonoDocente =$request -> get('TelefonoDocente');
        $docente -> DireccionDocente =$request -> get('DireccionDocente');
        $docente->update();
        return Redirect :: to ('personaldocente/docentes');
 }
 public function destroy($id){
     $docente = Docente :: findOrFail($id) ;
     $docente -> condicion = 0;
     $docente-> update();
     return Redirect :: to ('personaldocente/docentes');
 }
}
