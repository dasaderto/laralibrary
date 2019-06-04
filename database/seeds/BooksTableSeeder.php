<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $today = date("Y-m-d");
        $faker = \Faker\Factory::create();

        for($i=0; $i<=20; $i++):
            DB::table('books')->insert([
                'name' => $faker->streetName,
                'author' => $faker->name,
                'category_id' => rand(1,20),
                'date' => Carbon::parse($today),
                'class' => rand(7,11).' класс',
                'about' => $faker->paragraph,
                'file' => Str::random(20).'.pdf',
                'book_access' => rand(1,2)
            ]);
        endfor;
    }
}
