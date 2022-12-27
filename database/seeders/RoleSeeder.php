<?php

namespace Database\Seeders;

use App\Models\RoleModel;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
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
        RoleModel::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            ['name' => 'Admin'],
            ['name' => 'Teacher'],
            ['name' => 'Student']
        ];
        foreach ($data as $value) {
            RoleModel::insert([
                'name' => $value['name'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}