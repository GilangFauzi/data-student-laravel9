<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teacher = Teacher::select('id', 'name')->get();
        return view(
            'teacher.index',
            [
                'title' => 'Teacher',
                'name' => 'Gilang Fauzi',
                'teacher' => $teacher
            ]
        );
    }

    public function show($id)
    {
        $teacher = Teacher::with('class.student')->findOrFail($id);
        return view(
            'teacher.detail',
            [
                'title' => 'Teacher',
                'teacher' => $teacher
            ]
        );
    }
}