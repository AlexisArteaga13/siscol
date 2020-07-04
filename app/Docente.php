<?php

namespace SisCol;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $table='docente';
    protected $primaryKey='DNIDocente';
    public $timestamps=true;
    protected $fillable=[
        'DNIDocente',
        'NombreDocente',
        'ApellidosDocente',
        'Especialidad',
        'CorreoDocente',
        'TelefonoDocente',
        'DireccionDocente',
        						

    ];
}
