<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    // ini digunakan ketika nama model dan nama table berbeda
    protected $table = 'class';

    public function student()
    {
        // one to many = hasMany
        // itu class_id dan id dipake karena nama table di db dan di nama model nya beda, jadi gabisa ngebaca laravel nya. 
        return $this->hasMany(Student::class, 'class_id', 'id');
    }
    public function homeroomTeacher()
    {
        // ini merupakan contoh nested relationship, atau relasi lebih dari 2 table, dan cara penggunaan nya liat di controller student
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }
}