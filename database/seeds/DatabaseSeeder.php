<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(userSeeder::class);
        $this->call(ExpertSeeder::class);
        $this->call(openingSeeder::class);
        $this->call(TestSeeder::class);
        $this->call(ApplicationSeeder::class);
    }
}
