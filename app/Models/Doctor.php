<?php

namespace App\Models;

use App\Models\Education;
use App\Models\Experience;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'lisence_no',
        'first_name',
        'last_name',
        'contact',
        'department',
        'photo',
        'province',
        'district',
        'municipality',
        'ward',
        'tole',
        'gender',
        'dob',
        'user_id'
    ];

    public function experience()
    {
        return $this->hasMany(Experience::class);
    }
    public function education()
    {
        return $this->hasMany(Education::class);
    }
}
