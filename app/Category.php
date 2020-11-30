<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    protected $table = 'categories';
    public $fillable = ['id','description'];
    public function users()
    {
        return $this->belongsTo(User::class, 'id', 'category_id');
    }
}
