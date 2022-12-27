<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = ['id'];

    public function class()
    {
        // many to one = belongsTo
        return $this->belongsTo(ClassModel::class);
    }
    public function extracurriculars()
    {
        // masukin nama table pivode yang udah dibuat. terus masukin field id masing" yang udah dibuat
        return $this->belongsToMany(Extracurricular::class, 'student_extracurricular', 'student_id', 'extracurricular_id');
    }

    // ini wajib digunakan ketika nama table nya singular atau seperti "student". kalau plular ga wajib.
    // protected $table = 'students';

    // ini wajib digunakan ketika id di table bukan id, melaikan student_id.
    // protected $primaryKey = "student_id";

    // ini digunakan ketika id nya gamau di auto_increment
    // public $incrementing = false;

    // ini digunakan ketika tipe data dari id nya bukan integer
    // protected $keyType = "string";

    // kalau di dalam table ga ada created_at dan updated_at, tambahkan ini. agar laravel tau kalau itu ga ada.
    // public $timestamps = false;
}