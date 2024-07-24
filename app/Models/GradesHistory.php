<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradesHistory extends Model
{
    use HasFactory;

    protected $table = 'grades_history';
    protected $fillable = ['class_id', 'subject_id', 'lecturer_id', 'date'];
}
