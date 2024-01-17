<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;
    protected $table = 'borrow';
    public $fillable = [
        'borrower_id_number',
        'material_id',
        'category',
        'borrowed_at',
        'returned_at'
    ];
    public $timestamps = false;
}
