<?php

namespace Database\Seeders;

use App\Models\Hobi;
use App\Models\User;
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

        for ($i = 0; $i < 15; $i++){
            \App\Models\User::factory(1)->create();
            \App\Models\UserDetail::factory(1)->create();
            \App\Models\detailAlamat::factory(1)->create();
        }
        $records_to_delete = UserDetail::whereDoesntHave('alamat')->pluck('nim');
        foreach($records_to_delete as $record){
            $user = User::where('nim', '=', $record)->first();
            $userdetail = UserDetail::where('nim', '=', $record)->first();

            $user->delete();
            $userdetail->delete();
        }

        \App\Models\Hobi::factory(15)->create();
    }
}
