@extends('layouts.base')

@section('content')


	    <div class="row">
	        <div class="col-md-8 col-md-offset-2">
	            <div class="panel panel-default">
	                <div class="panel-heading text-center">Nueva Historia</div>

	                <div class="panel-body">
	                    <div class="row">
							<div class="col-md-8 col-md-offset-2">
								{{ Form::open(array('url'=>'/historia/crear')) }}
									<div class="form-group">
										{{Form::label('Título: ')}}
										{{Form::text('titulo', null, ['placeholder'=>'Título de la Historia', 'class'=>'form-control input-sm'])}}
									</div>
									<div class="form-group">
										{{Form::label('Contenido: ')}}
										{{Form::textarea('contenido', null, ['placeholder'=>'Contenido...', 'class'=>'form-control input-sm'])}}
									</div>
									<div class="form-group">
										{{Form::label('Autor: ')}}
										

										@if (Auth::guest())
						                    
						                @else
						                    <input type="text" class="form-control input-sm" disabled name="autor" value="{{ Auth::user()->name }}">

						                    <input type="hidden" class="form-control input-sm" name="id_user" value="{{ Auth::user()->id }}">               
						                @endif
									</div>
									<div class="form-group text-center">
										{{Form::submit('Guardar Historia', ['class'=>'btn btn-default btn-success'] )}}
									</div>
									

								{{ Form::close() }}
								
							</div>
						</div>
	                </div>
	            </div>
	        </div>
	    </div>
		 
	
		
			
		

		
		<br>
		<p class="text-center">
			<a href="/">Volver al Inicio</a>
		</p>

	
	

@endsection
