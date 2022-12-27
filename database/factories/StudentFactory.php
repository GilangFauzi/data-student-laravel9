<?php

namespace Database\Factories;

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = Faker::create();
        return [
            // 'class_id' => $faker->shuffle([1, 2, 3]),
            'class_id' => Arr::random([1, 2, 3]),
            'name' => fake()->name(),
            // 'nim' => $faker->randomDigit(13),
            'nim' => mt_rand(000000000001, 999999999999),
            'gender' => Arr::random(['Pria', 'Wanita']),
            // 'created_at' => Carbon::now(),
            // 'updated_at' => Carbon::now()
        ];
    }
}