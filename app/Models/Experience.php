<?php

namespace App\Models;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'organization',
        'position',
        'start_date',
        'end_date',
        'job_description',
        'doctors_id'
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
