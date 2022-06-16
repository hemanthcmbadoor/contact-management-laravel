<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Str;
use Faker\Factory as Faker;

class ContactGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('contact_groups')->insert([
            'name' => 'Colleague',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('contact_groups')->insert([
            'name' => 'Friend',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('contact_groups')->insert([
            'name' => 'Family',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('contact_groups')->insert([
            'name' => 'Service',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('contact_groups')->insert([
            'name' => 'Community',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('contact_groups')->insert([
            'name' => 'Social',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
