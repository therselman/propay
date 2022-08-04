<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interests', function (Blueprint $table) {
            $table->id();
            $table->string('description');
        });

        $interests = [
            'Fishing',
            'Traveling',
            'Hiking',
            'Swimming',
            'Programming',
            'Gaming',
            'TV',
            'Movies',
        ];

        $data = [];

        foreach ($interests as $interest) {
            $data[] = ['description' => $interest];
        }

        DB::table('interests')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interests');
    }
}
