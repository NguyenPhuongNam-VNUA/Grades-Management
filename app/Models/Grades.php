<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grades extends Model
{
    use HasFactory;

    const HEADINGS = [
        'id'=> 'stt',
        'student_code' => 'maSv',
        'student_fullname' => 'hvt',
        'student_email' => 'Email',
        'attendance_score' => 'cc',
        'midterm_score' => 'gk',
        'final_score' => 'ck',
        'average_of_subject' => 'tb',
    ];

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

    public function classes()
    {
        return $this->belongsToMany(Classes::class);
    }
    
    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }
    
    public function lecturers()
    {
        return $this->belongsToMany(User::class);
    }
}