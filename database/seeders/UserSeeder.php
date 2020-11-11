<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 10 ; $i++){
            User::query()->updateOrCreate([
                'name'=>"peruapps{$i}",
                'email'=>"peruapps{$i}@peruapps.com",
            ], [
                'name'=>"peruapps{$i}",
                'email'=>"peruapps{$i}@peruapps.com",
                'password'=>bcrypt("peruapps{$i}"),
            ]);

        }
    }
}
