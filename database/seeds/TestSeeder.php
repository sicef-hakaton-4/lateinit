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
        for ($openId = 1; $openId < 51; $openId++) {
        	for ($queue = 1; $queue < 4; $queue++) {
        		$tst = new Test;
        		$tst->opening_id = $openId;
        		$tst->queue = $queue;
        		$tst->min_rate = (rand() % 10) + 1;
                $tst->minutes = 2;
                $tst->seconds = 30;
        		$tst->save();
        		for ($question = 0; $question < 4; $question++) {
        			$type = (rand() % 3) + 1;
                    switch ($type) {
                        case 1:
                            factory(App\MultipleQuestion::class, 1)->create(['test_id' => $tst->id]);
                            break;
                        case 2:
                            factory(App\CodeQuestion::class, 1)->create(['test_id' => $tst->id]);
                            break;
                        case 3:
                            factory(App\FileQuestion::class, 1)->create(['test_id' => $tst->id]);
                            break;
                    }
        		}
        	}
        }
    }
}
