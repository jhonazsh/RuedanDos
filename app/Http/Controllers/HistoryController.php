<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    
    public function nueva(){
        if (Auth::check()){
            return view('historia_nueva');
        }
    	else{
            return 'El Usuario debe estar loggeado para ver esta sección';
        }
    }

    public function crear(Request $request){

    	\App\Historia::create([
            'titulo'=> $request['titulo'],
            'contenido'=> $request['contenido'],
            'id_user'=> $request['id_user']
            ]);

    	return redirect('/');	
    }

    public function modificar(Request $request, $id){
    	$historia = \App\Historia::find($id);

        if (Auth::check()){
            return view('historia_modificar',compact('historia'));
        }
        else{
            return 'El Usuario debe estar loggeado para ver esta sección';
        }

    }

    public function actualizar(Request $request, $id){
    	$historia = \App\Historia::find($id);
        $historia->fill($request->all());
        $historia->save();

        return redirect('/');
    }

    public function eliminar($id){
    	$historia = \App\Historia::find($id);
    	$historia->delete();

    	return redirect('/');
    }
}
