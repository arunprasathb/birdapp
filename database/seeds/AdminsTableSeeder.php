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
	            array('name'=> 'Super Admin', 'email'=> "saad.towheed@gmail.com", "password" => bcrypt('password'), "avatar"=>"http://18.222.200.228/images/avatar.png", 'role'=>1),
                array('name'=> 'Administrator', 'email'=> "arunb.crm@gmail.com", "password" => bcrypt('password'), "avatar"=>"http://18.222.200.228/images/avatar.png", 'role'=>2)
         	)
        );
    }



}