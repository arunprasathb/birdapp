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
	            array('name'=>'Whistles:Black-capped', 'mediaUrl' => 'http://ec2-52-23-210-215.compute-1.amazonaws.com:8000/media/allenshummingbird-1.mp3', 'species_id' => 1),
                array('name'=>'Whistles:Tufted Titmouse', 'mediaUrl' => 'http://ec2-52-23-210-215.compute-1.amazonaws.com:8000/media/americancrow-1.mp3', 'species_id' => 1),
                array('name'=>'Harsh sounds:Blue jay', 'mediaUrl' => 'http://ec2-52-23-210-215.compute-1.amazonaws.com:8000/media/americanrobin-2.mp3', 'species_id' => 1),
                array('name'=>'Harsh sounds:American Crow', 'mediaUrl' => 'http://ec2-52-23-210-215.compute-1.amazonaws.com:8000/media/americanrobin-3.mp3', 'species_id' => 1),
                array('name'=>'Liquid or flutelike:Wood Thrush', 'mediaUrl' => 'hhttp://ec2-52-23-210-215.compute-1.amazonaws.com:8000/media/americanrobin-5.mp3', 'species_id' => 1),
                array('name'=>'Liquid or flutelike:Hermnit Thrush', 'mediaUrl' => 'http://ec2-52-23-210-215.compute-1.amazonaws.com:8000/media/annashummingbird-1.mp3', 'species_id' => 2),
                array('name'=>'Trills: Dark-eyed junco', 'mediaUrl' => 'http://ec2-52-23-210-215.compute-1.amazonaws.com:8000/media/blackheadedgrosbeak-1.mp3', 'species_id' => 2),
                array('name'=>'Trils: Pine Warbler', 'mediaUrl' => 'http://ec2-52-23-210-215.compute-1.amazonaws.com:8000/media/blackheadedgrosbeak-6.mp3', 'species_id' => 2),
                array('name'=>'Mnemonics: Carolina wren', 'mediaUrl' => 'http://ec2-52-23-210-215.compute-1.amazonaws.com:8000/media/blackphoebe-1.mp3', 'species_id' => 2 ),
                array('name'=>'Northern Cardinal', 'mediaUrl' => 'http://ec2-52-23-210-215.compute-1.amazonaws.com:8000/media/blackphoebe-3.mp3', 'species_id' => 2),
                array('name'=>'Northern Cardinal', 'mediaUrl' => 'http://ec2-52-23-210-215.compute-1.amazonaws.com:8000/media/bluegraygnatcatcher-1.mp3', 'species_id' => 3),
                array('name'=>'Harsh sounds:Blue jay', 'mediaUrl' => 'http://ec2-52-23-210-215.compute-1.amazonaws.com:8000/media/allenshummingbird-1.mp3', 'species_id' => 3),
                array('name'=>'"Whistles:Tufted Titmouse', 'mediaUrl' => 'http://ec2-52-23-210-215.compute-1.amazonaws.com:8000/media/bullocksoriole-3.mp3', 'species_id' => 3),
                array('name'=>'Liquid or flutelike:Wood Thrush', 'mediaUrl' => 'http://ec2-52-23-210-215.compute-1.amazonaws.com:8000/media/bushtit-1.mp3', 'species_id' => 3),
                array('name'=>'Whistles:Black-capped', 'mediaUrl' => 'http://ec2-52-23-210-215.compute-1.amazonaws.com:8000/media/allenshummingbird-1.mp3', 'species_id' => 4),
                array('name'=>'Whistles:Tufted Titmouse', 'mediaUrl' => 'http://ec2-52-23-210-215.compute-1.amazonaws.com:8000/media/americancrow-1.mp3', 'species_id' => 4),
                array('name'=>'Harsh sounds:Blue jay', 'mediaUrl' => 'http://ec2-52-23-210-215.compute-1.amazonaws.com:8000/media/americanrobin-2.mp3', 'species_id' => 4),
                array('name'=>'Harsh sounds:American Crow', 'mediaUrl' => 'http://ec2-52-23-210-215.compute-1.amazonaws.com:8000/media/americanrobin-3.mp3', 'species_id' => 5),
                array('name'=>'Liquid or flutelike:Wood Thrush', 'mediaUrl' => 'hhttp://ec2-52-23-210-215.compute-1.amazonaws.com:8000/media/americanrobin-5.mp3', 'species_id' => 5),
                array('name'=>'Liquid or flutelike:Hermnit Thrush', 'mediaUrl' => 'http://ec2-52-23-210-215.compute-1.amazonaws.com:8000/media/annashummingbird-1.mp3', 'species_id' => 6),
                array('name'=>'Trills: Dark-eyed junco', 'mediaUrl' => 'http://ec2-52-23-210-215.compute-1.amazonaws.com:8000/media/blackheadedgrosbeak-1.mp3', 'species_id' => 6),
                array('name'=>'Trils: Pine Warbler', 'mediaUrl' => 'http://ec2-52-23-210-215.compute-1.amazonaws.com:8000/media/blackheadedgrosbeak-6.mp3', 'species_id' => 7),
                array('name'=>'Mnemonics: Carolina wren', 'mediaUrl' => 'http://ec2-52-23-210-215.compute-1.amazonaws.com:8000/media/blackphoebe-1.mp3', 'species_id' => 7 ),
                array('name'=>'Northern Cardinal', 'mediaUrl' => 'http://ec2-52-23-210-215.compute-1.amazonaws.com:8000/media/blackphoebe-3.mp3', 'species_id' => 7),
                array('name'=>'Northern Cardinal', 'mediaUrl' => 'http://ec2-52-23-210-215.compute-1.amazonaws.com:8000/media/bluegraygnatcatcher-1.mp3', 'species_id' => 7),
                array('name'=>'Harsh sounds:Blue jay', 'mediaUrl' => 'http://ec2-52-23-210-215.compute-1.amazonaws.com:8000/media/allenshummingbird-1.mp3', 'species_id' => 6),
                array('name'=>'"Whistles:Tufted Titmouse', 'mediaUrl' => 'http://ec2-52-23-210-215.compute-1.amazonaws.com:8000/media/bullocksoriole-3.mp3', 'species_id' => 5),
                array('name'=>'Liquid or flutelike:Wood Thrush', 'mediaUrl' => 'http://ec2-52-23-210-215.compute-1.amazonaws.com:8000/media/bushtit-1.mp3', 'species_id' => 5)

            )
        );
    }



}