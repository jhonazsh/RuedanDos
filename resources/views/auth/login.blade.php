@extends('layouts.base')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Ingreso</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <form role="form" method="POST" action="{{ url('/login') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" >Correo Eletrónico</label>

                                   
                                        <input id="email" type="email" class="form-control input-sm" name="email" value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                   
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password">Contraseña</label>

                                    
                                        <input id="password" type="password" class="form-control input-sm" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    
                                </div>

                                <div class="form-group text-center">
                                    
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme
                                            </label>
                                        </div>
                                    
                                </div>

                                <div class="form-group text-center">
                                    
                                        <button type="submit" class="btn btn-success">
                                            Ingresar
                                        </button>
                                            
                                        
                                    
                                </div>

                                <div class="form-group text-center">
                                    
                                        
                                            
                                        <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                            ¿Olvidaste Tu Contraseña?
                                        </a>
                                    
                                </div>

                            </form>
                        </div>
                    </div>

                    


                </div>
            </div>
        </div>
    </div>

@endsection
