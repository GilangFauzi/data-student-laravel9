<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        // $class = ClassModel::all();
        // EAGER LOADING RELATION
        // $class = ClassModel::with('student','homeroomTeacher')->get();

        $class = ClassModel::all();
        return view('class/index', [
            'name' => 'Gilang Fauzi',
            'title' => 'Class',
            'class' => $class
        ]);
    }

    public function show($id)
    {
        $class = ClassModel::with('student', 'homeroomTeacher')->findOrFail($id);
        return view('class.detail', [
            'title' => 'Class',
            'class' => $class
        ]);
    }
}
