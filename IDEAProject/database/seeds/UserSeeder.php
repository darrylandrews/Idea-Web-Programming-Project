<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            ['role_id' => '1', 'name' => 'Darryl Andrews', 'email' => 'darryl.andrews@binus.ac.id', 'password' => bcrypt('darryl'), 'address' => 'Pondok Hijau Golf', 'gender' => 'Male', 'dob' => '2000-06-11'],
            ['role_id' => '1', 'name' => 'Felix Pirdaus', 'email' => 'felix.pirdaus@binus.ac.id', 'password' => bcrypt('felix'), 'address' => 'Scientia Square', 'gender' => 'Male', 'dob' => '2000-02-17'],
            ['role_id' => '2', 'name' => 'Michael Andrew', 'email' => 'michael.andrew@binus.ac.id', 'password' => bcrypt('mike1234'), 'address' => 'Jakarta', 'gender' => 'Female', 'dob' => '2000-06-02'],
            ['role_id' => '2', 'name' => 'Max Richard', 'email' => 'max.richard@binus.ac.id', 'password' => bcrypt('rich1234'), 'address' => 'Jakarta', 'gender' => 'Female', 'dob' => '2000-06-05']
        ]);
    }
}
