<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\ClassModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // schema disini digunakan ketika ada relation table biar bisa di hapus
        Schema::disableForeignKeyConstraints();
        // truncate disini digunakan untuk menghapus semua data pada table class
        ClassModel::truncate();
        Schema::enableForeignKeyConstraints();

        // seed menggunakan multiple array
        $class = [
            ['name' => '08TPLP001'],
            ['name' => '08TPLP002'],
            ['name' => '08TPLP003'],
        ];
        foreach ($class as $value) {
            ClassModel::insert([
                'name' => $value['name'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}