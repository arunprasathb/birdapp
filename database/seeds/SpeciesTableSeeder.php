<?php

use Illuminate\Database\Seeder;

class SpeciesTableSeeder extends Seeder {
 
    public function run()
    {
         //delete books table records
         DB::table('species')->delete();
         //insert some dummy records
         DB::table('species')->insert(
         	array(
	            array('speciesName'=>"Indian peafowl", 'shortDescription'=> "The Indian peafowl or blue peafowl (Pavo cristatus), a large and brightly coloured bird, is a species of peafowl native to South Asia, but introduced in many other parts of the world.", 'description'=> "The male, or peacock, is predominantly blue with a fan-like crest of spatula-tipped wire-like feathers and is best known for the long train made up of elongated upper-tail covert feathers which bear colourful eyespots.", 'imageUrl' => "https://upload.wikimedia.org/wikipedia/commons/9/9f/Indian_Peacock_in_Tholpetty_Wildlife_Sanctuary_02.JPG",'book_id'=>4),
	         	array('speciesName' => "Green peafowl", 'shortDescription' => "The green peafowl (Pavo muticus) (from Latin Pavo, peafowl; muticus, Mute, docked or curtailed) is a species of peafowl that is found in the tropical forests of Southeast Asia.", 'description' => "It is also known as the Java peafowl, but this term is properly used to describe the nominate subspecies endemic to the island of Java in Indonesia. It is the closest relative of the Indian peafowl or blue peafowl (Pavo cristatus), which is mostly found on the Indian subcontinent.", 'imageUrl'=> "https://upload.wikimedia.org/wikipedia/commons/9/9a/Green_Peafowl%2C_Hanoi.jpg",'book_id'=>4),
	         	array('speciesName' => "Congo peafowl", 'shortDescription' => "The Congo peafowl (Afropavo congensis), known as the mbulu by the Bakôngo, is a species of peafowl native to the Congo Basin. It is one of three extant species of peafowl, the other two being the Indian peafowl (originally of India and Sri Lanka) and the green peafowl (native to Myanmar and Indochina).", 'description' => "It was only recorded as a species in 1936 by Dr. James Chapin after his failed search for the elusive okapi. Dr. Chapin noticed that the native Congolese headdresses contained long reddish-brown feathers that he couldn't identify with any previously known species of bird.", 'imageUrl' => "https://upload.wikimedia.org/wikipedia/en/8/84/Kongopfau.jpg",'book_id'=>4)
	         	)
         	);
    }



}