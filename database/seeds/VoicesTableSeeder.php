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
	            array('mediaUrl' => 'https://en.wikipedia.org/wiki/Indian_peafowl#/media/File:Pavo_Real_Venezolano.jpg', 'species_id' => 1),
                array('mediaUrl' => 'https://upload.wikimedia.org/wikipedia/commons/6/63/Indian_peafowl_white_mutation.jpg', 'species_id' => 1),
                array('mediaUrl' => 'https://upload.wikimedia.org/wikipedia/commons/2/2c/Peacock_Dance.jpg', 'species_id' => 1),
                array('mediaUrl' => 'https://upload.wikimedia.org/wikipedia/commons/3/39/Peacock_at_Sithulpawwa%2C_Sri_Lanka.png', 'species_id' => 1),
                array('mediaUrl' => 'https://upload.wikimedia.org/wikipedia/commons/e/e9/Indian_Peahens_I_IMG_9647.jpg', 'species_id' => 1),
                array('mediaUrl' => 'https://upload.wikimedia.org/wikipedia/commons/2/23/Pavo_muticus3.jpg', 'species_id' => 2),
                array('mediaUrl' => 'https://upload.wikimedia.org/wikipedia/commons/2/2f/Peafowl_at_the_Taipei_Zoo.jpg', 'species_id' => 2),
                array('mediaUrl' => 'https://upload.wikimedia.org/wikipedia/commons/d/d7/Green_Peafowl_Pavo_muticus_Manipur_by_Raju_Kasambe..jpg', 'species_id' => 2),
                array('mediaUrl' => 'https://upload.wikimedia.org/wikipedia/commons/c/ca/Okyo_Peacock_and_Peahen.jpg', 'species_id' => 2 ),
                array('mediaUrl' => 'https://upload.wikimedia.org/wikipedia/commons/2/2b/Peacocks_777.jpg', 'species_id' => 2),
                array('mediaUrl' => 'https://upload.wikimedia.org/wikipedia/commons/4/4f/Congo_Peafowl%2C_female.jpg', 'species_id' => 3),
                array('mediaUrl' => 'https://upload.wikimedia.org/wikipedia/commons/d/d6/CongoPeafowlOKCZoo.JPG', 'species_id' => 3),
                array('mediaUrl' => 'https://upload.wikimedia.org/wikipedia/commons/8/86/Afropavo_congensis_-Artis_Zoo_-Netherlands_-female-8a.jpg', 'species_id' => 3),
                array('mediaUrl' => 'https://upload.wikimedia.org/wikipedia/commons/3/32/Afropavo_congensis_-Antwerp_Zoo_-pair-8a.jpg', 'species_id' => 3)
            )
        );
    }



}