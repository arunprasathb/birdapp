<?php

use Illuminate\Database\Seeder;

class VoicesTableSeeder extends Seeder {
 
    public function run()
    {
         //delete books table records
         DB::table('voices')->delete();
         //insert some dummy records
         DB::table('voices')->insert(
         	array(
	            array('name'=>'Whistles:Black-capped', 'mediaUrl' => 'http://18.222.200.228/sample/media/calls1.mp3', 'species_id' => 1),
                array('name'=>'Whistles:Tufted Titmouse','mediaUrl' => 'http://18.222.200.228/sample/media/calls2.mp3', 'species_id' => 1),
                array('name'=>'Harsh sounds:Blue jay', 'mediaUrl' => 'http://18.222.200.228/sample/media/calls3.mp3', 'species_id' => 1),
                array('name'=>'Harsh sounds:American Crow', 'mediaUrl' => 'http://18.222.200.228/sample/media/calls4.mp3', 'species_id' => 1),
                array('name'=>'Liquid or flutelike:Wood Thrush', 'mediaUrl' => 'http://18.222.200.228/sample/media/calls5.mp3', 'species_id' => 1),
                array('name'=>'Liquid or flutelike:Hermnit Thrush', 'mediaUrl' => 'http://18.222.200.228/sample/media/calls6.mp3', 'species_id' => 2),
                array('name'=>'Trills: Dark-eyed junco', 'mediaUrl' => 'http://18.222.200.228/sample/media/calls7.mp3', 'species_id' => 2),
                array('name'=>'Trils: Pine Warbler', 'mediaUrl' => 'http://18.222.200.228/sample/media/calls8.mp3', 'species_id' => 2),
                array('name'=>'Mnemonics: Carolina wren', 'mediaUrl' => 'http://18.222.200.228/sample/media/calls9.mp3', 'species_id' => 2 ),
                array('name'=>'Northern Cardinal', 'mediaUrl' => 'http://18.222.200.228/sample/media/calls10.mp3', 'species_id' => 10),
                array('name'=>'Northern Cardinal', 'mediaUrl' => 'http://18.222.200.228/sample/media/calls1.mp3', 'species_id' => 3),
                array('name'=>'Harsh sounds:Blue jay', 'mediaUrl' => 'http://18.222.200.228/sample/media/calls2.mp3', 'species_id' => 3),
                array('name'=>'"Whistles:Tufted Titmouse', 'mediaUrl' => 'http://18.222.200.228/sample/media/calls3.mp3', 'species_id' => 3),
                array('name'=>'Liquid or flutelike:Wood Thrush', 'mediaUrl' => 'http://18.222.200.228/sample/media/calls4.mp3', 'species_id' => 9),
                array('name'=>'Whistles:Black-capped', 'mediaUrl' => 'http://18.222.200.228/sample/media/calls5.mp3', 'species_id' => 4),
                array('name'=>'Whistles:Tufted Titmouse', 'mediaUrl' => 'http://18.222.200.228/sample/media/calls6.mp3', 'species_id' => 4),
                array('name'=>'Harsh sounds:Blue jay', 'mediaUrl' => 'http://18.222.200.228/sample/media/calls7.mp3', 'species_id' => 4),
                array('name'=>'Harsh sounds:American Crow', 'mediaUrl' => 'http://18.222.200.228/sample/media/calls8.mp3', 'species_id' => 5),
                array('name'=>'Liquid or flutelike:Wood Thrush', 'mediaUrl' => 'http://18.222.200.228/sample/media/calls9.mp3', 'species_id' => 5),
                array('name'=>'Liquid or flutelike:Hermnit Thrush', 'mediaUrl' => 'http://18.222.200.228/sample/media/calls10.mp3', 'species_id' => 6),
                array('name'=>'Trills: Dark-eyed junco', 'mediaUrl' => 'http://18.222.200.228/sample/media/calls1.mp3', 'species_id' => 6),
                array('name'=>'Trils: Pine Warbler', 'mediaUrl' => 'http://18.222.200.228/sample/media/calls2.mp3', 'species_id' => 7),
                array('name'=>'Mnemonics: Carolina wren', 'mediaUrl' => 'http://18.222.200.228/sample/media/calls3.mp3', 'species_id' => 7 ),
                array('name'=>'Northern Cardinal', 'mediaUrl' => 'http://18.222.200.228/sample/media/calls4.mp3', 'species_id' => 7),
                array('name'=>'Northern Cardinal', 'mediaUrl' => 'http://18.222.200.228/sample/media/calls5.mp3', 'species_id' => 8),
                array('name'=>'Harsh sounds:Blue jay', 'mediaUrl' => 'http://18.222.200.228/sample/media/calls6.mp3', 'species_id' => 6),
                array('name'=>'"Whistles:Tufted Titmouse', 'mediaUrl' => 'http://18.222.200.228/sample/media/calls7.mp3', 'species_id' => 5),
                array('name'=>'Liquid or flutelike:Wood Thrush', 'mediaUrl' => 'http://18.222.200.228/sample/media/calls8.mp3','species_id' => 5)
            )
        );
    }
}