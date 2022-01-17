<?php

namespace Database\Factories;

use App\Models\UserDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class contactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        // $generated_nim_list = detailAlamat::whereDoesntHave('')->pluck('nim');
        $nim_list = UserDetail::whereDoesntHave('contact')->pluck('nim');
        $nim = $this->faker->randomElement($nim_list);
        return [
            'nim'=>$nim
        ];
    }
}
