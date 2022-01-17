<?php

namespace Database\Seeders;

use App\Models\contact;
use App\Models\detailAlamat;
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
            User::factory(1)->create();
            UserDetail::factory(1)->create();
            detailAlamat::factory(1)->create();
            contact::factory(1)->create();
        }
        $records_to_delete = UserDetail::whereDoesntHave('alamat')->pluck('nim');
        foreach($records_to_delete as $record){
            $user = User::where('nim', '=', $record)->first();
            $userdetail = UserDetail::where('nim', '=', $record)->first();

            $user->delete();
            $userdetail->delete();
        }

        Hobi::factory(15)->create();
    }
}
