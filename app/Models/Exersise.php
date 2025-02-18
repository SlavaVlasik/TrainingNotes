<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exersise extends Model
{
    protected $table = 'exercises';
    protected $fillable = ['name', 'counts'];
   
}
