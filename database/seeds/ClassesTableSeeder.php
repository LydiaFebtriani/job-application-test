<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classes')->truncate();

        DB::table('classes')->insert([
        	'name' => "Class 1",
        	'teacher_id' => 3,
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('classes')->insert([
        	'name' => "Class 2",
        	'teacher_id' => 2,
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('classes')->insert([
        	'name' => "Class 3",
        	'teacher_id' => 2,
        	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
