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
	            array('mediaUrl' => 'http://ec2-18-220-207-98.us-east-2.compute.amazonaws.com:8000/sample/media/calls1.mp3', 'species_id' => 1),
                array('mediaUrl' => 'http://ec2-18-220-207-98.us-east-2.compute.amazonaws.com:8000/sample/media/calls2.mp3', 'species_id' => 1),
                array('mediaUrl' => 'http://ec2-18-220-207-98.us-east-2.compute.amazonaws.com:8000/sample/media/calls3.mp3', 'species_id' => 1),
                array('mediaUrl' => 'http://ec2-18-220-207-98.us-east-2.compute.amazonaws.com:8000/sample/media/calls4.mp3', 'species_id' => 1),
                array('mediaUrl' => 'http://ec2-18-220-207-98.us-east-2.compute.amazonaws.com:8000/sample/media/calls5.mp3', 'species_id' => 1),
                array('mediaUrl' => 'http://ec2-18-220-207-98.us-east-2.compute.amazonaws.com:8000/sample/media/calls6.mp3', 'species_id' => 2),
                array('mediaUrl' => 'http://ec2-18-220-207-98.us-east-2.compute.amazonaws.com:8000/sample/media/calls7.mp3', 'species_id' => 2),
                array('mediaUrl' => 'http://ec2-18-220-207-98.us-east-2.compute.amazonaws.com:8000/sample/media/calls8.mp3', 'species_id' => 2),
                array('mediaUrl' => 'http://ec2-18-220-207-98.us-east-2.compute.amazonaws.com:8000/sample/media/calls9.mp3', 'species_id' => 2 ),
                array('mediaUrl' => 'http://ec2-18-220-207-98.us-east-2.compute.amazonaws.com:8000/sample/media/calls10.mp3', 'species_id' => 2),
                array('mediaUrl' => 'http://ec2-18-220-207-98.us-east-2.compute.amazonaws.com:8000/sample/media/calls1.mp3', 'species_id' => 3),
                array('mediaUrl' => 'http://ec2-18-220-207-98.us-east-2.compute.amazonaws.com:8000/sample/media/calls2.mp3', 'species_id' => 3),
                array('mediaUrl' => 'http://ec2-18-220-207-98.us-east-2.compute.amazonaws.com:8000/sample/media/calls3.mp3', 'species_id' => 3),
                array('mediaUrl' => 'http://ec2-18-220-207-98.us-east-2.compute.amazonaws.com:8000/sample/media/calls4.mp3', 'species_id' => 3),
                array('mediaUrl' => 'http://ec2-18-220-207-98.us-east-2.compute.amazonaws.com:8000/sample/media/calls5.mp3', 'species_id' => 4),
                array('mediaUrl' => 'http://ec2-18-220-207-98.us-east-2.compute.amazonaws.com:8000/sample/media/calls6.mp3', 'species_id' => 4),
                array('mediaUrl' => 'http://ec2-18-220-207-98.us-east-2.compute.amazonaws.com:8000/sample/media/calls7.mp3', 'species_id' => 4),
                array('mediaUrl' => 'http://ec2-18-220-207-98.us-east-2.compute.amazonaws.com:8000/sample/media/calls8.mp3', 'species_id' => 5),
                array('mediaUrl' => 'http://ec2-18-220-207-98.us-east-2.compute.amazonaws.com:8000/sample/media/calls9.mp3', 'species_id' => 5),
                array('mediaUrl' => 'http://ec2-18-220-207-98.us-east-2.compute.amazonaws.com:8000/sample/media/calls10.mp3', 'species_id' => 6),
                array('mediaUrl' => 'http://ec2-18-220-207-98.us-east-2.compute.amazonaws.com:8000/sample/media/calls1.mp3', 'species_id' => 6),
                array('mediaUrl' => 'http://ec2-18-220-207-98.us-east-2.compute.amazonaws.com:8000/sample/media/calls2.mp3', 'species_id' => 7),
                array('mediaUrl' => 'http://ec2-18-220-207-98.us-east-2.compute.amazonaws.com:8000/sample/media/calls3.mp3', 'species_id' => 7 ),
                array('mediaUrl' => 'http://ec2-18-220-207-98.us-east-2.compute.amazonaws.com:8000/sample/media/calls4.mp3', 'species_id' => 7),
                array('mediaUrl' => 'http://ec2-18-220-207-98.us-east-2.compute.amazonaws.com:8000/sample/media/calls5.mp3', 'species_id' => 7),
                array('mediaUrl' => 'http://ec2-18-220-207-98.us-east-2.compute.amazonaws.com:8000/sample/media/calls6.mp3', 'species_id' => 6),
                array('mediaUrl' => 'http://ec2-18-220-207-98.us-east-2.compute.amazonaws.com:8000/sample/media/calls7.mp3', 'species_id' => 5),
                array('mediaUrl' => 'http://ec2-18-220-207-98.us-east-2.compute.amazonaws.com:8000/sample/media/calls8.mp3','species_id' => 5)
            )
        );
    }
}