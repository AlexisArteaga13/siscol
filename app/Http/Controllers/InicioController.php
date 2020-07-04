<?php

namespace SisCol\Http\Controllers;
use SisCol\Http\Requests\UsuarioFormRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use SisCol\User;
use SisCol\Usuario;
use Illuminate\Support\Facades\Redirect;
use DB;
class InicioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function inicio(){
        return view('layouts.admin');
    }
    public function registrousuario(){
        $colegios=DB::table('colegio')
        ->select('cod_colegio','Nombre_colegio')
        ->where('condicion_colegio','=',1)->get()
        ;
        return view('auth.register',["colegio"=>$colegios]);
    }
    public function guardarnuevo(UsuarioFormRequest $request){
        $usuario= new Usuario;
        $usuario -> DNI =$request -> get('DNI');
        $usuario -> name =$request -> get('name');
        $usuario -> email =$request -> get('email');
        $usuario -> password = bcrypt($request -> get('password'));
        $usuario -> TIPOUSU = $request -> get('tipousuario');
        $usuario -> colegioadmin = $request -> get('colegio');
        $usuario -> save();
        return view('layouts.admin');
    }
    public function index(Request $request){
        if($request)
        {
            $query=trim($request->get('searchText'));
            $tipodebuscar= trim($request->get('tipodebuscar'));
            if($tipodebuscar==null){
            $usuarios=DB::table('users')
            ->where('name','LIKE','%'.$query.'%') 
      
            -> orderBy('created_at','asc') 
            -> paginate(10);
            return view('usuarios.index',["usuario"=>$usuarios,"searchText"=>$query,"tipodebuscar" => $tipodebuscar]);
            }
            else{
               
                $usuarios=DB::table('users')
                ->where($tipodebuscar,'LIKE','%'.$query.'%') 
          
                -> orderBy('created_at','asc') 
                -> paginate(10);
                return view('usuarios.index',["usuario"=>$usuarios,"searchText"=>$query,"tipodebuscar" => $tipodebuscar]);
                }
        }
   }
   public function edit($id){
    $colegios=DB::table('colegio')
    ->select('cod_colegio','Nombre_colegio')
    ->where('condicion_colegio','=',1)->get()
    ;
    return view("usuarios.edit",["usuario" => Usuario ::  findOrFail($id),"colegio"=>$colegios]);
}
public function update(UsuarioFormRequest $request,$id){
    $usuario = Usuario :: findOrFail($id);
    $usuario -> DNI =$request -> get('DNI');
        $usuario -> name =$request -> get('name');
        $usuario -> email =$request -> get('email');
        if( $usuario -> password == ''){

        }else{
            $usuario -> password = bcrypt($request -> get('password'));
        }
       
        $usuario -> TIPOUSU = $request -> get('tipousuario');
        $usuario -> colegioadmin = $request -> get('colegio');
    $usuario->update();
    return Redirect :: action('InicioController@index');


}
public function destroy($id){
 $usuario = Usuario :: findOrFail($id)-> delete() ;
 return Redirect :: action('InicioController@index');
}
}
