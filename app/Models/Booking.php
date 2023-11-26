<?php

namespace App\Models;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Schedule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_date_bs',
        'book_date_ad',
        'remarks',
        'schedule_id',
        'patient_id',
        'doctors_id',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
