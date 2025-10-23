<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title',
        'description',
        'level',
        'start_time',
        'end_time',
        'quota',
        'coach_name'
    ];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'enrollments');
    }
}
