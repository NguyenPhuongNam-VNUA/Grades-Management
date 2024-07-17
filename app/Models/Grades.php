<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grades extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'student_code',
        'student_fullname',
        'student_email',
        'attendance_score',
        'midterm_score',
        'final_score',
        'average_of_subject',
        'rank',
    ];

    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }
    
    public function lecturers()
    {
        return $this->belongsToMany(User::class);
    }
    
    public function classes()
    {
        return $this->belongsToMany(Classes::class);
    }
}