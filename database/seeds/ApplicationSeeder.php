<?php

use Illuminate\Database\Seeder;

use App\Application;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 11; $i++) {
        	if ($i == 2) {
        		continue;
        	}
        	$app = new Application;
        	$app->opening_id = 1;
        	$app->expert_id = $i;
        	$app->save();
        	foreach ($app->opening->)
        }
    }
}
