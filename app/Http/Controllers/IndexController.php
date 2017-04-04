<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index(){
    	$comentarios = \App\Comentario::All();
    	$historias = \App\Historia::All();
        // $users = \App\User::All();
        $perfiles = \App\Perfil::All();

    	$historiasuser = collect();
    	$comentariosuser = collect();
        $userperfil = collect();

    	$i=0;
    	$j=0;
        $k=0;
        // $l=0;

    	foreach ($historias as $historia) {
		    $historiasuser[$i] = collect($historia, $historia->user->name);
		    $i++;
		}

		foreach ($comentarios as $comentario) {
			$comentariosuser[$j] = collect($comentario, $comentario->user->name);
		    $j++;
		}

        // foreach ($users as $user) {
        //     $perfil = \App\Perfil::where('id_user','=', $user->id)->get();
        //     $userperfil[$k] = collect($perfil,$user->idate(format));
            
        //     $k++;
        // }
    	
		return view('home',compact('historiasuser','comentariosuser','perfiles'));
        // return $userperfil;
    }

    public function prueba(){
        return Auth::user()->perfil;
    }
}
