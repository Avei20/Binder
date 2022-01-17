<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nim_list = User::all()->pluck('nim')->toArray();
        $gender = array('m', 'f');
        return [
            'nim' =>$this->faker->unique()->randomElement($nim_list),
            'nama' =>$this->faker->name(),
            'tempatLahir'=> $this->faker->city(),
            'tanggalLahir'=> $this->faker->date('Y-m-d'),
            'gender' => $this->faker->randomElement($gender),
            'profilePhoto' => $this->faker->image('public/storage/profile', 640, 480, null, false)
        ];
    }
}