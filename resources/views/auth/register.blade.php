@extends('layouts.base')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Registrate</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <form  role="form" method="POST" action="{{ url('/register') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" >Nombres y Apellidos</label>

                                  
                                        <input id="name" type="text" class="form-control input-sm" name="name" value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                   
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" >Correo Electrónico</label>

                                    
                                        <input id="email" type="email" class="form-control input-sm" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" >Contraseña</label>

                                    
                                        <input id="password" type="password" class="form-control input-sm" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm" >Confirmar Contraseña</label>

                                    
                                        <input id="password-confirm" type="password" class="form-control input-sm" name="password_confirmation" required>
                                    
                                </div>

                                <div class="form-group text-center">
                                    
                                        <button type="submit" class="btn btn-success">
                                            Registrar
                                        </button>
                                    
                                </div>
                            </form>
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>

@endsection
