<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    //
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function project(){
        return $this->belongsTo(Project::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function support(){
        return $this->belongsTo(User::class,'support_id');
    }

    public function client(){
        return $this->belongsTo(User::class,'client_id');
    }


    //accessor
    public function getSeverityFullAttribute()
    {
        switch ($this->severity){
            case 'M':
                return 'Menor';
            case 'N':
                return 'Normal';

            default:
                return 'Alta';


        }

    }

    public function getTitleShortAttribute(){
        //del titulo, a partir del caracter 0, tomamos 10 caracteres si se excede mostramos puntitos despeus de los 7 caracteres
        return mb_strimwidth($this->title,0,10,'...');
    }



    public function getCategoryNameAttribute(){
        if($this->category){
            return $this->category->name;

        }

            return 'General';


    }

    public function getSupportNameAttribute(){
        if($this->support){
            return $this->support->name;
        }

        return 'Sin Asignar';
    }

    public function getStateAttribute(){
        if($this->active==0){
            return 'Resuelto';
        }
        if($this->support_id){
            return 'Asignado';
        }

        return 'Pendiente';
    }
}
