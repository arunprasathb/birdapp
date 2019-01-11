<?php

use Illuminate\Database\Seeder;

class GalleriesTableSeeder extends Seeder {
 
    public function run()
    {
         //delete books table records
         DB::table('galleries')->delete();
         //insert some dummy records
         DB::table('galleries')->insert(
         	array(
	            array('imageUrl'=> 'http://18.222.200.228/sample/images/galleries/ga1.jpg', 'species_id'=> 1),
                array('imageUrl'=> 'http://18.222.200.228/sample/images/galleries/ga2.jpg', 'species_id'=> 1),
                array('imageUrl'=> 'http://18.222.200.228/sample/images/galleries/ga3.jpg', 'species_id'=> 1),
                array('imageUrl'=> 'http://18.222.200.228/sample/images/galleries/ga4.jpg', 'species_id'=> 1),
                array('imageUrl'=> 'http://18.222.200.228/sample/images/galleries/ga5.jpg', 'species_id'=> 10),
                array('imageUrl'=> 'http://18.222.200.228/sample/images/galleries/ga6.jpg', 'species_id'=> 2),
                array('imageUrl'=> 'http://18.222.200.228/sample/images/galleries/ga7.jpg', 'species_id'=> 2),
                array('imageUrl'=> 'http://18.222.200.228/sample/images/galleries/ga8.jpg', 'species_id'=> 2),
                array('imageUrl'=> 'http://18.222.200.228/sample/images/galleries/ga9.jpg', 'species_id'=> 2 ),
                array('imageUrl'=> 'http://18.222.200.228/sample/images/galleries/ga10.jpg', 'species_id'=> 9),
                array('imageUrl'=> 'http://18.222.200.228/sample/images/galleries/ga11.jpg', 'species_id'=> 3),
                array('imageUrl'=> 'http://18.222.200.228/sample/images/galleries/ga12.jpg', 'species_id'=> 3),
                array('imageUrl'=> 'http://18.222.200.228/sample/images/galleries/ga13.jpg', 'species_id'=> 9),
                array('imageUrl'=> 'http://18.222.200.228/sample/images/galleries/ga14.jpg', 'species_id'=> 3),
                array('imageUrl'=> 'http://18.222.200.228/sample/images/galleries/ga15.jpg', 'species_id'=> 4),
                array('imageUrl'=> 'http://18.222.200.228/sample/images/galleries/ga16.jpg', 'species_id'=> 4),
                array('imageUrl'=> 'http://18.222.200.228/sample/images/galleries/ga17.jpg', 'species_id'=> 4),
                array('imageUrl'=> 'http://18.222.200.228/sample/images/galleries/ga18.jpg', 'species_id'=> 8),
                array('imageUrl'=> 'http://18.222.200.228/sample/images/galleries/ga19.jpg', 'species_id'=> 5),
                array('imageUrl'=> 'http://18.222.200.228/sample/images/galleries/ga20.jpg', 'species_id'=> 7),
                array('imageUrl'=>'http://18.222.200.228/sample/images/galleries/ga21.jpg', 'species_id'=> 7),
                array('imageUrl'=> 'http://18.222.200.228/sample/images/galleries/ga22.jpg', 'species_id'=> 7),
                array('imageUrl'=> 'http://18.222.200.228/sample/images/galleries/ga23.jpg', 'species_id'=> 5),
                array('imageUrl'=> 'http://18.222.200.228/sample/images/galleries/ga24.jpg', 'species_id'=> 5),
                array('imageUrl'=> 'http://18.222.200.228/sample/images/galleries/ga25.jpg', 'species_id'=> 6),
                array('imageUrl'=> 'http://18.222.200.228/sample/images/galleries/ga26.jpg', 'species_id'=> 6)
         	)
        );
    }



}