<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Language;
use Illuminate\Database\Eloquent\Model;
use DB;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = [
            ['en', 'English'],
            ['af', 'Afrikaans'],
            ['zu', 'Zulu'],
            ['xh', 'Xhosa'],
            ['nso', 'Northern Sotho'],
            ['tn', 'Tswana'],
            ['nso', 'Southern Sotho'],
            ['ts', 'Tsonga'],
            ['ss', 'Swazi'],
            ['ve', 'Venda'],
            ['nr', 'Southern Ndebele'],
            ['de', 'German'],
            ['fr', 'French'],
            ['es', 'Spanish'],
            ['pt', 'Portuguese'],
            ['zh', 'Chinese'],
            ['other', 'Other'],
        ];

        $data = array_map(fn($v): array => [
            'code' => $v[0],
            'name' => $v[1],
        ], $languages);

        DB::table('languages')->insert($data);
    }
}
