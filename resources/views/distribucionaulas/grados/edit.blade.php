@extends('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-xs-12 col-sm-6">
        <h3>Editar Grado Escolar: {{$cod_grado}} -- {{ $grado -> nombre_grado}}</h3>
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors -> all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {!!Form :: model($grado,['method'=>'POST','route'=>['grados.update', $cod_grado]])!!}
        {{Form :: token()}}
        <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Colegio al que pertenece</label>
                    <select required name="cod_colegio" class="form-control">
                        @foreach ($colegio as $cat)

                        @if($cat -> cod_colegio == $grado -> cod_colegio)
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
                    <label>Nivel de Estudio:</label>
                    <select required name="cod_nivel" class="form-control">
                        @foreach ($nivel as $cat)

                        @if($cat -> cod_nivel == $grado -> cod_nivel)
                        <option value="{{$cat -> cod_nivel}}" selected>{{$cat -> nombre_nivel}}</option>
                        @else
                        <option value="{{$cat -> cod_nivel}}">{{$cat -> nombre_nivel}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
           <!-- <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="cod_grado">Código</label>
                    <input readonly=»readonly» type="text" name="cod_grado" required value="{{$cod_grado}}" class="form-control"
                        placeholder="Código ...">
                </div>

            </div>!-->
            <input readonly=»readonly» type="hidden" name="cod_grado" required value="{{$cod_grado}}" class="form-control"
                        placeholder="Código ...">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="nombre_grado">Nombre</label>
                    <input type="text" name="nombre_grado" required value="{{$grado -> nombre_grado}}" class="form-control"
                        placeholder="Nombre ...">
                </div>
            </div>
           
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="descripción_grado">Descripción</label>
                    <input type="text" name="descripción_grado"  required value="{{$grado ->descripción_grado}}"
                        class="form-control" placeholder="Código ...">
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
</div>
</div>
@endsection