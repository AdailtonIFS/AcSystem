<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laboratory extends Model
{
    public $timestamps = false;
    protected $table = 'laboratories';
    public $fillable = ['id','description','status'];

    public function occurrences()
    {
        return $this->hasMany(Occurrence::class, 'laboratory_id', 'id');
    }
}
