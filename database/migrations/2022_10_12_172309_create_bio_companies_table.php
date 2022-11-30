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
        Schema::create('bio_companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('province_id');
            $table->foreignId('city_id');
            $table->string('alamat');
            $table->char('phone_perusahaan');
            $table->string('email_perusahaan');
            $table->string('google_maps');
            $table->text('tentang');
            $table->foreignId('hari_kerja_id');
            $table->string('jam_kerja_mulai');
            $table->string('jam_kerja_berakhir');
            $table->string('website');
            $table->foreignId('industry_id');
            $table->string('profile')->nullable();
            $table->string('sampul')->nullable();
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
        Schema::dropIfExists('bio_companies');
    }
};
