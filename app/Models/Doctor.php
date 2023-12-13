<?php

namespace App\Models;

use App\Models\User;
use App\Models\Schedule;
use App\Models\Education;
use App\Models\Department;
use App\Models\Experience;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model implements Auditable
{
    use SoftDeletes;
    use HasFactory;
    use Notifiable;
    use \OwenIt\Auditing\Auditable;

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

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function experiences()
    {
        return $this->hasMany(Experience::class, 'doctors_id', 'id');
    }
    public function education()
    {
        return $this->hasMany(Education::class, 'doctors_id', 'id');
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function schedule()
    {
        return $this->hasMany(Schedule::class, 'doctors_id', 'id');
    }
    public function booking()
    {
        return $this->hasMany(Booking::class, 'doctors_id', 'id');
    }
}
