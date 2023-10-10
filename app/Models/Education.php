<?php

namespace App\Models;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'level',
        'institution',
        'completion_year',
        'board',
        'score',
        'doctors_id'
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
