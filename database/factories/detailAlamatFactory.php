<?php

namespace Database\Factories;

use App\Models\UserDetail;
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

        // $generated_nim_list = detailAlamat::whereDoesntHave('')->pluck('nim');
        $nim_list = UserDetail::whereDoesntHave('alamat')->pluck('nim');
        $nim = $this->faker->randomElement($nim_list);
        return [
            'nim'=>$nim,
            'namaJalan'=>$this->faker->streetName(),
            'kecamatan'=>$this->faker->streetAddress()
        ];
    }
}
