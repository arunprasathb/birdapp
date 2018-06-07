<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \DB::table('products')->insert([[
        //     'productName' => 'A',
        //     'brand' => 'Apple'
        // ],[
        //     'productName' => 'S',
        //     'brand' => 'Samsung'
        // ],[
        //     'productName' => 'L',
        //     'brand' => 'LG'
        // ]]);
        //call books table seeder class
        $this->call('BooksTableSeeder');
        //this message shown in your terminal after running db:seed command
        $this->command->info("Books table seeded :)");
    }
}

class BooksTableSeeder extends Seeder {
 
       public function run()
       {
         //delete books table records
         DB::table('books')->delete();
         //insert some dummy records
         DB::table('books')->insert(array(
             array('bookName'=>'Parrot','price'=>'50','shortDescription'=>'Parrots, also known as psittacines, are birds of the roughly 393 species in 92 genera that make up the order Psittaciformes, found in most tropical and subtropical regions.', 'description'=> 'Parrots, also known as psittacines /ˈsɪtəsaɪnz/,[1][2] are birds of the roughly 393 species in 92 genera that make up the order Psittaciformes, found in most tropical and subtropical regions. The order is subdivided into three superfamilies: the Psittacoidea ("true" parrots), the Cacatuoidea (cockatoos), and the Strigopoidea (New Zealand parrots). Parrots have a generally pantropical distribution with several species inhabiting temperate regions in the Southern Hemisphere, as well. The greatest diversity of parrots is in South America and Australasia.', 'imageUrl'=>'https://mobile-cdn.123rf.com/300wm/wjarek/wjarek1704/wjarek170400171/75647023-macaw-parrot-with-red-and-blue-feathers.jpg?ver=6', 'paidPdfUrl' => '', 'unpaidPdfUrl'=>''),
             array('bookName'=>'Hummingbird','price'=>'55','shortDescription'=>'Hummingbirds are birds from the Americas that constitute the family Trochilidae. They are among the smallest of birds, most species measuring 7.5–13 cm in length', 'description'=> 'Hummingbirds are birds from the Americas that constitute the family Trochilidae. They are among the smallest of birds, most species measuring 7.5–13 cm (3–5 in) in length. Indeed, the smallest extant bird species is a hummingbird, the 5 cm (2.0 in) bee hummingbird weighing less than 2.0 g (0.07 oz).They are known as hummingbirds because of the humming sound created by their beating wings which flap at high frequencies audible to humans. They hover in mid-air at rapid wing-flapping rates, which vary from around 12 beats per second in the largest species, to in excess of 80 in some of the smallest. Of those species that have been measured in wind tunnels, their top speed exceeds 15 m/s (54 km/h; 34 mph) and some species can dive at speeds in excess of 22 m/s (79 km/h; 49 mph).', 'imageUrl'=>'https://s3.amazonaws.com/com-aab-media/photo/60395561-720px.jpg', 'paidPdfUrl' => '', 'unpaidPdfUrl'=>''),
             array('bookName'=>'Penguin','price'=>'60','shortDescription'=>'Penguins are a group of aquatic, flightless birds. They live almost exclusively in the Southern Hemisphere, with only one species, the Galapagos penguin, found north of the equator', 'description'=> 'Penguins (order Sphenisciformes, family Spheniscidae) are a group of aquatic, flightless birds. They live almost exclusively in the Southern Hemisphere, with only one species, the Galapagos penguin, found north of the equator. Highly adapted for life in the water, penguins have countershaded dark and white plumage, and their wings have evolved into flippers. Most penguins feed on krill, fish, squid and other forms of sea life caught while swimming underwater. They spend about half of their lives on land and half in the oceans.', 'imageUrl'=>'https://en.wikipedia.org/wiki/Penguin', 'paidPdfUrl' => 'http://mentalfloss.com/article/56416/20-fun-facts-about-penguins-world-penguin-day', 'unpaidPdfUrl'=>'')
          ));
       }
 
}
