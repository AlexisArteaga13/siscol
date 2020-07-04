@extends('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-xs-12 col-sm-6">
        <h3>Editar Curso: {{ $curso -> NombreCurso}}</h3>
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors -> all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {!!Form :: model($curso, ['method'=>'PATCH','route'=>['cursos.update',$cod_curso]])!!}
        {{Form :: token()}}
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="CodCurso">Código De Curso:</label>
                    <input type="text" readonly=»readonly» name="CodCurso" required class="form-control" value="{{$cod_curso}}"
                        placeholder="Código ...">
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="NombreCurso">Nombre de Curso: </label>
                    <input type="text" name="NombreCurso" required value="{{$curso -> NombreCurso}}" class="form-control"
                        placeholder="Nombre ...">
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="descripcionCurso">Descripción: </label>
                    <input type="text" name="descripcionCurso" required value="{{$curso -> descripcionCurso}}"
                        class="form-control" placeholder="Apellidos ...">
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Colegio al que pertenece</label>
                    <select id="colegio" name="cod_colegio" required class="form-control dynamic" data-dependent="colegio">
                    <option disabled="true" selected>--Selecciona--</option>
                        @foreach ($colegio as $cat)
                        @if($cat -> cod_colegio == $curso -> cod_colegio)
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
            <label>Nivel al que pertenece</label>
            <select id="cod_nivel_de_curso_edit" name="cod_nivel" required class="form-control dynamic"  data-dependent="colegio">
                <option disabled="true" selected>--Selecciona--</option>
                @foreach ($nivel as $cat)
                @if($cat -> cod_nivel == $curso -> cod_nivel)
                        <option value="{{$cat -> cod_nivel}}" selected>{{$cat -> nombre_nivel}}</option>
                        @else
                        <option value="{{$cat -> cod_nivel}}">{{$cat -> nombre_nivel}}</option>
                        @endif
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
            <label>Grado al que pertenece</label>
            <select id="cod_grado_edit" name="cod_grado" class="form-control dynamic"  required data-dependent="colegio">
            <option disabled="true" selected>--Selecciona--</option>
                @foreach ($grado as $cat)
                @if($cat -> cod_grado == $curso -> cod_grado)
                        <option value="{{$cat -> cod_grado}}" selected>{{$cat -> nombre_grado}}</option>
                         @else
                         <option value="{{$cat -> cod_grado}}">{{$cat -> nombre_grado}}</option>
                        @endif    
                @endforeach
            </select>
        </div>
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