<?php

namespace SisCol\Http\Controllers;


use Illuminate\Http\Request;
use SisCol\Grado;
use SisCol\Nivel;
use SisCol\Colegio;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Redirect;
use SisCol\Http\Requests\GradoFormRequest;
use Illuminate\Support\Facades\Storage;

use DB;


class AjaxGrados extends Controller
{
    public function index()
    {
        echo "im in AjaxController index";//simplemente haremos que devuelva esto
    }
}
