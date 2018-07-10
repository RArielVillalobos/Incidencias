<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //relacion muchos a muchos, cada usuario pertenece a muchos projectos y cada projecto tiene muchos usuarios
    public function projects(){

        return $this->belongsToMany(Project::class);
    }

    //definiendo otro accesors
    public function getListOfProjectsAttribute(){
        if($this->role==1){
            return $this->projects;
        }else{
            return Project::all();
        }

    }

    //accesors
    public function getIsAdminAttribute(){
        return $this->role==0;

    }

    public function getIsClientAttribute(){
        return $this->role==2;

    }

    public function getIsSupportAttribute(){
        return $this->role==1;
    }


}
