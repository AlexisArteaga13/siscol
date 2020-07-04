@extends('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-xs-12 col-sm-6">
        <h3>Editar Nivel Educativo: {{$cod_nivel}} -- {{ $nivel -> nombre_nivel}}</h3>
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors -> all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {!!Form :: model($nivel,['method'=>'PATCH','route'=>['niveleducativo.update', $cod_nivel]])!!}
        {{Form :: token()}}
        <div class="row">

        
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Colegio al que pertenece</label>
                    <select name="cod_colegio" class="form-control" required>
                        @foreach ($colegio as $cat)

                        @if($cat -> cod_colegio == $nivel -> cod_colegio)
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
                    <label for="nombre_nivel">Nombre</label>
                    <input type="text" name="nombre_nivel" required value="{{$nivel -> nombre_nivel}}" class="form-control"
                      >
                </div>
            </div>
            <!--<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group"> !-->
                    <!--<label for="cod_nivel">Código</label>!-->
                    <input readonly type="hidden" name="cod_nivel"  value="{{$cod_nivel}}" class="form-control"
                        >
              <!--  </div>

            </div> !-->

        </div>
       

    </div>
</div>


<div class="form-group">
    <button class="btn btn-primary" type="submit">Guardar</button>
    <button class="btn btn-danger" onClick="history.go(-1);" type="reset">Atrás</button>

</div>
{!! Form::close()!!}

@endsection