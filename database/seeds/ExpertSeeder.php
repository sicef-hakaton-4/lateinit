<?php

use Illuminate\Database\Seeder;

class ExpertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 7)->create(['type' => 'expert'])->each(function ($u) {
        	factory(App\ExpertDescription::class, 1)->create(['expert_id' => $u->id]);
        });
    }
}
