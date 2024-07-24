<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Classes extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code'
    ];

    public function grades(): BelongsToMany
    {
        return $this->belongsToMany(Grades::class);
    }
}
