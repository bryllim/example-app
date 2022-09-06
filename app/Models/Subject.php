<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $table = "subjects";

    protected $fillable = [
        'name',
        'grade',
        'student_id',
    ];
    
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

}
