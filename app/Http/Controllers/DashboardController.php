<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\Extracurricular;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $student = Student::all();
        $class = ClassModel::all();
        $eskul = Extracurricular::all();
        $teacher = Teacher::all();
        return view('dashboard', [
            'title' => 'Dashboard',
            'student' => $student,
            'class' => $class,
            'eskul' => $eskul,
            'teacher' => $teacher
        ]);
    }
}