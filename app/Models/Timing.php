<?php

namespace App\Models;

use App\Models\Schedule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Timing extends Model
{
    use HasFactory;

    protected $fillable = [
        'timings'
    ];

}
