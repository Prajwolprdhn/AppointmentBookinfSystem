<?php

namespace App\Models;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Schedule extends Model
{
    use HasFactory;

    protected $table = 'schedule';

    protected $fillable = [
        'date_bs',
        'date_ad',
        'doctors_id',
        'day',
        'user_id',
        'start_time',
        'end_time'
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
