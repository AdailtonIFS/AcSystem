<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Labs extends Model
{
    public $timestamps = false;
    protected $table = 'laboratories';
    public $fillable = ['id','description','status'];
}
