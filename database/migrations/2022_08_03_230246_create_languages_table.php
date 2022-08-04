<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\models\Languages;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->id();
            $table->string('code', 5);
            $table->string('name', 32);
        });

        $languages = [
            [
                'code' => 'zu',
                'name' => 'Zulu'
            ],
            [
                'code' => 'xh',
                'name' => 'Xhosa'
            ],
            [
                'code' => 'nso',
                'name' => 'Northern Sotho'
            ],
            [
                'code' => 'tn',
                'name' => 'Tswana'
            ],
            [
                'code' => 'nso',
                'name' => 'Southern Sotho'
            ],
            [
                'code' => 'ts',
                'name' => 'Tsonga'
            ],
            [
                'code' => 'ss',
                'name' => 'Swazi'
            ],
            [
                'code' => 've',
                'name' => 'Venda'
            ],
            [
                'code' => 'nr',
                'name' => 'Southern Ndebele'
            ],
            [
                'code' => 'af',
                'name' => 'Afrikaans'
            ],
            [
                'code' => 'en',
                'name' => 'English'
            ],

            //  Other
            [
                'code' => 'de',
                'name' => 'German'
            ],
            [
                'code' => 'fr',
                'name' => 'French'
            ],
            [
                'code' => 'es',
                'name' => 'Spanish'
            ],
            [
                'code' => 'pt',
                'name' => 'Portuguese'
            ],
            [
                'code' => 'zh',
                'name' => 'Chinese'
            ],
            [
                'code' => 'other',
                'name' => 'Other'
            ],
        ];

        DB::table('languages')->insert($languages);

        // foreach ($languages as $language) {
        //     $lang = new Languages();
        //     $lang->code = $language['code'];
        //     $lang->name = $language['name'];
        //     $lang->save();
        // }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('languages');
    }
}
