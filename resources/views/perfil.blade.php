@extends('layouts.base')

@section('title')
Tu Perfil
@endsection




@section('content')

    <div class="row" id="app-all">
        <div class="col-md-3">
          <div class="panel panel-default" style="position:fixed;width:262.5px">
            
            <div class="panel-body" style="padding:0">
              <div class="contenedor-perfil text-center">
                @if(count($perfil_user)>0)

                  <!-- ................. app-edit-photo/VueJS ................. -->
                  <div id="app-edit-photo">
                    <img src="{{ asset('perfiles') }}/{{ $perfil_user->imagen }}" alt="..." class="img-perfil" v-on:click="showViewPhoto" v-on:mouseover="showOptionsPhoto" v-on:mouseleave="showOptionsPhotoOut">
                    <div class="botones-options" v-bind:style="showOptionsPhotoValue" v-on:mouseover="showOptionsPhoto"> 
                      <div>
                        <span class="glyphicon glyphicon-edit photo-icons" v-on:click="showEditPhotoView"></span>
                      </div>
                      <div>
                        <span class="glyphicon glyphicon-remove photo-icons" v-on:click="eliminarPhoto"></span>
                      </div>
                    </div>
                  </div>
                  <!-- ................. app-edit-photo ................. -->


                  <h4 class="text-center"><b>{{ Auth::user()->name }}</b></h4>

                  <!-- ................. app-edit-bio/VueJS ................. -->
                  <div id="app-edit-bio">
                    <div class="bio-self text-center" v-on:click="modificarBio" v-if="showBio" >
                      <span v-if="bioServer">
                        {{ $perfil_user->bio }}
                      </span>
                      <span v-else style="display:none" v-bind:style="bioServerDisplay">
                        @{{ bioModificado }}
                      </span> 
                    </div>
                    <template style="display:none" v-else v-bind:style="showBlock">
                      <div>
                        <div class="" >
                          <textarea style="resize:none; overflow:hidden" rows="1" class="form-control input-sm text-center perfil-textarea-autosize bio-self-text" v-on:click="sobreTextarea" v-model="bioSelf" v-on:keyup="currentLengthBio" v-on:keydown="currentLengthBioDown">@{{ bioSelf }}</textarea>
                          <input type="hidden" name="_token" value="{!! csrf_token() !!}" id="token">
                        </div>
                        <div class="perfil-sub-bio">
                          <span class="perfil-bio-length"><small class="color-b1b1b1">@{{ bioLengthSelf }} de 140</small></span>
                          <span>
                            <button class="btn btn-success btn-xs" v-on:click="sendBioModificado">Guardar</button>
                            <button class="btn btn-default btn-xs" v-on:click="cancelarModificarBio">Cancelar</button>
                          </span>
                        </div>   
                      </div>
                      
                      
                    </template>
                  </div>
                  <!-- ................. end app-edit-bio ................. -->

                @else

                  <div class="perfil-no-photo">
                    <span class="glyphicon glyphicon-user font-size__6"></span>
                  </div>

                  <h4 class="text-center"><b>{{ Auth::user()->name }}</b></h4>
                
                  <!-- ................. app-bio/VueJS ................. -->
                  <div id="app-bio">
                    <button class="btn btn-default btn-sm" style="margin-bottom:0.5em" v-if="show" v-on:click="hideButtonBio">Biografía</button>
                    <template v-else style="display:none" v-bind:style="styleShow">
                      <div v-if="showOnly">
                        <textarea class="form-control input-sm perfil-textarea-bio" placeholder="Escribe tu Bio ..." v-on:keyup="currentLengthBio" v-on:keydown="currentLengthBioDown" v-model="bio" rows="1"></textarea>
                        <div class="perfil-sub-bio">
                          <span class="perfil-bio-length"><small class="color-b1b1b1">@{{ bioLength }} de 140</small></span>
                          <span>
                            <button class="btn btn-success btn-xs" v-on:click="sendBio">Guardar</button>
                            <button class="btn btn-default btn-xs" v-on:click="cancelarBio">Cancelar</button>
                          </span>
                        </div>
                      </div>
                      <div class="text-center" v-else>
                        @{{ bioGuardar }}
                      </div>
                    </template>
                    
                  </div>
                  <!-- ................. end app-bio .......... -->


                @endif
                


                <!--<div class="moto" >
                  <span class="dot" id="1">. </span><span class="dot" id="2">. </span><span class="dot" id="3">. </span><i class="fa fa-motorcycle" aria-hidden="true"></i><span class="dot" id="4"> .</span><span class="dot" id="5"> .</span><span class="dot" id="6"> .</span>
                </div>-->
                
              </div>
              <div class="content-perfil">
                  <!--<div class="item-content-perfil">
                    <span class="glyphicon glyphicon-thumbs-up" style="padding-right:10px"></span>
                    <span class="glyphicon glyphicon-comment" style="padding-left:10px"></span>
                  </div>-->
                  <div class="item-content-perfil">
                    <span class="glyphicon glyphicon-road"></span> &nbsp;&nbsp;&nbsp; Recorridos
                  </div>
                  <div class="item-content-perfil">
                    <span class="glyphicon glyphicon-map-marker"></span> &nbsp;&nbsp;&nbsp; de Máncora
                  </div>
                  <div class="item-content-perfil">
                    <span class="glyphicon glyphicon-picture"></span> &nbsp;&nbsp;&nbsp; Fotos
                  </div>
                  <div class="item-content-perfil">
                    <i class="fa fa-users" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp; Amigos
                  </div>

                  
                  <div class="item-content-perfil" style="background-color: #f1f1f1;">
                    En Propiedad: 
                  </div>
                  
                  <div class="item-content-perfil">
                    <img src="{{ asset('img') }}/moto1.jpg" style="width:45px;height:45px;margin-bottom:3px">
                    <img src="{{ asset('img') }}/moto2.jpg" style="width:45px;height:45px;margin-bottom:3px">
                    <img src="{{ asset('img') }}/moto3.jpg" style="width:45px;height:45px;margin-bottom:3px">
                    <img src="{{ asset('img') }}/moto3.jpg" style="width:45px;height:45px;margin-bottom:3px">
                    <img src="{{ asset('img') }}/moto3.jpg" style="width:45px;height:45px;margin-bottom:3px">
                    <img src="{{ asset('img') }}/moto3.jpg" style="width:45px;height:45px;margin-bottom:3px">
                    <img src="{{ asset('img') }}/moto3.jpg" style="width:45px;height:45px;margin-bottom:3px">
                  </div>
                </div>
              
             
            </div>
          </div>


        </div>
        <div class="col-md-6 ">
            
            <div v-if="showViewTemplatePhoto == 0">
              <div class="panel panel-default">
                <div class="panel-heading text-center">Mis Historias</div>

                <div class="panel-body" style="padding:0">
                    @if(count($historias_collect)>0)
                      @foreach ($historias_collect as $historia)
                          
                        <div class="contenedor-historia">
                          <h3>{{ $historia['titulo'] }}</h3>
                          <small>{{$historia['created_at']}}</small>
                          <p class="text-justify" style="margin-top:1em">{{$historia['contenido']}}</p>

                          <div class="row">
                              <div class="col-md-6">
                                <div class="media">
                                  <div class="media-left">
                                    <a href="#" class="perfil-photo-content__user-comment">
                                      @if($historia['foto_autor']!="")
                                        <img class="media-object" src="{{ asset('perfiles') }}/{{ $historia['foto_autor'] }}" alt="..." style="width:32px;height:32px">
                                      @else
                                        <span class="glyphicon glyphicon-user perfil-no-photo__user-comment"></span>
                                      @endif
                                    </a>
                                  </div>
                                  <div class="media-body">
                                    <h4 class="media-heading">
                                      <small>
                                        {{ $historia['autor'] }}
                                      </small>
                                    </h4>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6 text-right">
                                  <a href="#" title="Me Gusta" data-toggle="tooltip" data-placement="top" class="edit"><span class="glyphicon glyphicon-thumbs-up" ></span></a>
                              
                                  @if ($historia['id_user'] == Auth::id() )
                                    <a href="historia/{{$historia['id']}}" title="Editar" data-toggle="tooltip" data-placement="top" class="edit"><span class="glyphicon glyphicon-edit" ></span></a>
                                    <a href="historia/eliminar/{{$historia['id']}}" title="Eliminar" data-toggle="tooltip" data-placement="top" class="edit"><span class="glyphicon glyphicon-trash" ></span></a>
                                  @else
                                    
                                  @endif

                                
                              </div>
                            </div>
                          
                          <div style="margin-top:1em">
                            
                            {{ Form::open(array('url'=>'/comentario/crear')) }}
                              <div class="form-group">
                                
                                {{Form::text('comentario', null, ['placeholder'=>'Escribe Tu Comentario ...', 'class'=>'form-control input-sm'])}}
                                {{Form::hidden('id_historia', $historia['id'])}}
                              </div>
                      

                            {{ Form::close() }}


                          </div>


                          @foreach($historia['comentarios'] as $comentario)

                            <div class="comentario">
                                
                                <div class="media" style="padding:10px">
                                  <div class="media-left">
                                    <a href="#" class="perfil-photo-content__user-comment">
                                      <!-- foto de perfil del usuario que hiso comentario -->
                                      @if($comentario['foto_perfil_user_comment']!="")
                                        <img class="media-object" src="{{ asset('perfiles') }}/{{ $comentario['foto_perfil_user_comment'] }}" alt="..." style="width:32px;height:32px">
                                      @else
                                        <span class="glyphicon glyphicon-user perfil-no-photo__user-comment"></span>
                                      @endif
                                    </a>
                                  </div>
                                  <div class="media-body " style="font-size:0.9em">
                                    <h5 class="media-heading" style="color:#5f5e5e"><b>{{ $comentario['user'] }}</b></h5>
                                    {{ $comentario['contenido'] }} ({{ $comentario['id_historia'] }})
                                  </div>
                                </div>

                              </div>

                          @endforeach


                          </div>
                          <!-- -->
                          @if ($loop->last)
                                
                              @else
                                <hr style="border-top: 1px solid rgb(214, 214, 214);margin:0">
                              @endif
                      
                          
                          
                        @endforeach
                      @else
                        <div class="perfil-no-history text-center">
                          <h1 class="text-center">Aun no tienes historias.</h1>
                          <a href="{{ url('/historia/nueva') }}" class="btn btn-success ">Crea Una Historia</a>
                        </div>
                      @endif
                  </div>
              </div>
            </div>

            <template  style="display:none" v-bind:style="showViewEditPhotoDisplay" v-else-if="showViewTemplatePhoto == 1">
              <div class="panel panel-default" v-if="">
                <div class="panel-heading">
                  <div class="row">
                    <div class="col-md-6 text-left">
                      Foto de Perfil
                    </div>
                    <div class="col-md-6 text-right">
                      <button class="btn btn-default btn-xs" v-on:click="showHistory">
                        Cerrar
                        <span class="glyphicon glyphicon-remove"></span>
                      </button>
                    </div>
                  </div>
                </div>

                <div class="panel-body" style="padding:15px">
                  <img src="{{ asset('perfiles') }}/{{ $perfil_user->imagen }}" width="100%">
                  
                </div>
              </div>
            </template>

            <template  style="display:none" v-bind:style="showViewEditPhotoDisplay" v-else>
              <div class="panel panel-default">
                <div class="panel-heading text-center">
                  <div class="row">
                    <div class="col-md-6 text-left">
                      Editar Foto de Perfil
                    </div>
                    <div class="col-md-6 text-right">
                      <button class="btn btn-default btn-xs" v-on:click="showHistory">
                        Cerrar
                        <span class="glyphicon glyphicon-remove"></span>
                      </button>
                    </div>
                  </div>
                </div>

                <div class="panel-body" style="padding:10px">
                  
                  <div class="text-center">
                    <img src="{{ asset('perfiles') }}/{{ $perfil_user->imagen }}" class="edit-class">
                    
                  </div>
                  <div class="text-center">
                   
                    <input type="file" id='imagenAC'>
                    <input type="hidden" name="_tokensito" value="{!! csrf_token() !!}" id="tokensito">
                  </div>
                  <div class="text-center">
                    <button class="btn btn-success" v-on:click="cambiarFoto">Cambiar Foto</button>
                  </div>
                  
                </div>


              </div>
            </template>
            
        </div>
        <div class="col-md-3" >
          <div style="position:fixed; width:262.5px">
            <div >
              <div class="text-center" style="font-size:2.5em; color: #b5b5b5">{{ count($historias_collect) }}</div>
              <div class="text-center" style="font-size:1.2em; color: #b5b5b5">
              @if (count($historias_collect)==1)
                Historia
              @else
                Historias
              @endif

              </div>
              <hr>
              
              <div class="perfil-aside-actividades">
                
                <div class="perfil-aside-actividades-item">le diste like a ...</div>
                <hr style="margin: 5px 0; border-top:1px solid #d6d6d6">
                <div class="perfil-aside-actividades-item">creaste una nueva historia ...</div>
                <hr style="margin: 5px 0; border-top:1px solid #d6d6d6">
                <div class="perfil-aside-actividades-item">cambiaste tu foto de perfil ...</div>
                <hr style="margin: 5px 0; border-top:1px solid #d6d6d6">
                <div class="perfil-aside-actividades-item">agregaste fotos nuevas ...</div>
                <hr style="margin: 5px 0; border-top:1px solid #d6d6d6">
                <div class="perfil-aside-actividades-item">ieur wui rweui rywiu</div>
              </div>

            </div>
          </div>
          
        </div>
    </div>



@endsection

@section('scripts')
    <script>
    /*---- script load moto ----*/      

    var i=1;
    dot(i);

      function dot(i){
        setTimeout(function(){
          $('.dot#'+i).css({"color":"#5f5e5e"});
          $('.dot#'+(i-1)).css({"color":"#d6d6d6"});
          i=i+1;
          if(i==8){
            i=1;
          }
          dot(i);
        },500);
        
      }
      

      
    </script>
@endsection

@section('scripts-vue')
    <script>
    /*--  ----------- /   Crear Bio con VueJS   / -------  -- */
    var bio = new Vue({
      el:'#app-bio',
      
      data: {
        show: true,
        styleShow: "",
        bio:"",
        bioLength: 0,
        bioGuardar:"",
        showOnly: true
      },

      methods:{
        bioReaction: function(){
          if(this.bio.length<=140){
            this.bioLength = this.bio.length;
          }
          else{
            this.bioLength = 140 - this.bio.length;
          }
        },
        hideButtonBio: function(){
          this.show = false;
          this.styleShow = "display:block";
          
        },
        currentLengthBio: function(_evt){
           this.bioReaction();
           autosize($('.perfil-textarea-bio'));
        },
        currentLengthBioDown: function(_evt){
          if(_evt.which == 8){
            this.bioReaction(); 
          }
        },
        sendBio: function(){
          this.bioGuardar = this.bio;
          this.bio = "";
          this.showOnly = false;
        },
        cancelarBio: function(){
          this.bio="";
          this.show = true;

        }

      }
      
    });
    /* --------------------   / End /    ------------------ */


    /* -- ----------- / Editar la Foto Perfil - VueJS / ------------ -- */

    var editPhoto = new Vue({
      el:'#app-all',
      data:{
        showViewTemplatePhoto:0,
        showViewEditPhotoDisplay:"",
        showOptionsPhotoValue:"",
        /* data editar bio */
        showBio:true,
        showBlock:"",
        bioSelf:"",
        bioLengthSelf: 0,
        bioModificado:"",
        bioServer:true,
        bioServerDisplay:""
      },
      methods:{
        showEditPhotoView: function(){
          this.showViewTemplatePhoto=2;
          this.showViewEditPhotoDisplay="display:block";
        },
        eliminarPhoto: function(){
          console.log('eliminar');
        },
        showHistory: function(){
          this.showViewTemplatePhoto=0;
          this.showViewEditPhotoDisplay="display:none";
        },
        showViewPhoto: function(){
          this.showViewTemplatePhoto=1;
          this.showViewEditPhotoDisplay="display:block";
        },
        showOptionsPhoto: function(){
          this.showOptionsPhotoValue="display:block";
        },
        showOptionsPhotoOut: function(){
          this.showOptionsPhotoValue="display:none";
        },
        cambiarFoto: function(){
          var tokensito = $("#tokensito").val();
          var cadena = $('#imagenAC').val();
          
          $.ajax({
            headers: {'X-CSRF-Token':tokensito},
            url:"{{ url('/ajax/editar/foto') }}"+'/'+{{ $perfil_user->id }},
            data: {imagen:cadena},
            type:'POST',
            success: function(data){
              console.log(data);
            }
          });
          
        },
        /* ---- editar bio --- */
        bioReaction: function(){
          if(this.bioSelf.length<=140){
            this.bioLengthSelf = this.bioSelf.length;
          }
          else{
            this.bioLengthSelf = 140 - this.bioSelf.length;
          }
        },
        modificarBio: function(){
          this.showBio=false;
          this.showBlock="display:block";

          if(this.bioModificado==""){
            this.bioSelf=S("{{ $perfil_user->bio }}").decodeHTMLEntities().s;
          }
          else{
            this.bioSelf=this.bioModificado;
          }

          this.bioLengthSelf=this.bioSelf.length;
          this.sobreTextarea();
        },
        sobreTextarea: function(){
          autosize($('.perfil-textarea-autosize'));
        },
        cancelarModificarBio: function(){
          this.showBio=true;
          this.bioSelf=S("{{ $perfil_user->bio }}").decodeHTMLEntities().s;
        },
        currentLengthBio: function(_evt){
           this.bioReaction();
           //autosize($('.perfil-textarea-bio'));
        },
        currentLengthBioDown: function(_evt){
          if(_evt.which == 8){
            this.bioReaction(); 
          }
        },
        sendBioModificado: function(){
          this.bioServer=false;
          this.showBio=true;
          this.bioServerDisplay="display:block";
          this.bioModificado=this.bioSelf;

          var token = $("#token").val();

          $.ajax({
            headers: {'X-CSRF-Token':token},
            url:"{{ url('/ajax/perfil/editar/bio') }}"+'/'+{{ $perfil_user->id }},
            data: {bio:this.bioModificado},
            type:'POST',
            success: function(data){
              console.log(data);
            }

          });
        }

      }
    });

    /* -------------------- / End / --------------------*/
    
    </script>
@endsection

