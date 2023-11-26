<?php

namespace App\Models;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    use HasFactory;

    protected $table = 'patient';

    protected $fillable = [
        'name',
        'email',
        'address',
        'contact',
        'dob_bs',
        'dob_ad',
        'gender'
    ];

    public function booking(){
        return $this->hasMany(Booking::class);
    }
}
