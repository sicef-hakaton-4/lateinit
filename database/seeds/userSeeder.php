<?php

use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        \Illuminate\Support\Facades\DB::enableQueryLog();
        for ($i  = 1; $i < 3; $i++) {
        	$email = 'test' . $i . '@gmail.com';
        	factory(\App\User::class, 1)->create(['email' => $email, 'type' => $i])->each(function ($user) use ($i) {
                if ($i == 1) {
                    factory(App\ExpertDescription::class, 1)->create(['expert_id' => 1]);
                    factory(App\Project::class, 5)->create(['owner_id' => 1, 'owner' => 0]);
                }
                else {
                    factory(App\CompanyDescription::class, 1)->create(['company_id' => 2]);
                    factory(App\Project::class, 5)->create(['owner_id' => 2, 'owner' => 1]);
                }
            });
        }
        // dd(\Illuminate\Support\Facades\DB::getQueryLog());
    }
}