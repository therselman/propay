<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('rsa_id')->unique();
            $table->string('mobile_number', 20);
            $table->date('date_of_birth');
            $table->integer('language_id');
            //$table->timestamp('email_verified_at')->nullable();
            $table->string('password', 60);
            //$table->rememberToken();
            $table->timestamps();
        });

        // DB::table('users')->insert([
        //     'name' => 'super',
        //     'surname' => 'admin',
        //     'username' => 'admin',
        //     'email' => 'admin@gmail.com',
        //     'rsa_id' => '7710245800088',        //  2001014800086 (F)   9907104800088 (F)   9711045800086 (M)
        //     'mobile_number' => '083-123-4567',
        //     'date_of_birth' => '1977-10-24',
        //     'language_id' => '1',
        //     'password' => '',           //  TODO: Get the admin password from an .env or config file !?!?
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
