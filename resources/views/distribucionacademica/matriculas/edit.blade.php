@extends('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-xs-12 col-sm-6">
        <h3>Editar Matrícula: </h3>
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors -> all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {!!Form :: model($matricula,['method'=>'PATCH','route'=>['matriculas.update',$codmatricula]])!!}
        {{Form :: token()}}
        <div class="row">

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Código de Matrícula:</label>
                    <input readonly id="cod_matricula_matricula_editar" required maxlength="10" type="text" name="cod_matricula" value="{{$codmatricula}}"
                        class="form-control" placeholder="Código ...">

                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Codigo de Año de Matrícula:</label>
                    <select required id="cod_AñoEscolar" name="cod_AñoEscolar" class="form-control dynamic"
                        data-dependent="colegio">
                        <option value="" disabled="true" selected>--Selecciona--</option>
                        @foreach ($anescolar as $cat)
                        @if($cat -> cod_AñoEscolar == $matricula -> cod_AñoEscolar)
                        <option value="{{$cat -> cod_AñoEscolar}}" selected>{{$cat ->nombre_añoescolar}}</option>
                        @else
                        <option value="{{$cat -> cod_AñoEscolar}}">{{$cat ->nombre_añoescolar}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Detalles de Matrícula:</label>
                    <input type="text" name="detalles_matricula" value="{{$matricula->detalles_matricula}}"
                        class="form-control" placeholder="Detalles ...">

                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Colegio al que pertenece</label>
                    <select required id="colegio_matricula_edit" name="cod_colegio" class="form-control dynamic"
                        data-dependent="colegio">
                        <option value="" disabled="true" selected>--Selecciona--</option>
                        @foreach ($colegio as $cat)
                        @if($cat -> cod_colegio == $matricula -> cod_colegio)
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
                    <select required id="cod_nivel_matricula_edit" name="cod_nivel" class="form-control dynamic"
                        data-dependent="colegio">
                        <option value="" disabled="true" selected>--Selecciona--</option>
                        @foreach ($nivel as $cat)
                        @if($cat -> cod_nivel == $matricula -> cod_nivel)
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
                    <select required id="cod_grado_matricula_edit" name="cod_grado" class="form-control dynamic">

                        @foreach ($grado as $cat)
                        @if($cat -> cod_grado == $matricula -> cod_grado)
                        <option value="{{$cat -> cod_grado}}" selected>{{$cat -> nombre_grado}}</option>
                        @else
                        <option value="{{$cat -> cod_grado}}">{{$cat -> nombre_grado}}</option>
                        @endif
                        @endforeach

                    </select>
                </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Sección al que pertenece</label>
                    <select required id="cod_sección_matricula_edit" name="cod_sección" class="form-control dynamic"
                        data-dependent="colegio">
                        <option value="" disabled="true" selected>--Selecciona--</option>
                        @foreach ($seccion as $cat)
                        @if($cat -> cod_sección == $matricula -> cod_sección)
                        <option value="{{$cat -> cod_sección}}" selected>{{$cat -> nombre_seccion}}</option>
                        @else
                        <option value="{{$cat -> cod_sección}}">{{$cat -> nombre_seccion}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
            
            
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Código del Alumno a matricular:</label>
                    <input id="cod_alumno_mat_editar" required maxlength="12" type="text" name="CodAlumno" value="{{$matricula->CodAlumno}}"
                        class="form-control" placeholder="DNI Del alumno ...">
                        <span id="error_alumno" class="help-block"></span>
                </div>
               
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