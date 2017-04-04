@extends('layouts.base')

@section('content')


        

        <div class="row">

          <div class="col-md-8">

            <div class="panel panel-default">
                <div class="panel-heading text-center">Historias</div>

                <div class="panel-body" style="padding:0">
                    
                    @if (count($historiasuser) > 0)
                        
                        
                        @foreach($historiasuser as $historiauser)
                          <div class="contenedor-historia">
                          <div class="example" >
                            <h3>{{$historiauser['titulo']}}</h3>
                            <small>{{$historiauser['created_at']}}</small>
                            <p class="text-justify" style="margin-top:1em">{{$historiauser['contenido']}}</p>


                            
                            <div class="row">
                              <div class="col-md-6">
                                <div class="media">
                                  <div class="media-left">
                                    <a href="#">
                                      @foreach($perfiles as $perfil)
                                        @if($perfil->id_user == $historiauser['user']['id'])
                                          <img class="media-object" src="{{ asset('perfiles') }}/{{ $perfil->imagen }}" alt="..." style="width:32px;height:32px">
                                        @endif
                                      
                                      @endforeach
                                    </a>
                                  </div>
                                  <div class="media-body">
                                    <h4 class="media-heading">
                                      <small>
                                        {{ $historiauser['user']['name'] }}
                                      </small>
                                    </h4>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6 text-right">
                                  <a href="#" title="Me Gusta" data-toggle="tooltip" data-placement="top" class="edit"><span class="glyphicon glyphicon-thumbs-up" ></span></a>
                              
                                @if ($historiauser['user']['id'] == Auth::id() )
                                  <a href="historia/{{$historiauser['id']}}" title="Editar" data-toggle="tooltip" data-placement="top" class="edit"><span class="glyphicon glyphicon-edit" ></span></a>
                                  <a href="historia/eliminar/{{$historiauser['id']}}" title="Eliminar" data-toggle="tooltip" data-placement="top" class="edit"><span class="glyphicon glyphicon-trash" ></span></a>
                                @else
                                  
                                @endif

                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              </div>
                            </div>
                          </div>

                          <div style="margin-top:1em">
                            
                            {{ Form::open(array('url'=>'/comentario/crear')) }}
                              <div class="form-group">
                                
                                {{Form::text('comentario', null, ['placeholder'=>'Escribe Tu Comentario ...', 'class'=>'form-control input-sm'])}}
                                {{Form::hidden('id_historia', $historiauser['id'])}}
                              </div>
                      

                            {{ Form::close() }}



                          </div>

                        

                         @foreach($comentariosuser as $comentario)

                                
                                @if($comentario['id_historia'] == $historiauser['id'])
                              <div class="comentario">
                                
                                <div class="media" style="padding:10px">
                                  <div class="media-left">
                                    <a href="#">
                                      @foreach($perfiles as $perfil)
                                                @if($perfil->id_user == $comentario['user']['id'])
                                                  <img class="media-object" src="{{ asset('perfiles') }}/{{ $perfil->imagen }}" alt="..." style="width:32px;height:32px">
                                                @endif
                                              
                                              @endforeach
                                      
                                    </a>
                                  </div>
                                  <div class="media-body " style="font-size:0.9em">
                                    <h5 class="media-heading" style="color:#5f5e5e"><b>{{ $comentario['user']['name'] }}</b></h5>
                                    {{ $comentario['contenido'] }} ({{ $comentario['id_historia'] }})
                                  </div>
                                </div>

                              </div>
                              @endif

                            @endforeach

                          

                            
                            </div>
                            @if ($loop->last)
                              
                            @else
                              <hr style="border-top: 1px solid rgb(214, 214, 214);margin:0">
                            @endif

  
                            
                            
                        @endforeach

                    @else

                        <div class="row">
                          <div class="col-md-12">
                            <div class="home-no-history">
                              <h1 class="text-center">Upps...!</h1>
                              <h2 class="text-center">No hay ninguna historia.</h2>
                            </div>
                            
                          </div>
                          
                        </div>
                    
                    @endif
                </div>

                 
            </div>

      
            
          </div>
          <div class="col-md-4">
              <div class="aside"> 
              @if (count($historiasuser) > 0)
                <h5>Las Historias Más Leídas</h5>
                  <p> 
                      <a href=" ">Jhon Felipe Medina Zapata </a><br>
                      El costoso error de creer que no hay peligro
                  </p>
                  <p> 
                      <a href=" "> Jaime Carrera Rojas</a><br>
                       Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                  </p>  
                    
                  <p> 
                      <a href=" "> Arturo Rabines</a><br>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                  </p>  
                  <p> 
                      <a href=" ">Robinson Yuri Velazques Baca </a><br>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                  </p>
                  <p> 
                      <a href=" ">Pedro Castillo </a><br>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                  </p>
                  
                    
                    <hr style="border-top:1px solid #f1f1f1">  

                <h5>Etiquetas</h5>
                <span class="label label-danger">#motitos</span>
                <span class="label label-danger">#turisteando</span>
                <span class="label label-danger">#viajecito</span>
                <span class="label label-danger">#verano</span>
                
              @else

                <div class="home-no-history__aside">
                  <h3 class="text-center">Upps..!</h3>
                  <h4 class="text-center">No hay ninguna historia.</h4>
                  
                </div>

              @endif

              
                    
              </div>
                  
             
            

          </div>
                
        </div>

@endsection

@section('scripts')

<script>

$('.edit').tooltip();


</script>

@endsection