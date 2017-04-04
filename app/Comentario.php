<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table = 'comentarios';

    protected $fillable = ['contenido','id_user','id_historia'];

    public function user(){
    	return $this->belongsTo('App\User','id_user','id');
    }

    public function historia(){
    	return $this->belongsTo('App\Historia','id_historia','id');
    }
}
