@extends('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-xs-12 col-sm-6">
        <h3>Editar Contrato: {{ $codigo}}</h3>
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors -> all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {!!Form :: model($contrato, ['method'=>'PATCH','route'=>['contratos.update',$codigo]])!!}
        {{Form :: token()}}
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="CodContrato">Código:</label>
                    <input type="text" name="CodContrato" readonly required class="form-control" value="{{$codigo}}"
                        placeholder="Código ...">
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                <label>Colegio al que pertenece</label>
                    <select required name="cod_colegio" class="form-control">
                        @foreach ($colegio as $cat)

                        @if($cat -> cod_colegio == $contrato -> cod_colegio)
                        <option value="{{$cat -> cod_colegio}}" selected>{{$cat -> Nombre_colegio}}</option>
                        @else
                        <option value="{{$cat -> cod_colegio}}">{{$cat -> Nombre_colegio}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Docente </label>
                    <select required name="DNIDocente" class="form-control">
                        @foreach ($docente as $cat)
                       
                        @if($cat -> DNIDocente == $contrato -> DNIDocente)
                        <option value="{{$cat -> DNIDocente}}" selected>{{$cat -> NombreDocente}} {{$cat -> ApellidosDocente}}</option>
                        @else
                        <option value="{{$cat -> DNIDocente}}">{{$cat -> NombreDocente}} {{$cat -> ApellidosDocente}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="DetallesContrato">Detalles:</label>
                    <input required type="text" name="DetallesContrato" required class="form-control" value="{{$contrato -> DetallesContrato}}"
                        placeholder="Detalles ...">
                </div>
            </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <button class="btn btn-danger" onClick="history.go(-1);" type="reset">Atrás</button>
            </div>
        </div>
        {!! Form::close()!!}
    </div>
</div>
@endsection