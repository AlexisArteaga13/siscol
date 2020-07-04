@extends('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Lista de Cursos a su cargo: {{$dnidocente}}</h3>
        <button class="btn btn-danger" onClick="history.go(-1);" type="reset">Atrás</button>
   <br>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                     <th>Código del Curso</th>
                    <th>Nombre del Curso</th>
                    <th>Profesor Responsable</th>
                    <th>Nivel De Estudio</th>
                    <th>Cod. Grado</th>
                    <th>Grado De Estudio</th>
                    <th>Colegio</th>
                    <th>Fecha de Cambio</th>
                    <th>Fecha de Asignación</th>
                    <th>Opciones</th>
                    <th></th>
                </thead>
                @foreach ($curso as $cat)
                <tr>
                    <td>{{ $cat -> CodCurso}}</td>
                    <td>{{ $cat -> NombreCurso}}</td>
                    <td>{{ $cat ->NombreDocente}} {{ $cat ->ApellidosDocente}}</td>
                    <td>{{ $cat ->nombre_nivel}}</td>
                    <td>{{ $cat ->cod_grado}}</td>
                    <td>{{ $cat ->nombre_grado}}</td>
                    <td>{{ $cat ->Nombre_colegio}}</td>
                    <td>{{ $cat -> updated_at}}</td>
                    <td>{{ $cat -> created_at}}</td>
                    <td>
                    {{Form::Open(array('action'=> array('NotaController@versecciones','docente'=> $dnidocente,'codcurso' =>$cat->CodCurso,'codgrado'=>  $cat ->cod_grado),'method'=>'POST'))}}
                         {{ csrf_field() }}
                       <button
                                class="btn btn-soundcloud">Secciones</button></a> {{Form::close()}}
                    </td>
                    </tr>
                @endforeach
            </table>
        </div>
    
    </div>
</div>
@endsection