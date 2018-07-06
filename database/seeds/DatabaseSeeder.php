<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(BooksTableSeeder::class);
         $this->command->info("Books table seededVoicesTableSeeder");

         $this->call(SpeciesTableSeeder::class);
         $this->command->info("Species table seeded");

         $this->call(VoicesTableSeeder::class);
         $this->command->info("Voices table seeded");

         $this->call(GalleriesTableSeeder::class);
         $this->command->info("Gallery table seeded");
         
    }
}
