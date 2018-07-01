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
         $this->command->info("Books table seeded :)");
         $this->call(SpeciesTableSeeder::class);
         $this->command->info("Species table seeded :)");
         /*$this->call(BooksSpeciesTableSeeder::class);*/
    }
}
