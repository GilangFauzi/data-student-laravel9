<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extracurricular extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function student()
    {
        // jadi student_extracurricular itu nama pivode table nya, terus extracurricular_id dan student_id itu forgeinKey nya

        // jadi kalau mau masukin nama mahasiswanya, buat id mahasiswa nya di paling terakhir
        return $this->belongsToMany(Student::class, 'student_extracurricular', 'extracurricular_id', 'student_id');
    }
}
