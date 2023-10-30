<?php

namespace App\Models;

use App\Models\User;
use App\Models\Education;
use App\Models\Department;
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
        'department_id',
        'photo',
        'province',
        'district',
        'municipality',
        'ward',
        'tole',
        'gender',
        'nepali_date',
        'english_date',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function experience()
    {
        return $this->hasMany(Experience::class);
    }
    public function education()
    {
        return $this->hasMany(Education::class);
    }
    public function department(){
        return $this->belongsTo(Department::class);
    }
}
