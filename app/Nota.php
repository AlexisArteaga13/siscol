<?php

namespace SisCol;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $table='notas';
    protected $primaryKey='idnota';
    public $timestamps=true;
    protected $fillable=[
       
        'idnota',
        'cod_matricula',
        'CodCurso',
        'NotaPrimBim',
        'NotaSegunBim',
        'NotaTercerBim',
        'NotaCuartoBim',
        'NotaFinal',
        
        							
    ];
}
