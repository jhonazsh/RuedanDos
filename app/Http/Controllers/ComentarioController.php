<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{
    public function crear(Request $request){
    	\App\Comentario::create([
            'contenido'=> $request['comentario'],
            'id_user'=> Auth::id(),
            'id_historia'=> $request['id_historia']
            ]);

    	$comentarios = \App\Comentario::all();

    	return redirect('/');
    }


}
