<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Subject;
use App\Models\Question;

use Carbon\Carbon;
use DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds. Creating 50 Questions with Random Users and Subjects already created.
     *
     * @return void
     */
    public function run()
    {
        Question::factory()->count(50)->create();
    }
}
