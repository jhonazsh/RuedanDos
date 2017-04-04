@extends('layouts.base')

@section('content')

	<div class="row">
	    <div class="col-md-8 col-md-offset-2">	
			<div class="panel panel-default">
	                <div class="panel-heading text-center">Modificar Historia</div>

	                <div class="panel-body">
	                    <div class="row">
							<div class="col-md-8 col-md-offset-2">
								{{ Form::open(array('url'=>'/historia/modificar/'.$historia->id)) }}
						
								  <div class="form-group">
								    <label>Título de Historia</label>
								    
								    	{{Form::text('titulo', $historia->titulo, ['class'=>'form-control', 'class'=>'form-control input-sm'] )}}
								    
								  </div>
								  <div class="form-group">
								    <label>Contenido de la Historia</label>
								    
								      	{{Form::textarea('contenido', $historia->contenido, ['class'=>'form-control', 'class'=>'form-control input-sm'] )}}
								    
								  </div>
								  <div class="form-group">
								    <label>Autor</label>
								    @if (Auth::guest())
						                    
						                @else
						                    <input type="text" class="form-control input-sm" disabled name="autor" value="{{ Auth::user()->name }}">

						                    <input type="hidden" class="form-control input-sm" name="id_user" value="{{ Auth::user()->id }}">               
						                @endif
								  </div>
								  <div class="form-group text-center">
								   	{{Form::submit('Guardar Cambios', ['class'=>'btn btn-default btn-success'] )}}
								    
								  </div>
								  
								      

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
