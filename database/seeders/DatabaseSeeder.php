<?php

namespace Database\Seeders;

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
         \App\Models\User::factory(1)->create([
             'name' => 'Ahsan Tariq',
             'email' => 'ahsantariq1713@gmail.com',
             'role' => \App\Models\User::ADMIN_KEY,
         ]);
    }
}
