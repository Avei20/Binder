<?php

namespace Database\Seeders;

use App\Models\Hobi;
use App\Models\UserDetail;
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
        \App\Models\User::factory(10)->create();
        \App\Models\UserDetail::factory(10)->create();
        Hobi::factory(10)->create();
    }
}
