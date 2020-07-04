@extends('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-xs-12 col-sm-6">
        <h3>Poner Notas de : {{$alumno}} </h3>
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors -> all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {!!Form :: model($nota,['method'=>'PATCH','route'=>['notas.update', $nota -> idnota,$docente,$codcurso,$codseccion]])!!}
        {{Form :: token()}}
        <div class="row">
          
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="cod_sección">Nota 1er Bimestre:</label>
                    <input type="text" name="NotaPrimBim" value="{{$nota->NotaPrimBim}}" class="form-control"
                        placeholder="1er Bim ...">
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="nombre_seccion">Nota 2do Bimestre</label>
                    <input type="text" name="NotaSegunBim" value="{{$nota->NotaSegunBim}}"
                        class="form-control" placeholder="2 Bim...">
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="NotaTercerBim">Nota 3er Bimestre</label>
                    <input type="text" name="NotaTercerBim"  value="{{$nota->NotaTercerBim}}"
                        class="form-control" placeholder="3 Bim...">
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="NotaCuartoBim">Nota 4to Bimestre</label>
                    <input type="text" name="NotaCuartoBim" value="{{$nota->NotaCuartoBim}}"
                        class="form-control" placeholder="4 Bim...">
                </div>
            </div>

        </div>


    </div>
</div>


<div class="form-group">
    <button class="btn btn-primary" type="submit">Guardar</button>
    <button class="btn btn-danger" onClick="history.go(-1);" type="reset">Atrás</button>

</div>
{!! Form::close()!!}

@endsection