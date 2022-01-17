<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class detailAlamatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nim_list = User::all()->pluck('nim')->toArray();

        return [
            'namaJalan' => $this->faker->streetName(),
            'kecamatan' => $this->faker->streetAddress(),
        ];
    }
}
