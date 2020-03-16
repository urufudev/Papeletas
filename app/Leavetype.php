<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leavetype extends Model
{
    protected $fillable=[
        'name','slug','body','status'
    ];

    public function leaves()
    {
        return $this->hasMany(Leave::class);
    }

}
