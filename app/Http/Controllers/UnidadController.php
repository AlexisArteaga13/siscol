<?php

namespace SisCol\Http\Controllers;

use Illuminate\Http\Request;
use SisCol\Unidade;

class UnidadController extends Controller
{
    public function index(){

    	//$unidades = DB::table('unidades')->get();
    	$unidades =Unidade::all();

    	return view('unidades.index',compact('unidades'));
    }
    public function show($id){

    	$unidades=Unidade::find($id);

    return view('unidades.show',compact('unidades'));

    }
    public function create(){

    	return view('unidades.create');

    }
    public function store(Request $request){
    	
    	$Unidade=new Unidade;
        $Unidade->Nombre=$request->Nombre;
        $Unidade->save();
    	
    	return redirect('/unidades');
    }

    public function edit($id){

        $unidades=Unidade::find($id);
        return view('unidades.edit',compact('unidades'));
    }
    public function update(Request $request ,$id){

        $unidades= Unidade::find($id);
        $unidades->Nombre=$request->Nombre;
        $unidades->save();

        return redirect('/unidades');

    }

    public function destroy($id){

      
        $unidades=Unidade::find($id);
        $unidades->delete();
        return redirect('/unidades');
    }
}
