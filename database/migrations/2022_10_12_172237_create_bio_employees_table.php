<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bio_employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('status_pernikahan');
            $table->foreignId('province_id');
            $table->foreignId('city_id');
            $table->foreignId('district_id');
            $table->foreignId('village_id');
            $table->string('alamt');
            $table->string('company_name');
            $table->date('star_magang');
            $table->date('end_magang');
            $table->string('position');
            $table->foreignId('category_id');
            $table->string('institut_name');
            $table->date('star_institut');
            $table->date('end_institut');
            $table->foreignId('jenjang_pendidikan_id');
            $table->foreignId('jurusan_pendidikan_id');
            $table->string('ipk');
            // $table->string('hoby');
            // $table->string('bio', 300);
            // $table->integer('age');
            // $table->integer('height' );
            // $table->integer('weight');
            // $table->string('status');
            // $table->string('address');
            // $table->foreignId('province_id');
            // $table->foreignId('city_id');
            // $table->foreignId('district_id');
            // $table->foreignId('village_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bio_employees');
    }
};
