<?php

namespace SisCol\Http\Controllers;

use Illuminate\Http\Request;
use SisCol\Marca;

class MarcasController extends Controller
{
    public function index(){

    	//$marcas = DB::table('marcas')->get();
    	$marcas =Marca::all();

    	return view('marcas.index',compact('marcas'));
    }
    public function show($id){

    	$marcas=Marca::find($id);

    return view('marcas.show',compact('marcas'));

    }
    public function create(){

    	return view('marcas.create');

    }
    public function store(Request $request){
    	
    	$Marca=new Marca;
        $Marca->Nombre=$request->Nombre;
        $Marca->save();
    	
    	return redirect('/marcas');
    }

    public function edit($id){

        $marcas=Marca::find($id);
        return view('marcas.edit',compact('marcas'));
    }
    public function update(Request $request ,$id){

        $marcas= Marca::find($id);
        $marcas->Nombre=$request->Nombre;
        $marcas->save();

        return redirect('/marcas');

    }

    public function destroy($id){

      
        $marcas=Marca::find($id);
        $marcas->delete();
        return redirect('/marcas');
    }
}
