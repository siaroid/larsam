<?php

namespace App;

use Hekmatinasser\Verta\Verta;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id','is_active','photo_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->belongsTo('App\Role');
    }
    public function photo(){
        return $this->belongsTo('App\Photo');
    }

    public function posts(){

        return $this->hasMany('App\Post');
    }

    public function getCreatedAtAttribute($value){
        $v = new Verta($value);
        return $v->format('date');

    }
    public function getUpdatedAtAttribute($value){
        $v = new Verta($value);
      // $v->format('date');
        return $v->diffFormat();

    }
    public function getPhotoIdAttribute($value){


        if ($photo_path=Photo::find($value)){
            return 'images/users/'.$photo_path->path;
        }
        return 'images/profile.jpg';
    }
    public function isAdmin(){


        if ($this->role->name=='admin'){
            return true;
        }
        return false;

    }
}
