<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Santosh Rimal',
            'email' => '2054santoshrimal@gmail.com',
            'password' => Hash::make('password'),
            'role'=>'admin',
            'image'=>'https://cdn2.iconfinder.com/data/icons/people-groups/512/Man_Woman_Avatar-512.png',
        ]);
    }
}