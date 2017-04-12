<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PerfilUsuarioController extends Controller
{
    public function index(){
        if (Auth::check()){
            $historias = \App\Historia::where('id_user','=',Auth::id())->get() ;
            $comentarios = \App\Comentario::all();
            $users = \App\User::all();
            $perfiles = \App\Perfil::all();

            $comments_order=[];
            $comments=[];
            $historia_comentarios=[];
            $user_comment="";
            $foto_perfil_user = "";

            $foto_autor="";

            $k=0;

            for($i=0;$i<count($historias);$i++){
                $comments=[];
                $k=0;
                for($j=0;$j<count($comentarios);$j++){
                    if($historias[$i]->id==$comentarios[$j]->id_historia){
                        $user_comment="";
                        for($l=0;$l<count($users);$l++){
                            if($comentarios[$j]->id_user==$users[$l]->id){
                                $user_comment=$users[$l]->name;
                            }     
                        }

                        $foto_perfil_user="";
                        for($m=0;$m<count($perfiles);$m++){
                            if($comentarios[$j]->id_user==$perfiles[$m]->id_user){
                                $foto_perfil_user=$perfiles[$m]->imagen;
                            }   
                        }

                        $comments[$k]=array_merge($comentarios[$j]->toArray(),['user'=>$user_comment],['foto_perfil_user_comment'=>$foto_perfil_user]);
                        $k++;
                    }
                }

                for($n=0;$n<count($perfiles);$n++){
                    if($perfiles[$n]->id_user==Auth::id()){
                        $foto_autor=$perfiles[$n]->imagen;
                    }
                }

                $historia_comentarios[$i]=array_merge($historias[$i]->toArray(), ['autor'=>Auth::user()->name], ['foto_autor'=>$foto_autor], ['comentarios'=>$comments]);
            }

            $perfil_user=collect();
            foreach ($perfiles as $perfil) {
                if($perfil->id_user==Auth::id()){
                    $perfil_user=$perfil;
                }
            }


            $historias_json = json_encode($historia_comentarios,JSON_PRETTY_PRINT);
            $historias_conjunto = json_decode($historias_json, true);
            $historias_collect = collect($historias_conjunto);

            //return $historias_json;
            return view('perfil',compact('historias_collect','perfil_user'));

        }

        
    }

    public function editar(){
    	$perfil = \App\Perfil::where('id_user','=',Auth::id())->first();
    	return view('perfil_editar', compact('perfil'));
        
    }

    public function editarcrear(Request $request){
    	\App\Perfil::create([
            'imagen'=>$request['imagen'],
            'bio'=>$request['bio'],
            'id_user'=>$request['id_user']
            ]);

        return $request['imagen'];
    }

    public function actualizar(Request $request, $id){
    	
        $perfil = \App\Perfil::find($id);
        $perfil->fill($request->all());
        $perfil->save();

        return redirect('/perfil');

        //return $request['imagen'];
    	
    }

    public function guardar_bio_ajax(Request $request, $id){
        $perfil_encontrado = \App\Perfil::find($id);
        $perfil_encontrado->bio = $request->bio;
        $perfil_encontrado->save();

        return $perfil_encontrado;
    }

    public function guardar_photo_ajax(Request $request, $id){
        $perfil_foto = \App\Perfil::find($id);
        $perfil_foto->imagen = " ".explode("C:fakepath", stripslashes($request->imagen) )[1];
        $perfil_foto->save();

        //return split('C:fakepath', stripslashes($request->imagen) )
        return  $perfil_encontrado_foto->imagen;
    }
}
