<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = ['laboratory_id','day', 'start', 'end'];

    public function laboratory()
    {
        return $this->belongsTo(Laboratory::class, 'laboratory_id', 'id');
    }
}
