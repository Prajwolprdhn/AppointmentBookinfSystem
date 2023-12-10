<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content'
    ];

    protected $casts = [
        'title' => 'json',
        'content' => 'json',
    ];

    public function menubar()
    {
        return $this->belongsTo(Menubar::class);
    }
}
