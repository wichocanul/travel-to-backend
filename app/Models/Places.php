<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Places extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'coordinates',
        'images',
        'price',
        'type',
        'dayEvent',
        'hourEvent',
    ];

    // we defina the relationship with the Categories model
    public function category()
    {
        return $this->belongsTo(Categories::class, 'type');
    }
}
