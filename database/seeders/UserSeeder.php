<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use Carbon\Carbon;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'admin@admin.com',
            'name' => 'admin',
            'password' => bcrypt('Ac123456'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        User::factory()->count(10)->create();

    }
}
