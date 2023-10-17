<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['id', 'name', 'image', 'description'];
    protected $keyType = 'string';
    public $incrementing = false;
}
