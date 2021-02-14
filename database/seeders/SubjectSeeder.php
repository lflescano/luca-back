<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Subject;
use Carbon\Carbon;
use DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds for creating 11 Subjects. 10 using factory
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert([
            'name' => 'Matematica 6',
            'description' => 'Matematica 6 descripcion',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        Subject::factory()->count(10)->create();
    }
}
