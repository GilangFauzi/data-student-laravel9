<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

// class StudentImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
class StudentImport implements ToModel, WithHeadingRow, WithValidation
{
    // todo WithHeadingRow = biar ga gini [0], jadi bisa gini ['name']
    // todo WithValidation = buat validasi row
    // todo SkipsOnFailure = biar data baru di dalam excel bisa di upload, dan data lama ga di upload

    protected $signature = 'import:excel';

    protected $description = 'Laravel Excel importer';

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // $name = ['name' => $row['name']];
        // $nim = ['nim' => $row['nim']];
        // $gender = ['gender' => $row['gender']];
        // $class_id = ['class_id' => $row['gender']];

        // $validate = [
        //     $name => 'required',
        //     $nim => 'required|numeric',
        //     $gender => 'required',
        //     $class_id => 'required|numeric',
        // ];
        // $data = $row[$validate]->validate($validate);
        // return new Student($data);

        return new Student([
            'name'     => $row['name'],
            'nim'    => $row['nim'],
            'gender'    => $row['gender'],
            'class_id'    => $row['class_id'],
        ]);
    }
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'nim' => 'required|unique:students|max_digits:15|numeric',
            'gender' => 'Required|string',
            'class_id' => 'required|numeric'
        ];
    }
}