<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{

    protected $fillable=[
        'user_id','leavetype_id','fh_from','fh_to','description','resp_msg',
        'resp_chdate','isread','status'
    ];
    protected $appends =['fh_from_format','fh_to_format','created_at_format','created_at_year_format','updated_at_format','resp_chdate_format'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function leavetype()
    {
        return $this->belongsTo(Leavetype::class);
    }

    public function getFHFromFormatAttribute()
    {
        return date('d/m/Y H:i', strtotime($this->fh_from));
    }
    public function getFHToFormatAttribute()
    {
        return date('d/m/Y H:i', strtotime($this->fh_to));
    }
    public function getCreatedAtFormatAttribute()
    {
        return $this->created_at->format('d/m/Y H:i');
    }
    public function getCreatedAtYearFormatAttribute()
    {
        return $this->created_at->format('Y');
    }

    public function getUpdatedAtFormatAttribute()
    {
        return $this->updated_at->format('d/m/Y H:i');
    }

    public function getRespChdateFormatAttribute()
    {
        return date('d/m/Y H:i', strtotime($this->resp_chdate));
    }
}
