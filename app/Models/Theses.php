<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theses extends Model
{
    use HasFactory;
    protected $table = 'theses';
    protected $primaryKey = 'call_number';
    public function subject(){
        return $this->belongsTo(Subject::class, 'subject_id');
    }
    protected $fillable = [
        'author',
        'title',
        'publication_year',
        'subject_id',
        'availability_status',
        'created_at',
        'updated_at'
    ];
}
