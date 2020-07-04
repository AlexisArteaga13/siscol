@extends('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-xs-12 col-sm-6">
        <h3>Nuevo Curso:</h3>
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors -> all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {!!Form :: open(array('url' => 'distribucionacademica/cursos','method'=>'POST','autocomplete'=>'off'))!!}
        {{Form :: token()}}
        <div class="row">
           <!-- <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="CodCurso">Código De Curso:</label>
                    <input id="cod_curso_crear" required type="text" onkeyUp="return ValNumero(this);" maxlength="10" name="CodCurso" required class="form-control" value="{{old('CodCurso')}}"
                        placeholder="Código ...">
                        <span id="error" class="help-block"></span>
                </div>
            </div> !-->
            <input id="cod_curso_crear"  type="hidden" onkeyUp="return ValNumero(this);" maxlength="10" name="CodCurso" class="form-control" value="{{old('CodCurso')}}"
                        placeholder="Código ...">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="NombreCurso">Nombre de Curso: </label>
                    <input type="text" required name="NombreCurso" required value="{{old('NombreCurso')}}" class="form-control"
                        placeholder="Nombre ...">
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="descripcionCurso">Descripción: </label>
                    <input type="text" required name="descripcionCurso" required value="{{old('descripcionCurso')}}"
                        class="form-control" placeholder="Descripción ...">
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Colegio al que pertenece</label>
                    <select id="colegio_de_curso" required name="cod_colegio" class="form-control dynamic" data-dependent="colegio">
                    @if($pcurso==0)
                    <option disabled="true" selected>--Selecciona--</option>
                        @foreach ($colegio as $cat)
                        <option value="{{$cat -> cod_colegio}}">{{$cat -> Nombre_colegio}}</option>
                        @endforeach
                   
                    @endif
                    @if($pcurso==1)
                    @foreach ($colegio as $cat)
                        <option value="{{$cat -> cod_colegio}}">{{$cat -> Nombre_colegio}}</option>
                        @endforeach
                    @endif
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
            <label>Nivel al que pertenece</label>
            <select id="cod_nivel_de_curso" required name="cod_nivel" class="form-control dynamic"  data-dependent="colegio">
            @if($pcurso==0)
            <option disabled="true" selected>--Selecciona--</option>
            @endif
            @if($pcurso==1)
                @foreach ($nivel as $cat)
                <option value="{{$cat -> cod_nivel}}">{{$cat -> nombre_nivel}}</option>
                @endforeach
                @endif
            </select>
        </div>
    </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
            <label>Grado al que pertenece</label>
            <select id="cod_grado_curso" required name="cod_grado" class="form-control dynamic"  data-dependent="colegio">
           
            @if($pcurso==0)
            <option disabled="true" selected>--Selecciona--</option>
            @endif
            @if($pcurso==1)
                @foreach ($grado as $cat)
                <option value="{{$cat -> cod_grado}}">{{$cat -> nombre_grado}}</option>
                @endforeach
                @endif
            </select>
        </div>
    </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <button id="btncrearcurso" class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" onClick="history.go(-1);" type="reset">Atrás</button>
            </div>
        </div>
        {!! Form::close()!!}
    </div>
</div>
@endsection