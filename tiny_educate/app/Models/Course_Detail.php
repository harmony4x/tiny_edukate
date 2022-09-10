<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course_Detail extends Model
{
    use HasFactory;
    protected $table = 'course_detail';
    protected $fillable = [
        'course_code', 'instructor', 'lecture', 'duration', 'start_day','skill_level','language','price', 'status'
    ];

    public function course(){
        return $this->belongsTo(Course::class,'course_code','course_code');
    }
}
