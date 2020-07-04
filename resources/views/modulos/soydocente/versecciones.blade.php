@extends('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Lista de Secciones del grado: {{$grado}}</h3>
        <button class="btn btn-danger" onClick="history.go(-1);" type="reset">Atrás</button>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Código</th>
                    <th>Nombre de Sección</th>
                    <th>Grado</th>
                    <th>Nivel</th>
                    <th>Colegio</th>
                  
                    <th>Opciones</th>

                    <th></th>
                </thead>
                @foreach ($seccion as $gra)
                <tr>		
                    <td>{{ $gra -> cod_sección}}</td>
                    <td>{{ $gra -> nombre_seccion}}</td>
                    <td>{{ $gra -> nombre_grado}}</td>
                    <td>{{ $gra -> nombre_nivel}}</td>
                    <td>{{ $gra -> Nombre_colegio}}</td>
                    <td>
                    {{Form::Open(array('action'=> array('NotaController@vernotas','codcurso'=>$codcurso,'docente' =>$dnidocente,'seccion' =>$gra -> cod_sección),'method'=>'GET'))}}
                         {{ csrf_field() }}
                       <button
                                class="btn btn-info">Registro De Notas</button></a> {{Form::close()}}
                    </td>
                    
                   </TR>
                @endforeach
            </table>
        </div>
        {{$seccion -> render()}}
    </div>
</div>
@endsection