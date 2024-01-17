<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Theses;

class Subject extends Model
{
    use HasFactory;
    protected $table = 'subject';
    public function theses()
    {
        return $this->hasMany(Theses::class, 'subject_id');
    }
    protected $fillable = [
        'title',
        'created_at',
        'updated_at'
    ];
}
