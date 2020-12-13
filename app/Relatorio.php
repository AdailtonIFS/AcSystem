<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relatorio extends Model
{
    protected $fillable = ['path','created_by'];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'registration');
    }
}
