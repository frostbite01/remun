<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
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
        User::create([
            'name' => 'Bayu Satrio',
            'email' => 'bsat@tua.io',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'Farhan',
            'email' => 'fshaldy46@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('hanpor123'),
            'role' => 'admin',
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
