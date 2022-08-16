<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class InterestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $interests = [
            'Fishing',
            'Traveling',
            'Hiking',
            'Swimming',
            'Programming',
            'Gaming',
            'TV',
            'Movies',
            'Reading',
            'Sports',
            'Arts and Crafts',
            'Board Games',
            'DIY',
            'Yoga',
            'Baking',
            'Listening to music',
        ];

        $data = array_map(fn($v): array => [
            'description' => $v,
        ], $interests);

        DB::table('interests')->insert($data);
    }
}
