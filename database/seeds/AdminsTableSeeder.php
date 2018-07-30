<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder {
 
    public function run()
    {
         //delete books table records
         DB::table('admins')->delete();
         //insert some dummy records
         DB::table('admins')->insert(
         	array(
	            array('name'=> 'Administrator', 'email'=> "murugan.m15890@gmail.com", "password" => bcrypt('password'), "avatar"=>"")
         	)
        );
    }



}