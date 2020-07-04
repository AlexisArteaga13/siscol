<?php

namespace SisCol;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{

	protected $fillable=['descripcion','precio_venta','precio_compra','unidade_id','marca_id','categoria_id'];

    public function categoria(){

    	return $this->belongsTo(Categoria::class);
    }
    public function marca(){
    	return $this->belongsTo(Marca::class);
    }
    public function unidade(){
    	return $this->belongsTo(Unidade::class);
    }
}
