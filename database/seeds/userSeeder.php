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
        for ($i  = 1; $i < 3; $i++) {
        	$email = 'test' . $i . '@gmail.com';
        	factory(\App\User::class, 1)->create(['email' => $email, 'type' => $i])->each(function ($user) {
                if ($user->type == 1) {
                    factory(App\ExpertDescription::class, 1)->create(['expert_id' => 1]);
                }
                else {
                    
                }
            });
        }
    }
}