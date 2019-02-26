<?php

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->truncate();

        DB::table('students')->insert([
        	'name' => "Student 1"
        ]);
        DB::table('students')->insert([
        	'name' => "Student 2",
        	'classroom_id' => 1
        ]);
        DB::table('students')->insert([
        	'name' => "Student 3",
        	'classroom_id' => 2
        ]);
        DB::table('students')->insert([
        	'name' => "Student 4",
        	'classroom_id' => 3
        ]);
        DB::table('students')->insert([
        	'name' => "Student 5",
        	'classroom_id' => 1
        ]);
    }
}
