@extends('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Notas </h3>  <button class="btn btn-danger" onClick="history.go(-1);" type="reset">Atrás</button>
    
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Código Alumno</th>
                    <th>Apellidos </th>
                    <th>Nombres</th>
                    <th>Curso</th>
                    <th>Año Escolar</th>
                    <th>Sección</th>
                    <th>Nota 1er Bim.</th>
                    <th>Nota 2do Bim.</th>
                    <th>Nota 3er Bim.</th>
                    <th>Nota 4er Bim.</th>
                    <th>Prom. Final</th>
                   

                </thead>
                
                @foreach ($alumno as $gra)
                <tr>		
                    <td>{{ $gra -> CodAlumno}}</td>
                    <td>{{ $gra -> ApellidoAlumno}}</td>
                    <td>{{ $gra -> NombreAlumno}}</td>
                    <td>{{ $gra -> NombreCurso}}</td>
                    <td>{{ $gra -> cod_AñoEscolar}}</td>
                    <td>{{ $gra -> cod_sección}}</td>
                   <td>{{ $gra -> NotaPrimBim}}</td>
                    <td>{{ $gra -> NotaSegunBim}}</td>
                    <td>{{ $gra -> NotaTercerBim}}</td>
                    <td>{{ $gra -> NotaCuartoBim}}</td>
                    <td>{{ $gra -> NotaFinal}}</td>
                   
                   </TR>
                @endforeach
            </table>
        </div>
       
    </div>
</div>

@endsection