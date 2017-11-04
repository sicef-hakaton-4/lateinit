<?php

use Illuminate\Database\Seeder;

use \App\Test;

use \App\MultipleQuestion;

use \App\CodeQuestion;

use \App\FileQuestion;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($openId = 1; $openId < 11; $openId++) {
        	for ($queue = 1; $queue < 4; $queue++) {
        		$tst = new Test;
        		$tst->opening_id = $openId;
        		$tst->queue = $queue;
        		$tst->min_rate = (rand() % 10) + 1;
        		$tst->save();
        		for ($question = 0; $question < 4; $question++) {
        			$type = ()
        		}
        	}
        }
    }
}
