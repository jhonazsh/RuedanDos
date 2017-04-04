<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historia extends Model
{
    protected $table = 'historias';

    protected $fillable = ['titulo','contenido','id_user'];

    public function user(){
    	return $this->belongsTo('App\User','id_user','id');
    }

    public function comentarios(){
    	return $this->hasMany('App\Comentario');
    }
}
