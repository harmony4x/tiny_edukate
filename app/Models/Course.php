<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'course';
    protected $fillable = [
        'title', 'slug', 'description', 'course_code','quantity','sold', 'category_id', 'status'
    ];
    public function course_details(){
        return $this->hasOne(Course_Detail::class,'course_code','course_code');
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
