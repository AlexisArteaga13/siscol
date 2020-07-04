@extends('layouts.admin')

@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registrar Nuevo Usuario</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('registro') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="DNI" class="col-md-4 control-label">D.N.I.</label>

                            <div class="col-md-6">
                                <input id="DNI" type="text" class="form-control" name="DNI" value="{{ old('DNI') }}"
                                    required autofocus>

                                @if ($errors->has('DNI'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('DNI') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Nombres y Apellidos Completos</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"
                                    required autofocus>

                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Dirección de Correo Electrónico</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email"
                                    value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar Contraseña</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group">

                            <label for="tipousuario" class="col-md-4 control-label">Tipo de usuario</label>
                            <div class="col-md-6">
                            <select id="tipousuario" name="tipousuario" class="form-control"
                                data-dependent="colegio">
                                @if(Auth::user()->TIPOUSU == 'admincol'){ 
                                    <option>--Selecciona--</option>
                                    <option value="docente">Docente</option>
                                }
                                @else
                                <option>--Selecciona--</option>
                            
                                <option value="superadmin">Superadministrador</option>
                                <option value="admincol">Administrador de Colegio</option>
                               
                              @endif
                            </select>
                            ***********************************************************
                            @if(Auth::user()->TIPOUSU == 'admincol')
                           
                            </div>
                           
                        </div>
                       
                        <div class="form-group">
                            <label for="colegio" class="col-md-4 control-label">Código de Colegio que Pertenece</label>
                            <div class="col-md-6">
                            <select id="colegio" name="colegio" class="form-control dynamic"
                                data-dependent="colegio">
                               
                                
                                <option value="{{Auth::user() -> colegioadmin}}">{{Auth::user() -> colegioadmin}}</option>
                                
                            </select>
                            </div>
                        </div>
                            
                            @else
                            Si Será Administrador de Colegio, Seleccione En el Campo de Abajo, que colegio Administrará
                            </div>
                           
                        </div>
                       
                        <div class="form-group">
                            <label for="colegio" class="col-md-4 control-label">Colegio que administrará</label>
                            <div class="col-md-6">
                            <select id="colegio" name="colegio" class="form-control dynamic"
                                data-dependent="colegio">
                                <option value="">--Selecciona--</option>
                                @foreach ($colegio as $cat)
                                <option value="{{$cat -> cod_colegio}}">{{$cat -> Nombre_colegio}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>

                            @endif
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection