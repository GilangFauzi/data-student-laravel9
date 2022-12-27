<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Student;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // kalau pake ini gaperlu "php artisan db:seed --class=ClassSeed".
        // cukup php artisan db:seed.

        // parent harus di palingatas dari child nya. jadi bisa dibilang parent karena dia nipip forgein key nya.
        $this->call([
            ClassSeeder::class,
            StudentSeeder::class,
        ]);
    }
}