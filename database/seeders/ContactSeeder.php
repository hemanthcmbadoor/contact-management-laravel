<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Str;
use Faker\Factory as Faker;
use Bluemmb\Faker\PicsumPhotosProvider;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $faker->addProvider(new PicsumPhotosProvider($faker));
        //$faker->addProvider(new \Smknstd\FakerPicsumImages\FakerPicsumImagesProvider($faker));
        //$faker->addProvider(new ImageFaker($faker));

        foreach(range(1,10) as $val){

            DB::table('contacts')->insert([
                'name' => $faker->name(10),
                'company' => $faker->company().' '.$faker->companySuffix(),
                'email' => $faker->email(),
                'title' => $faker->jobTitle(),
                'mobile' => $faker->e164PhoneNumber(),
                'photo' => $url = $faker->imageUrl(500,500, true),
                'group_id' => $faker->numberBetween(1,6),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
