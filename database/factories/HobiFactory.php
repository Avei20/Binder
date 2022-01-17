<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use tidy;

class HobiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nim_list = User::all()->pluck('nim')->toArray();
        $hobi = array('Olahraga', 'Basketball', 'Billiard', 'Diving', 'Hiking', 'Reading', 'Shooting', 'Eating');

        return [
            'namaHobi' => $this->faker->randomElement($hobi),
            'nim' => $this->faker->randomElement($nim_list)
        ];
    }
}
