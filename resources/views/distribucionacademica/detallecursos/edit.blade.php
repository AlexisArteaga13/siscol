@extends('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-xs-12 col-sm-6">
        <h3>Editar Asignacion: </h3>
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors -> all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {!!Form :: model($detallecurso,['method'=>'PATCH','route'=>['detallecursos.update',$cod_curso]])!!}
        {{Form :: token()}}
        <div class="row">
           
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Colegio al que pertenece</label>
                    <select required id="colegio_asignacion_edit" name="cod_colegio" class="form-control dynamic" data-dependent="colegio">
                    <option value="" disabled="true" selected>--Selecciona--</option>
                        @foreach ($colegio as $cat)
                        @if($cat -> cod_colegio == $detallecurso -> cod_colegio)
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
                    <select required id="cod_nivel_asignacion_edit" name="cod_nivel" class="form-control dynamic" data-dependent="colegio">
                    <option value="" disabled="true" selected>--Selecciona--</option>
                        @foreach ($nivel as $cat)
                        @if($cat -> cod_nivel == $detallecurso -> cod_nivel)
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
                    <select required id="cod_grado_asignacion_edit" name="cod_grado" class="form-control dynamic" data-dependent="colegio">

                        @foreach ($grado as $cat)
                        @if($cat -> cod_grado == $detallecurso -> cod_grado)
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
                    <select required id="cod_seccion_asignacion_edit" name="seccion" class="form-control dynamic" data-dependent="colegio">

                        @foreach ($seccion as $cat)
                        @if($cat -> cod_sección == $detallecurso -> seccion)
                        <option value="{{$cat -> cod_sección}}" selected>{{$cat ->nombre_seccion}}</option>
                        @else
                        <option value="{{$cat -> cod_sección}}">{{$cat ->nombre_seccion}}</option>
                        @endif
                        @endforeach

                    </select>  
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Curso de Encargo:</label>
                    <select required id="CodCurso_asignacion_edit" name="CodCurso" class="form-control" data-dependent="colegio">
                        @foreach ($curso as $cat)

                        @if($cat -> CodCurso == $detallecurso -> CodCurso)
                        <option value="{{$cat -> CodCurso}}" selected>{{$cat ->NombreCurso}}</option>
                        @else
                        <option value="{{$cat -> CodCurso}}">{{$cat ->NombreCurso}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Docente Encargado:</label>
                    <select required id="DNIDocente" name="DNIDocente" class="form-control dynamic" data-dependent="colegio">

                        @foreach ($docente as $cat)
                        @if($cat -> DNIDocente == $detallecurso -> DNIDocente)
                        <option value="{{$cat -> DNIDocente}}" selected>{{$cat -> NombreDocente}}
                            {{$cat -> ApellidosDocente}}</option>
                        @else
                        <option value="{{$cat -> DNIDocente}}">{{$cat -> NombreDocente}} {{$cat -> ApellidosDocente}}
                        </option>
                        @endif
                        @endforeach
                    </select>
                </div>
              
                <input id="anescolarcol" name="anescolar"  type="hidden" onkeyUp="return ValNumero(this);" maxlength="10" name="CodCurso" class="form-control" value="{{old('CodCurso')}}"
                        placeholder="Código ...">
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