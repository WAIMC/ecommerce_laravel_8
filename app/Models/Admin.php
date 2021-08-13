<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Role;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are used to protect your database from a mass assignment.
     *
     * @var array
     */
    protected $table = 'admin';
    
    /**
     * The attributes that are used to protect your database from a mass assignment.
     *
     * @var array
     */
    protected $guard = 'adminAuth';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    	'email',
    	'password',
    	'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // search item with function scope
    public function scopeSearch($query)
    {
        if(request()->key){
            $query = $query->where('name','like','%'.request()->key.'%');
        }
        return $query;
    }

    // get data from AdminRole table
    public function admin_role()
    {
        return $this->hasMany(AdminRole::class,'admin_id','id');
    }

    public function hasPermission($route)
    {
        return in_array($route,$this->routes()) ? true : false;
    }
    
    public function routes()
    { 
        $data = [];
        foreach ($this->getRoles as $role) { // getRoles() is not method, is property
            $permission = json_decode($role->permission);
            foreach ($permission as $per) {
                if(!in_array($per,$data)){
                    array_push($data,$per);
                }
            }
        }
        return $data;
    }

    public function getRoles()
    {
        return $this->belongsToMany(Role::class,'admin_role','admin_id','role_id');
    }
}
