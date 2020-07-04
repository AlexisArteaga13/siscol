<?php

namespace SisCol\Http\Controllers;

use SisCol\Producto;
use SisCol\Categoria;
use SisCol\Unidade;
use SisCol\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductosController extends Controller
{
    public function index(){

    	//$productos = DB::table('productos')->get();
    	$productos =Producto::all();

    	return view('productos.index',compact('productos'));
    }
    public function show($id){

    	$productos=Producto::find($id);

    return view('productos.show',compact('productos'));

    }
    public function create(){

    	$categorias=Categoria::all();
        $marcas=Marca::all();
        $unidades=Unidade::all();
    	return view('productos.create',compact('categorias','marcas','unidades'));

    }
    public function store(Request $request){
    	
    	Producto::create($request->all());
    	
    	return redirect('/productos');
    }

    public function edit($id){

        $productos=Producto::find($id);
        $categorias=Categoria::all();
        $marcas=Marca::all();
        $unidades=Unidade::all();
        return view('productos.edit',compact('productos','categorias','marcas','unidades'));
    }
    public function update(Request $request ,$id){

        $productos= Producto::find($id);
        $productos->descripcion=$request->descripcion;
        $productos->precio_venta=$request->precio_venta;
        $productos->precio_compra=$request->precio_compra;
        $productos->unidade_id=$request->unidade_id;
        $productos->marca_id=$request->marca_id;
        $productos->categoria_id=$request->categoria_id;
        $productos->save();

        return redirect('/productos');

    }

    public function destroy($id){

      
        $productos=Producto::find($id);
        $productos->delete();
        return redirect('/productos');
    }
}
