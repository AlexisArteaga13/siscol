<?php

namespace SisCol;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table='users';
    protected $primaryKey='id';
    public $timestamps=true;
    protected $fillable=[
        'DNI',
        'name',
        'email',
        'password',
        'TIPOUSU',
        'colegioadmin',
        	
    ];
}
