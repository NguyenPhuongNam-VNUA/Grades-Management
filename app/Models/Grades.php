<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
        'class_id',
        'subject_id',
    ];

    public function subjects(): BelongsToMany
    {
        return $this->belongsToMany(Subject::class,'grades_subject','grade_id','subject_id');
    }

    public function class(): BelongsTo
    {
        return $this->belongsTo(Classes::class);
    }
}
