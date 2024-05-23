<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\House;
use Faker\Generator as Faker;

use App\Functions\Helpers as Help;

class HousesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //popolo db con un json
        // $houses = json_decode(file_get_contents(__DIR__ . '/houses.json'), true);
        // dd($houses);
        // foreach ($houses as $house) {
        //     $new_house = new House();
        //     $new_house->address = $house['address'];
        //     $new_house->city = $house['city'];
        //     $new_house->state = $house['state'];
        //     $new_house->description = $house['description'];
        //     $new_house->price = $house['price'];
        //     $new_house->square_meters = $house['square_meters'];
        //     $new_house->save();
        // }

        //popolo db con faker
        // for ($i = 0; $i < 100; $i++) {
        //     $new_house = new House();
        //     $new_house->address = $faker->streetAddress();
        //     $new_house->city = $faker->city();
        //     $new_house->state = $faker->state();
        //     $new_house->description = $faker->sentence();
        //     $new_house->price = $faker->randomFloat(2, 50.0000, 500.0000);
        //     $new_house->square_meters = $faker->numberBetween(30, 99);
        //     $new_house->save();
        // }

        //popolo db da csv


        $path = __DIR__ . '/houses.csv';
        $data = Help::getCsvData($path);
        // dd($data);
        foreach ($data as $index => $house) {
            if ($index !== 0) {
                $new_house = new House();
                $new_house->address = $house[2];
                $new_house->city = $house[4];
                $new_house->state = $house[5];
                $new_house->description = $house[10];
                $new_house->price = $house[11];
                $new_house->square_meters = $house[6];
                $new_house->save();
            }
        }
    }
}
