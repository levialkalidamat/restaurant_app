<?php

namespace Database\Seeders;

use Database\Seeders\Admin;
use Illuminate\Database\Seeder;
use Database\Seeders\PlatSeeder;
use Database\Seeders\CategorySeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        //

        $this->call(Admin::class);
        /*$this->call([
            Admin::class,
            PlatSeeder::class,
            CategorySeeder::class
        ]);*/
        
        
    }
}
