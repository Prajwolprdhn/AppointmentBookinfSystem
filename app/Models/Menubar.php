<?php

namespace App\Models;

use App\Models\Page;
use App\Models\Modules;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menubar extends Model
{
    use HasFactory;

    protected $table = 'menubar';


    protected $fillable = [
        'name',
        'type',
        'status',
        'display_order',
        'external_link',
        'module_id',
        'page_id',
        'parent_id',
    ];


    public function modules()
    {
        return $this->hasOne(Modules::class, 'id', 'module_id');
    }

    public function pages()
    {
        return $this->hasMany(Page::class, 'id', 'page_id');
    }

    public function parent()
    {
        return $this->belongsTo(Menubar::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Menubar::class, 'parent_id');
    }
}
