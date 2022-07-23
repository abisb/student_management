<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class CreateTeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('teacher')->insert([[
            'id'=>'1',
            'teacher_name' => 'Teacher1',
           
        ],[
            'id'=>'2',
            'teacher_name' => 'Teacher2',
           
        ],
        [
            'id'=>'3',
            'teacher_name' => 'Teacher3',
           
        ],
        [
            'id'=>'4',
            'teacher_name' => 'Teacher4',
           
        ],
        ]);
    }
}
