<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class FakeBooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for($i=0; $i < 5; $i++){
            Book::inRandomOrder()->first();
            DB::table('books')->insert([
                'judul' => $faker->name,
                'penulis' => $faker->name,
                'penerbit' => $faker->randomElement(['pustaka progresif','Indiva media kreasi', 'Diva press', 'Zahir Publishing', 'Agro Media Group']),
                'tahun' => $faker->randomElement(['2006','2008', '2017', '2019','2020','2021','2022']),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);
        }
    }
}
