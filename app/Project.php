<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model

{
    use SoftDeletes;

    //un projecto tiene varias categorias y una categoria le pertence a un proyecto

    public function categories(){
        return $this->hasMany(Category::class);

    }

    public function levels(){
        return $this->hasMany(Level::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }


}
