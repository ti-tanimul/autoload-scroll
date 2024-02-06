<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $student = [
            ['name'=>'tanimul1','email'=> 'tanimul1@gmail.com','phone'=>12344],
            ['name'=>'tanimul2','email'=> 'tanimul2@gmail.com','phone'=>12345],
            ['name'=>'tanimul3','email'=> 'tanimul3@gmail.com','phone'=>12346],
            ['name'=>'tanimul4','email'=> 'tanimul4@gmail.com','phone'=>12347],
        ];
        Student::insert($student);
    }
}
