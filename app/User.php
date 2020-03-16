<?php

namespace App;

use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, ShinobiTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','email','ap_paterno','ap_materno','dni', 'password','gender',
        'f_birth','office_id','position','regime','phone','status'
    ];
    protected $appends =['full_name'];
    
    /**
     * The attributes that should be hidden for arrays CUAL?.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function leaves()
    {
        return $this->hasMany(Leave::class);
    }

    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    public function getFullNameAttribute()
    {
        return "{$this->ap_paterno} {$this->ap_materno}, {$this->name}";
    }

    
}
