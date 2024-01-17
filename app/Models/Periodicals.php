<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodicals extends Model
{
    use HasFactory;
    protected $table = 'periodicals';
    protected $primaryKey = 'accession_number';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'accession_number',
        'title',
        'volume_number',
        'issue_number',
        'period_covered',
        'availability_status',
        'created_at',
        'updated_at'
    ];
}
