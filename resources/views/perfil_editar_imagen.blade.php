@extends('layouts.base')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Editar Perfil</div>

                <div class="panel-body">
                    
                    {{ Form::open(array('url'=>'/perfil/actualizar', 'method'=>'POST', 'files'=>true)) }}
                                    <div class="form-group">
                                        {{Form::label('Imagen: ')}}
                                        {{Form::file('imagen', null, ['placeholder'=>'Subir Imagen', 'class'=>'form-control input-sm'])}}

                                        {{Form::hidden('id_user', Auth::id() ) }}
                                    </div>
                                    
                                    <div class="form-group text-center">
                                        {{Form::submit('Guardar Cambios', ['class'=>'btn btn-default btn-success'] )}}
                                    </div>
                                    

                                {{ Form::close() }}

                </div>
            </div>
        </div>
    </div>

@endsection