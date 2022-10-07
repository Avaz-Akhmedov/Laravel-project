<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\People;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);

       $user = User::factory()->create([
           "name" => "Avaz Akhmedov",
           "email" => "avaz.corp@gmail.com",
           "password" => Hash::make("1111")
        ]);

            People::factory(6)->create([
                "user_id" => $user->id
            ]);

    }
}
