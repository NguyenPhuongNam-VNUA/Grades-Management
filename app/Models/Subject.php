<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function grades(): belongsToMany
    {
        return $this->belongsToMany(Grades::class,'grades_subject','subject_id','grade_id');
    }


}
