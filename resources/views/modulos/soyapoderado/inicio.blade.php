@extends('layouts.admin')
@section ('contenido')
{!!Form :: open(array('url' => 'soyapoderado/buscar','method'=>'GET','autocomplete'=>'off'))!!}
        {{Form :: token()}}
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Ingrese Código de Matrícula:</label>
                    <input type="text" name="cod_matricula"  class="form-control"
                        placeholder="Código ...">

                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Ingrese DNI de Alumno:</label>
                    <input type="text" name="cod_alumno"  class="form-control"
                        placeholder="Código ...">

            </div>
                <!--(**En caso de NO recordar sus código, solicitelo**)!-->
                </div>
        
            </div>
         
        </div>
        <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 align-self-center text-center">
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Buscar</button>
                <button class="btn btn-danger" onClick="history.go(-1);" type="reset">Atrás</button>
        
        </div>
     
    </div>
    {!! Form::close()!!}
   
@endsection