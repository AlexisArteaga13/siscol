<?php

namespace SisCol\Http\Controllers;

use Illuminate\Http\Request;
use SisCol\Categoria;
use Illuminate\Support\Facades\DB;

class CategoriasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){

    	//$categorias = DB::table('categorias')->get();
    	$categorias =Categoria::all();

    	return view('categorias.index',compact('categorias'));
    }
    public function show($id){
        $id=$_GET['id'];
        if ($id !=null){
            $categorias=Categoria::find($id);
            return view('categorias.show',compact('categorias'));
       
        }else
            return ('no se encontro');
    

    }
    public function create(){

    	return view('categorias.create');

    }
    public function store(Request $request){
    	 
        $categoria=new Categoria;
        $categoria->Nombre=$request->Nombre;
        $categoria->save();
        $categorias =Categoria::all();
        return view('categorias.index',compact('categorias'));
    }

    public function edit($id){

        $categorias=Categoria::find($id);
        return view('categorias.edit',compact('categorias'));
    }
    public function update(Request $request ,$id){

      

        $categorias= Categoria::find($id);
        $categorias->Nombre=$request->Nombre;
        $categorias->save();

        return redirect('/categorias');

    }

    public function destroy($id){

      
        $categorias=Categoria::find($id);
        $categorias->delete();
        return redirect('/categorias');
    }
}
