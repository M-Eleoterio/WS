<?php

namespace Database\Seeders;

use App\Models\Token;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Workspace;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /* User::factory(9)->create();

        User::factory()->create([
            'name' => 'test',
            'email' => 'test@example.com',
            'password' => '123',
            'auth' => false,

        ]); */

        Workspace::factory(10)->create();
        // Token::factory(30)->create();
    }
}
