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
	            array('name'=> 'Administrator', 'email'=> "saad.towheed@gmail.com", "password" => bcrypt('password'), "avatar"=>"http://ec2-18-220-207-98.us-east-2.compute.amazonaws.com:8000/images/avatar.png")
         	)
        );
    }



}