<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Message;
use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        //User::factory()->create([
          //php   'name' => 'Test User',
          //  'email' => 'test@example.com',
        //]);
       // $this->call([Messageseeder::class]);
        //$this->call([Userseeder::class]);
        $this->call([Categoryseeder::class]);
    }
}
