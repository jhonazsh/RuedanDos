<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Perfil extends Model
{
    protected $table = 'perfiles';

    protected $fillable = ['imagen', 'bio', 'id_user'];

    public function setImagenAttribute($imagen){
    	$this->attributes['imagen'] = Carbon::now()->second.$imagen->getClientOriginalName();
    	$name = Carbon::now()->second.$imagen->getClientOriginalName();
    	\Storage::disk('local')->put($name, \File::get($imagen));
    }

    public function perfil(){
        return $this->hasOne('App\User');
    }
}
