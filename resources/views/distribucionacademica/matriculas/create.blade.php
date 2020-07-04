@extends('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-xs-12 col-sm-6">
        <h3>Nueva Matricula:</h3>
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors -> all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {!!Form :: open(array('url' => 'distribucionacademica/matriculas','method'=>'POST','autocomplete'=>'off'))!!}
        {{Form :: token()}}
        <div class="row">
            <!--  <div id="codmatricula" class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                  <label>Código de Matrícula:</label>
                    <input required maxlenght="44" readonly id="cod_matricula_matricula" type="hidden" name="cod_matricula" value="{{old('cod_matricula')}}" class="form-control"
                        placeholder="Código ...">
                        <span id="error" class="help-block"></span>
                </div>
            </div>!-->
            <input maxlenght="44" readonly id="cod_matricula_matricula" type="hidden" name="cod_matricula" value="{{old('cod_matricula')}}" class="form-control"
                        placeholder="Código ...">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Año de Matrícula:</label>
                    <select required id="cod_AñoEscolar_matricula" readonly name="cod_AñoEscolar" class="form-control dynamic"
                        data-dependent="colegio">
                       
                        @foreach ($anescolar as $cat)
                        <option value="{{$cat -> cod_AñoEscolar}}">{{$cat -> nombre_añoescolar}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Detalles de Matrícula:</label>
                    <input required id="detalles_matricula_matricula" type="text" name="detalles_matricula" value="{{old('detalles_matricula')}}" class="form-control"
                        placeholder="Detalles ...">

                </div>
            </div>
             <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Sección al que pertenece</label>
                    <select required id="cod_sección_matricula" name="cod_sección" class="form-control dynamic" data-dependent="colegio">
                    <option value="" disabled="true" selected>--Selecciona antes un grado--</option>
                       <!-- @foreach ($seccion as $cat)
                        <option value="{{$cat -> cod_sección}}">{{$cat -> nombre_seccion}}</option>
                        @endforeach!-->
                    </select>
                </div>
            </div>
            
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Grado al que pertenece</label>
                    <select required id="cod_grado_matricula" name="cod_grado" class="form-control dynamic" data-dependent="colegio">
                    <option value="" disabled="true" selected>--Selecciona antes un nivel--</option>
                       <!-- @foreach ($grado as $cat)
                        <option value="{{$cat -> cod_grado}}">{{$cat -> nombre_grado}}</option>
                        @endforeach !-->
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Nivel al que pertenece</label>
                    <select required id="cod_nivel_matricula" name="cod_nivel" class="form-control dynamic" data-dependent="colegio">
                    <option value="" disabled="true" selected>--Selecciona antes el colegio--</option>
                        <!--@foreach ($nivel as $cat)
                        <option value="{{$cat -> cod_nivel}}">{{$cat -> nombre_nivel}}</option>
                        @endforeach!-->
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Colegio al que pertenece</label>
                    <select required id="colegio_matricula" name="cod_colegio" class="form-control dynamic" data-dependent="colegio">
                    <option value="" disabled="true" selected>--Selecciona--</option>
                     @foreach ($colegio as $cat)
                        <option value="{{$cat -> cod_colegio}}">{{$cat -> Nombre_colegio}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
           
           
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>DNI del Alumno a matricular:</label>
                    <input required id="cod_alumno_mat_crear" type="text" name="CodAlumno" value="{{old('CodAlumno')}}" class="form-control"
                        placeholder="Código Del alumno ...">
                        <span id="error_alumno" class="help-block"></span>
                </div>
              <!--  (**En caso de NO recordar su código, solicitelo**) !-->
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <button id="btncrearmatr" class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" onClick="history.go(-1);" type="reset">Atrás</button>
            </div>
        </div>
        {!! Form::close()!!}
    </div>
</div>
@endsection