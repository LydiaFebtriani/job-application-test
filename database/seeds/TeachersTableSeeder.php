<?php

use Illuminate\Database\Seeder;

class TeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teachers')->truncate();

        DB::table('teachers')->insert([
        	'name' => "Teacher 1"
        ]);
        DB::table('teachers')->insert([
        	'name' => "Teacher 2"
        ]);
        DB::table('teachers')->insert([
        	'name' => "Teacher 3"
        ]);
    }
}
