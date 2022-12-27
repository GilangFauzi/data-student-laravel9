<?php

namespace App\Exports;

use App\Models\Student;
use App\Models\ClassModel;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

// *should auto size biar lebar kolom otomatis
// class StudentExport implements FromCollection, WithHeadings
class StudentExport implements FromView, ShouldAutoSize, WithColumnFormatting
{

    // todo kalau ada relation pake view aje, jangan pake collection
    public function view(): View
    {
        $student = Student::with('class')->get();
        return view('student.exportExcel', [
            'student' => $student
        ]);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    // public function collection()
    // {
    //     return Student::select("name", "nim", "gender", "class_id")->get();
    // }
    /**
     * Write code on Method
     *
     * @return response()
     */
    // todo di import class withHeading sama Collection kalau emang mau dipake
    // public function headings(): array
    // {
    //     return ["Name", "NIM", "Gender", "ID Class"];
    // }

    // ! mengatur lebar kolom
    // public function columnWidths(): array
    // {
    //     return [
    //         'A' => 40,
    //         'B' => 30,
    //     ];
    // }

    // todo buat atur format ankat biar ga error
    public function columnFormats(): array
    {
        return [
            // 'B' => NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE,
            'B' => NumberFormat::FORMAT_NUMBER,
        ];
    }
}