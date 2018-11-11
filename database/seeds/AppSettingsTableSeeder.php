<?php

use Illuminate\Database\Seeder;

class AppSettingsTableSeeder extends Seeder {
 
    public function run()
    {
         //delete books table records
         DB::table('app_settings')->delete();
         //insert some dummy records
         DB::table('app_settings')->insert(
         	array(
	            array('booklist_bg_option'=> 'color', 'booklist_bg_color' =>'#f4f4f4', 'booklist_bg_image'=> NULL, 'specieslist_bg_option'=> 'color', 'specieslist_bg_color' =>'#f4f4f4', 'specieslist_bg_image'=> NULL, 'voicelist_bg_option'=> 'color', 'voicelist_bg_color' =>'#f4f4f4', 'voicelist_bg_image'=> NULL, 'pageA_bg_option'=> 'color', 'pageA_bg_color' =>'#f4f4f4', 'pageA_bg_image'=> NULL, 'pageB_bg_option'=> 'color', 'pageB_bg_color' =>'#f4f4f4', 'pageB_bg_image'=> NULL, 'pageC_bg_option'=> 'color', 'pageC_bg_color' =>'#f4f4f4', 'pageC_bg_image'=> NULL)
         	)
        );
    }



}