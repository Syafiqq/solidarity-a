<?php

use Illuminate\Database\Eloquent\Model;
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
        Model::unguard();

        $this->call('UserCounselorsSeeder');
        $this->call('UserStudentsSeeder');
        $this->call('CouponSeeder');
        $this->call('QuestionCategoriesSeeder');
        $this->call('QuestionFavoursSeeder');
        $this->call('QuestionOptionsSeeder');
        $this->call('QuestionsSeeder');
        $this->call('AnswersSeeder');
        $this->call('AnswerDetailsSeeder');
        $this->call('AnswerResultsSeeder');
    }

}
