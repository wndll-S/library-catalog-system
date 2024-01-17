<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Genre extends Model
{
    use HasFactory;

    protected $table = 'genre';
    public function books():HasMany
    {
        return $this->hasMany(Books::class, 'genre_id');
    }
    protected $fillable = [
        'title', 
        'created_at',
        'updated_at'
    ];
}
