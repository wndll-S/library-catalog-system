<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
    protected $table = 'books';
    public function genre(){
        return $this->belongsTo(Genre::class, 'genre_id');
    }

    protected $fillable = [
        'title',
        'author',
        'year_published',
        'call_number',
        'availability_status',
        'genre_id',
        'created_at',
        'updated_at'
    ];
}
