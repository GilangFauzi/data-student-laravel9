<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $student = [
        //     [
        //         'name' => 'Gilang Fauzi',
        //         'class_id' => 3,
        //         'gender' => 'Pria',
        //         'nim' => 181011400312
        //     ],
        //     [
        //         'name' => 'Maya Andriana',
        //         'class_id' => 2,
        //         'gender' => 'Wanita',
        //         'nim' => 181011400333
        //     ],
        //     [
        //         'name' => 'Intan Sapira',
        //         'class_id' => 1,
        //         'gender' => 'Wanita',
        //         'nim' => 181011400344
        //     ]
        // ];

        // foreach ($student as $value) {
        //     Student::insert([
        //         'name' => $value['name'],
        //         'class_id' => $value['class_id'],
        //         'gender' => $value['gender'],
        //         'nim' => $value['nim'],
        //     ]);
        // }

        Student::factory()->count(100)->create();
    }
}