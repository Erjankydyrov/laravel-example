<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'price', 'image'];
    protected $keyType = 'string';
    public $incrementing = false;

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
