<?php

namespace App\Http\Controllers;

use App\Models\Extracurricular;
use Illuminate\Http\Request;

class ExtracurricularController extends Controller
{
    public function index()
    {
        // $eskul = Extracurricular::with('student')->get();
        $eskul = Extracurricular::all();
        return view('extracurricular.index', [
            'title' => 'Extracurricular',
            'eskul' => $eskul
        ]);
    }

    public function show($id)
    {
        $eskul = Extracurricular::with('student')->findOrFail($id);
        return view(
            'extracurricular.detail',
            [
                'title' => 'Extracurricular',
                'eskul' => $eskul
            ]
        );
    }
}