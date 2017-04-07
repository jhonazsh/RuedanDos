@extends('layouts.base')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Mi Perfil</div>

                <div class="panel-body"> 
                    @if($perfil)
                        <div class="perfil-editar-photo">
                            <img class="media-object" src="{{ asset('perfiles') }}/{{ $perfil->imagen }}" alt="...">
                        </div>
                        <div class="perfil-editar-photo__button">
                            {{ Form::open(array('url'=>'/perfil/editar/actualizar/'.$perfil->id, 'method'=>'POST', 'files'=>true)) }}
                                <div class="form-group">
                                    {{Form::file('imagen', null, ['placeholder'=>'Subir Imagen', 'class'=>'form-control input-sm'])}}
                                    {{Form::hidden('id_user', Auth::id() ) }}
                                </div>
                            <!-- endfor -->
                        </div>

                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                
                                    <!--<div class="form-group">
                                        {{Form::label('Nombres y Apellidos: ')}}
                                        {{Form::text('titulo', null, ['placeholder'=>'Nombres y Apellidos', 'class'=>'form-control input-sm'])}}
                                    </div>-->
                                    
                                    <div class="form-group">
                                        {{Form::label('Mi Bio: ')}}
                                        {{Form::textarea('bio', $perfil->bio, ['placeholder'=>'Mi Breve Biografía...', 'class'=>'form-control input-sm textarea-bio', 'rows'=>'2'])}}
                                    </div>
                                    
                                    <div class="form-group text-center">
                                        {{Form::submit('Guardar Cambios', ['class'=>'btn btn-default btn-success'] )}}
                                    </div>
                                        

                                {{ Form::close() }}
                            </div>
                        </div>
                        
                    @else
                        <div class="perfil-no-photo">
                            <span class="glyphicon glyphicon-user font-size__6"></span>
                        </div>
                        
                        {{ Form::open(array('url'=>'/perfil/editar/crear', 'method'=>'POST', 'files'=>true)) }}
                            <div class="perfil-editar-photo__button">
                                <div class="form-group">
                                    {{Form::file('imagen', null, ['placeholder'=>'Subir Imagen', 'class'=>'form-control input-sm'])}}
                                    {{Form::hidden('id_user', Auth::id() ) }}
                                </div>  
                            </div>

                        <!--<div class="form-group text-center">
                            {{Form::submit('Guardar Cambios', ['class'=>'btn btn-default btn-success'] )}}
                        </div>-->

                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                
                                    <!--<div class="form-group">
                                        {{Form::label('Nombres y Apellidos: ')}}
                                        {{Form::text('titulo', null, ['placeholder'=>'Nombres y Apellidos', 'class'=>'form-control input-sm'])}}
                                    </div>-->
                                    
                                    <div class="form-group">
                                        {{Form::label('Mi Bio: ')}}
                                        {{Form::textarea('bio', null, ['placeholder'=>'Mi Breve Biografía...', 'class'=>'form-control input-sm textarea-bio', 'rows'=>'2'])}}
                                    </div>
                                    
                                    <div class="form-group text-center">
                                        {{Form::submit('Guardar Cambios', ['class'=>'btn btn-default btn-success'] )}}
                                    </div>
                                        

                                {{ Form::close() }}
                            </div>
                        </div>
                                    

                        
                    @endif

                    

                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        autosize($('.textarea-bio'));
    </script>
@endsection
