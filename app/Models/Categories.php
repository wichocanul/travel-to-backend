<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // We define the inverse relationship with the Places model
    public function places()
    {
        return $this->hasMany(Places::class, 'type');
    }
}
