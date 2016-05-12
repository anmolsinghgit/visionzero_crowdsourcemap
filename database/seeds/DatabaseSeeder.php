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
        $this->call(TargetsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(IncidentsTableSeeder::class);
        $this->call(BooksTableSeeder::class);

    }
}
