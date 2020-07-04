@extends('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-xs-12 col-sm-6">
        <h3>Nuevo Encargo De Curso:</h3>
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors -> all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {!!Form :: open(array('url' => 'distribucionacademica/detallecursos','method'=>'POST','autocomplete'=>'off'))!!}
        {{Form :: token()}}
        <div class="row">
            
           <!-- <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Grado al que pertenece</label>
                    <select id="cod_grado" name="cod_grado" class="form-control dynamic" data-dependent="colegio">
                        <option>--Selecciona--</option>
                        @foreach ($grado as $cat)
                        <option value="{{$cat -> cod_grado}}">{{$cat -> nombre_grado}}</option>
                        @endforeach
                    </select>
                </div>
            </div>!-->
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Colegio al que pertenece</label>
                    <select required id="colegio_asignacion" name="cod_colegio" class="form-control dynamic" data-dependent="colegio">
                        @if($pdetalle==0)
                        <option disabled="true" value="" selected>--Selecciona--</option>
                        @foreach ($colegio as $cat)
                        <option value="{{$cat -> cod_colegio}}">{{$cat -> Nombre_colegio}}</option>
                        @endforeach
                        @endif
                        @if($pdetalle==1)
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
                    <select required id="cod_nivel_asignacion"  name="cod_nivel" class="form-control dynamic" data-dependent="colegio">
                    @if($pdetalle == 0)
                    <option disabled="true" value="" selected>--Selecciona--</option>
                        @endif
                        @if($pdetalle == 1)
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
                    <select id="cod_grado_asignacion" required name="cod_grado" class="form-control dynamic" data-dependent="colegio">
                    @if($pdetalle == 0)
                    <option disabled="true" value="" selected>--Selecciona--</option>
                        @endif
                        @if($pdetalle == 1)
                        @foreach ($grado as $cat)
                        <option value="{{$cat -> cod_grado}}">{{$cat -> nombre_grado}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Sección al que pertenece</label>
                    <select id="cod_seccion_asignacion" required name="cod_seccion" class="form-control dynamic" data-dependent="colegio">
                    @if($pdetalle == 0)
                    <option disabled="true" value="" selected>--Selecciona--</option>
                        @endif
                        @if($pdetalle == 1)
                        @foreach ($seccion as $cat)
                        <option value="{{$cat -> cod_sección}}">{{$cat -> nombre_seccion}}</option>
                        @endforeach
                        @endif  
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Curso de Encargo:</label>
                    <select required id="CodCurso_asignacion" name="CodCurso" class="form-control dynamic" data-dependent="colegio">
                        @if($pdetalle==0)
                        <option disabled="true" selected value="">--Selecciona--</option>
                       <!-- @foreach ($curso as $cat)
                        <option value="{{$cat -> CodCurso}}">{{$cat -> NombreCurso}}</option>
                        @endforeach!-->
                        @endif
                        @if($pdetalle==1)
                        @foreach ($curso as $cat)
                        <option value="{{$cat -> CodCurso}}">{{$cat -> NombreCurso}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Profesor A Cargo:</label>
                    <select id="DNIDocente" required name="DNIDocente" class="form-control dynamic" data-dependent="colegio">
                    <option disabled="true" selected value="">--Selecciona--</option>
                          @foreach ($docente as $cat)
                        <option value="{{$cat -> DNIDocente}}">{{$cat -> NombreDocente}} {{$cat -> ApellidosDocente}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            
                <input id="anescolarcol" name="anescolar"  type="hidden" onkeyUp="return ValNumero(this);" class="form-control" 
                        placeholder="Código ...">
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