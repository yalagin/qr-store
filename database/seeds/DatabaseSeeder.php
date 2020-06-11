<?php

use App\Models\Products;
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
//        // $this->call(UserSeeder::class);
//        $this->call(categoriesTableSeeder::class);
//        factory(Products::class,40)->create();
        factory(\App\Models\Options::class,40)->create();
//        factory(\App\User::class,10)->create();
    }
}
