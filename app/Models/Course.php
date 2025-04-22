<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'thumbnail',
        'level',
        'category',
        'lessons_count',
        'challenges_count',
        'is_popular'
    ];

    public function modules()
    {
        return $this->hasMany(Module::class)->orderBy('order');
    }
}
