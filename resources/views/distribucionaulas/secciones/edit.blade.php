@extends('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-xs-12 col-sm-6">
        <h3>Editar Sección Escolar: {{$cod_sección}} -- {{ $seccion -> nombre_seccion}}</h3>
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors -> all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {!!Form :: model($seccion,['method'=>'PATCH','route'=>['secciones.update', $cod_sección]])!!}
        {{Form :: token()}}
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Colegio al que pertenece</label>
                    <select name="cod_colegio" class="form-control" required >
                        @foreach ($colegio as $cat)

                        @if($cat -> cod_colegio == $seccion -> cod_colegio)
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
                    <label>Grado de Estudio:</label>
                    <select id="cod_grado_de_seccion" required name="cod_grado" class="form-control">
                        @foreach ($grado as $cat)

                        @if($cat -> cod_grado == $seccion -> cod_grado)
                        <option value="{{$cat -> cod_grado}}" selected>{{$cat -> nombre_grado}}</option>
                        @else
                        <option value="{{$cat -> cod_grado}}" selected>{{$cat -> nombre_grado}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Nivel de Estudio:</label>
                    <select id="cod_nivel_de_seccion_edit" required  name="cod_nivel" class="form-control">
                        @foreach ($nivel as $cat)

                        @if($cat -> cod_nivel == $seccion -> cod_nivel)
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
                    <label for="cod_sección">Código</label>
                    <input readonly=»readonly» type="text" name="cod_sección" required value="{{$cod_sección}}" class="form-control"
                        placeholder="Código ...">
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="nombre_seccion">Nombre</label>
                    <input type="text" name="nombre_seccion" required value="{{$seccion->nombre_seccion}}"
                        class="form-control" placeholder="Nombre ...">
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