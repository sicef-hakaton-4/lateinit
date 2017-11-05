<?php

use Illuminate\Database\Seeder;

use App\Application;

use App\Answer;

use Carbon\Carbon;

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
            $app->applied_at = Carbon::now()->toDateTimeString();
        	$app->save();
        	foreach ($app->opening->tests as $test) {
        		foreach ($test->questions() as $question) {
        			$ans = new Answer;
        			$ans->question_id = $question->id;
        			$ans->question_type = $question->type;
        			$ans->answer = 'kakoe koke?';
        			$ans->application_id = $app->id;
        			$ans->save();
        		}
        	}
        }
    }
}
