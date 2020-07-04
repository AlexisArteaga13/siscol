@extends('layouts.admin')
@section ('contenido')
<div class="row">
    <div class="col-xs-12 col-sm-6">
        <h3>Editar Usuario: {{ $usuario -> name}}</h3>
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors -> all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {!!Form :: model($usuario, ['method'=>'PATCH','route'=>['usuario.update',$usuario->id]])!!}
        {{Form :: token()}}
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">

                    <label for="DNI">D.N.I.</label>
                    <input required id="DNI" type="text" class="form-control" name="DNI" value="{{$usuario -> DNI }}" required
                        autofocus>

                    @if ($errors->has('DNI'))
                    <span class="help-block">
                        <strong>{{ $errors->first('DNI') }}</strong>
                    </span>
                    @endif

                </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">

                    <label for="name">Nombres y Apellidos Completos</label>


                    <input required id="name" type="text" class="form-control" name="name" value="{{$usuario -> name }}" required
                        autofocus>

                    @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">

                    <label for="email">Dirección de Correo Electrónico</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{$usuario -> email}}"
                        required>

                    @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password">Cambiar Contraseña</label>

                    <input required id="password" type="password" class="form-control" name="password">

                    @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            @if(Auth::user()->TIPOUSU != 'admincol')
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="tipousuario">Tipo de usuario</label>
                    <div>
                        <select required id="tipousuario" name="tipousuario" class="form-control" data-dependent="colegio">
                            <option>--Selecciona--</option>
                            @if($usuario -> TIPOUSU == 'superadmin')
                            <option value="superadmin" selected>Superadministrador</option>
                            <option value="admincol">Administrador de Colegio</option>
                            <option value="docente">Docente</option>
                            @else
                            @if($usuario -> TIPOUSU == 'admincol')
                            <option value="superadmin">Superadministrador</option>
                            <option value="admincol" selected>Administrador de Colegio</option>
                            <option value="docente">Docente</option>
                            @else
                            <option value="superadmin">Superadministrador</option>
                            <option value="admincol">Administrador de Colegio</option>
                            <option value="docente" selected>Docente</option>
                            @endif
                            @endif

                        </select>
                      <!--  ***********************************************************
                        Si Será Administrador de Colegio, Seleccione En el Campo de Abajo, que colegio Administrará
                    !-->
                    </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="colegio">Colegio que administrará</label>
                        <div>
                            <select required id="colegio" name="colegio" class="form-control dynamic" data-dependent="colegio">
                                <option value="">--Selecciona--</option>
                                @foreach ($colegio as $cat)
                                @if($cat -> cod_colegio == $usuario -> colegioadmin)
                                <option value="{{$cat -> cod_colegio}}" selected>{{$cat -> Nombre_colegio}}</option>
                                @else
                                <option value="{{$cat -> cod_colegio}}">{{$cat -> Nombre_colegio}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>


                    @endif
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                       
                            <button type="submit" class="btn btn-primary">
                                Editar
                            </button>
                            <button class="btn btn-danger" onClick="history.go(-1);" type="reset">Atrás</button>
                        </div>
                    </div>

                    {!! Form::close()!!}
                </div>
            </div>
            @endsection