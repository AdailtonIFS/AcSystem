<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Occurrence extends Model
{
    public $timestamps = false;
    protected $table = 'occurrences';
    protected $fillable = ['id','user_registration','laboratory_id','date','hour','occurrence','observation'];

    public function laboratory()
    {
        return $this->belongsTo(Laboratory::class, 'laboratory_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_registration', 'registration');
    }
}
