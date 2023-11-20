<?php

namespace App\Models;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_date_bs',
        'book_date_ad',
        'book_time',
        'remarks',
        'patient_id',
        'doctors_id',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
