<?php

use Illuminate\Database\Seeder;

class ClassroomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classrooms')->truncate();

        DB::table('classrooms')->insert([
        	'name' => "Class 1",
        	'teacher_id' => 3
        ]);
        DB::table('classrooms')->insert([
        	'name' => "Class 2",
        	'teacher_id' => 2
        ]);
        DB::table('classrooms')->insert([
        	'name' => "Class 3",
        	'teacher_id' => 2
        ]);
    }
}
